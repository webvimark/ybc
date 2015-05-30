<?php
use app\modules\settings\models\Settings;
use webvimark\modules\UserManagement\components\GhostHtml;
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

<?= GhostHtml::a(
	Html::img(Yii::$app->homeUrl . 'css/system_images/go_admin.png'),
	['/content/content-page/index'],
	['style'=>'position:absolute; z-index: 99999; top: 0; left: 0']
) ?>

<?= Breadcrumbs::widget([
	'links' => isset( $this->params['breadcrumbs'] ) ? $this->params['breadcrumbs'] : [],
]) ?>

<?= $content ?>


<?= Settings::getModel()->enable_seo_tracking == 1 ? Settings::getModel()->seo_tracking_script : '' ?>


<?php
use raoul2000\widget\scrollup\Scrollup;

Scrollup::widget([
	'theme' => Scrollup::THEME_IMAGE,
	'pluginOptions' => [
		'scrollText' => "To top", // Text for element
//		'scrollName'=> 'scrollup', // Element ID
		'topDistance'=> 400, // Distance from top before showing element (px)
		'topSpeed'=> 3000, // Speed back to top (ms)
		'animation' => Scrollup::ANIMATION_SLIDE, // Fade, slide, none
		'animationInSpeed' => 200, // Animation in speed (ms)
		'animationOutSpeed'=> 200, // Animation out speed (ms)
		'activeOverlay' => false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	]
]);

?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
