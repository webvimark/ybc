<?php
/**
 * @var $content string
 * @var $this yii\web\View
 */
use webvimark\ybc\content\components\MenuWidget;
use webvimark\ybc\content\models\ContentTemplate;
use yii\bootstrap\NavBar;

?>

<?php $this->beginContent('@app/views/layouts/main.php') ?>


<?php NavBar::begin() ?>
<?= MenuWidget::widget([
	'code'=>'topMenu',
	'options'=>[
		'class'=>'nav navbar-nav',
	],
]) ?>
<?php NavBar::end() ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<img class="img-responsive" src="http://placehold.it/1200x300" alt="">
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?= ContentTemplate::renderWidgets('header') ?>
		</div>
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-12">
					<?= ContentTemplate::renderWidgets('center_top') ?>
				</div>

				<div class="col-sm-12">
					<?= $content ?>
				</div>

				<div class="col-sm-12">
					<?= ContentTemplate::renderWidgets('center_bottom') ?>
				</div>
			</div>

		</div>
		<div class="col-sm-3">
			<?= ContentTemplate::renderWidgets('right') ?>
		</div>
	</div>
</div>


<?php $this->endContent() ?>