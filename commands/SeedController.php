<?php

namespace app\commands;

use yii\console\Controller;
use Yii;
use yii\db\Query;

/**
 * Class SeedController
 * @package app\commands
 */
class SeedController extends Controller
{
	const LOREM_STRING = 'string';
	const LOREM_TEXT = 'text';


	/**
	 * if you want to specify some attribute values, do it like this
	 * <code>
	 * 	./yii seed table_name 10 image=image_file.jpg 'name=string with spaces should be quoted'
	 * </code>
	 *
	 * @param string $table
	 * @param int    $n - number of records
	 */
	public function actionIndex($table, $n = 10)
	{
		$schema = Yii::$app->db->getTableSchema($table);

		if ( $schema )
		{
			$specificValues = [];
			$args = func_get_args();

			// If attribute values has been specified
			if ( count($args) > 2 )
			{
				unset($args[0]);
				unset($args[1]);

				foreach ($args as $arg)
				{
					$tmp = explode('=', $arg);

					$specificValues[array_shift($tmp)] = implode('=', $tmp);
				}
			}

			$query = new Query();

			$all_fk_ids = [];
			foreach ($schema->foreignKeys as $foreignKey)
			{
				$fk_table = $foreignKey[0];

				unset($foreignKey[0]);

				$fk_id_field = array_values($foreignKey)[0];

				$fk = array_keys($foreignKey)[0];

				if ( !array_key_exists($fk, $specificValues) )
				{
					$all_fk_ids[$fk] = $query
						->select($fk_id_field)
						->from($fk_table)
						->indexBy($fk_id_field)
						->limit(1000)
						->column();
				}
			}

			for($i = 0; $i < $n; $i++)
			{
				$res = [];

				foreach ($schema->columns as $field => $data)
				{
					if ( array_key_exists($field, $specificValues) )
					{
						$res[$field] = $specificValues[$field];

						continue;
					}

					if ( $data->isPrimaryKey || $data->autoIncrement )
					{
						continue;
					}

					if ( $data->type == 'string' )
					{
						if ( stripos($field, 'image') !== false || stripos($field, 'logo') !== false )
						{
							$res[$field] = md5(uniqid()) . '.jpg';
						}
						elseif ( stripos($field, 'email') !== false )
						{
							$res[$field] = uniqid(). '@' . uniqid() . '.com';
						}
						else
						{
							$res[$field] = $this->lorem(rand(1, 3));
						}
					}
					elseif ( $data->type == 'text' )
					{
						$res[$field] = $this->lorem(rand(2, 10), self::LOREM_TEXT);
					}
					elseif ( in_array($data->type, ['smallint', 'tinyint']) )
					{
						$res[$field] = rand(0, 1);
					}
					elseif ( $data->type == 'integer' )
					{
						if ( substr($field, -3) === '_id' )
						{
							if ( array_key_exists($field, $all_fk_ids) && count($all_fk_ids[$field]) > 0 )
							{
								$res[$field] = array_rand($all_fk_ids[$field]);
							}
						}
						elseif ( in_array($field, ['active', 'status', 'direction', 'deleted', 'type']) || stripos($field, 'is_') === 0 )
						{
							$res[$field] = rand(0, 1);
						}
						elseif ( $field == 'sorter' )
						{
							$res[$field] = 0;
						}
						elseif ( in_array($field, ['created_at', 'updated_at']) || stripos($field, 'time') !== false  || stripos($field, 'date') !== false )
						{
							$res[$field] = time() + rand(-10000000, 10000000);
						}
						elseif ( stripos($field, 'quantity') !== false || stripos($field, 'amount') !== false )
						{
							$res[$field] = rand(0, 10000);
						}
						elseif ( stripos($field, 'percent') !== false )
						{
							$res[$field] = rand(0, 100);
						}
						elseif ( stripos($field, 'price') !== false )
						{
							$res[$field] = rand(1, 10000);
						}
						else
						{
							$res[$field] = rand(-10000, 10000);
						}
					}
					elseif ( $data->type == 'decimal' )
					{
						$res[$field] = rand(1, 10000);
					}
				}

				Yii::$app->db->createCommand()->insert($table, $res)->execute();
			}

			Yii::$app->cache->flush();

			echo "OK\n";

		}
		else
		{
			echo 'Table - ' . $table . ' not found';
		}
	}

	/**
	 * @param int    $count
	 * @param string $type
	 *
	 * @return string
	 */
	protected function lorem($count = 2, $type = self::LOREM_STRING)
	{
		$loremString = [
			'ipsum',
			'sit',
			'dolor',
			'amet',
			'consectetur',
			'adipiscing',
		];

		$loremText = [
			'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi finibus tempus nibh quis laoreet.',
			'Fusce in tincidunt lorem, eu molestie augue. Aenean non sollicitudin justo.',
			'Aenean commodo, neque et ullamcorper semper, metus libero aliquet magna, eget interdum tellus diam vitae tellus.',
			'Integer tincidunt euismod purus ac pretium. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
			'Sed tincidunt rutrum turpis hendrerit sollicitudin. Quisque congue suscipit erat et malesuada.',
			'Donec vehicula turpis ut egestas ullamcorper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
		];

		$output = '';
		$res = [];

		if ( $type == self::LOREM_STRING )
		{
			for($i = 0; $i < $count; $i++)
			{
				$res[] = $loremString[array_rand($loremString)];
			}

			$output = implode(' ', $res);
		}
		else
		{
			for($i = 0; $i < $count; $i++)
			{
				$output .= '<p>' . $loremText[array_rand($loremText)] . '</p>';
			}
		}

		return $output;
	}
}
