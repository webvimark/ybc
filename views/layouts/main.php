<?php
use app\modules\settings\models\Settings;
use webvimark\ybc\content\components\MenuWidget;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\FrontendAsset;

/* @var $this \yii\web\View */
/* @var $content string */

FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?= Html::csrfMetaTags() ?>

	<title><?= Html::encode($this->title) ?></title>

	<?= Settings::getModel()->seo_meta_tags ?>

	<?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>


<div class="container">
	<?=
	Breadcrumbs::widget([
		'links' => isset( $this->params['breadcrumbs'] ) ? $this->params['breadcrumbs'] : [],
	]) ?>
	<?= $content ?>
</div>


<?= Settings::getModel()->enable_seo_tracking == 1 ? Settings::getModel()->seo_tracking_script : '' ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
