<?php
/**
 * @var $content string
 * @var $this yii\web\View
 */
use webvimark\ybc\content\models\ContentTemplate;

?>

<?php $this->beginContent('@app/views/layouts/main.php') ?>

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


<?php $this->endContent() ?>