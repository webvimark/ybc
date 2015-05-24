<?php
/**
 * @var $content string
 * @var $this yii\web\View
 */

?>

<?php $this->beginContent('@app/views/layouts/main.php') ?>

<div class="row">
	<div class="col-sm-3">
		Here is side column
	</div>
	<div class="col-sm-9">
		<?= $content ?>
	</div>
</div>


<?php $this->endContent() ?>