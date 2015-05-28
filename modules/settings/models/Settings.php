<?php

namespace app\modules\settings\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $logo
 * @property string $contact_email
 * @property integer $enable_seo_tracking
 * @property string $seo_tracking_script
 * @property string $seo_meta_tags
 * @property integer $created_at
 * @property integer $updated_at
 */
class Settings extends \webvimark\components\BaseActiveRecord
{
	/**
	 * Save images without as is
	 *
	 * @see parent class
	 * @var null
	 */
	public $thumbs = null;

	/**
	 * Add scenario with your attributes to make rules work
	 *
	 * @return array
	 */
	public function scenarios()
	{
		return [
			'general' => ['logo', 'contact_email'],
			'seo' => ['enable_seo_tracking', 'seo_tracking_script', 'seo_meta_tags'],
		];
	}

	/**
	 * Settings model should exists only in 1 unit, so wea re trying to find this model
	 * And create it, if not found
	 *
	 * @return Settings
	 */
	public static function getModel()
	{
		$model = static::getDb()->cache(function(){
			return static::find()->one();
		});

		if ( !$model )
		{
			$model = new static();
			$model->save(false);
		}

		return $model;
	}

	/**
	* @inheritdoc
	*/
	public static function tableName()
	{
		return '{{%settings}}';
	}

	/**
	* @inheritdoc
	*/
	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
		];
	}

	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
			[['contact_email'], 'required'],
			[['contact_email'], 'email'],
			[['enable_seo_tracking'], 'integer'],
			[['seo_tracking_script', 'seo_meta_tags'], 'string'],
			[['contact_email'], 'string', 'max' => 255],
			[['contact_email'], 'trim'],
			[['logo'], 'image', 'maxSize' => 1024*1024*5, 'extensions' => ['gif', 'png', 'jpg', 'jpeg']]
		];
	}

	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'logo' => Yii::t('app', 'Logo'),
			'contact_email' => Yii::t('app', 'Contact Email'),
			'enable_seo_tracking' => Yii::t('app', 'Enable SEO tracking'),
			'seo_tracking_script' => Yii::t('app', 'SEO tracking script'),
			'seo_meta_tags' => Yii::t('app', 'Additional meta tags'),
			'created_at' => Yii::t('app', 'Created'),
			'updated_at' => Yii::t('app', 'Updated'),
		];
	}

	/**
	 * @param bool  $insert
	 * @param array $changedAttributes
	 */
	public function afterSave($insert, $changedAttributes)
	{
		Yii::$app->cache->flush();

		parent::afterSave($insert, $changedAttributes);
	}
}
