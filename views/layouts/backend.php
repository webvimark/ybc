<?php
use app\assets\BackendAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="robots" content="noindex, nofollow">
	<?= Html::csrfMetaTags() ?>
	<link rel="icon" type="image/png" href="<?= Yii::$app->request->baseUrl; ?>/favicon.png" />

	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
</head>
<body class="skin-blue">

<?php $this->beginBody() ?>
<?= $this->render('partials_backend/_header') ?>

<div class="wrapper row-offcanvas row-offcanvas-left">

	<?= $this->render('partials_backend/_sideMenu') ?>

	<aside class="right-side">

		<section class="content-header">

			<h1><?= $this->title ?></h1>
			<?= Breadcrumbs::widget([
				'encodeLabels'=>false,
				'homeLink'=>[
					'label'=>'<i class="fa fa-dashboard"></i> Dashboard',
					'url'=>['/dashboard/index'],
				],
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
		</section>

		<section class="content">
			<?= $content ?>

		</section>
	</aside>
</div>

<?= \odaialali\yii2toastr\ToastrFlash::widget([
	'options' => [
		'positionClass' => 'toast-bottom-left'
	]
]);?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>