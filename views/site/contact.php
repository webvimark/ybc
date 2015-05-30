<?php
/**
 * @var $this yii\web\View
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="content-template-form">

	<?php $form = ActiveForm::begin([
		'id'=>'content-template-form',
//		'layout'=>'horizontal',
		'validateOnBlur'=>false,
	]); ?>

	<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
	<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
	<?= $form->field($model, 'subject')->textInput(['maxlength' => 255]) ?>
	<?= $form->field($model, 'body')->textarea(['rows' => 10]) ?>


	<?= Html::submitButton(
		'<span class="glyphicon glyphicon-ok"></span> ' . Yii::t('app', 'Send'),
		['class' => 'btn btn-primary']
	) ?>


	<?php ActiveForm::end(); ?>

</div>