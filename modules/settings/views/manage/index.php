<?php
/**
 * @var $this yii\web\View
 * @var $robotsTxtVal string
 * @var $model app\modules\settings\models\Settings
 */
use app\modules\settings\SettingsModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = SettingsModule::t('app', 'General settings');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="panel panel-default">
	<div class="panel-body">

		<?php
		$form = ActiveForm::begin([
			'id'      => 'main-settings',
			'validateOnBlur'=>false,
			'options'=>[
				'enctype'=>"multipart/form-data",
			]
		]) ?>

		<?= $form->field($model, 'contact_email') ?>

		<?= $form->field($model, 'logo')->fileInput() ?>

		<?php if ( is_file($model->getImagePath(null, 'logo'))): ?>
			<?= Html::img($model->getImageUrl(null, 'logo'), ['alt'=>'logo']) ?>
		<?php endif; ?>

		<hr/>

		<?= Html::submitButton(
			'<span class="glyphicon glyphicon-ok"></span> ' . Yii::t('app', 'Save'),
			['class' => 'btn btn-primary']
		) ?>
		<?php ActiveForm::end() ?>

	</div>
</div>