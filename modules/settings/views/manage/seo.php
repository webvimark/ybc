<?php
/**
 * @var $this yii\web\View
 * @var $robotsTxtVal string
 * @var $model app\modules\settings\models\Settings
 */
use app\modules\settings\SettingsModule;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = SettingsModule::t('app', 'SEO settings');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="panel panel-default">
	<div class="panel-body">


<?php
$form = ActiveForm::begin([
	'id'      => 'seo-settings',
	'validateOnBlur'=>false,
]) ?>


<div class="row">
	<div class="col-sm-6">
		<?= $form->field($model, 'enable_seo_tracking')->checkbox() ?>

		<?= $form->field($model, 'seo_tracking_script')->textarea(['rows'=>13]) ?>
	</div>

	<div class="col-sm-6">
		<label for="">Robots.txt</label>
		<?= Html::textarea('robots', $robotsTxtVal, ['rows'=>15, 'class'=>'form-control']) ?>
	</div>
</div>


<?= Html::submitButton(
	'<span class="glyphicon glyphicon-ok"></span> ' . Yii::t('app', 'Save'),
	['class' => 'btn btn-primary']
) ?>
<?php ActiveForm::end() ?>

	</div>
</div>