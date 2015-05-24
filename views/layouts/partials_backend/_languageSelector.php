<?php
/**
 * @var $this yii\web\View
 * @var $languages array
 */
use webvimark\behaviors\multilanguage\MultiLanguageHelper;
use yii\helpers\Html;

?>

<!-- Languages -->
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-globe"></i>
		<span><?= @$languages[Yii::$app->language] ?> <i class="caret"></i></span>
	</a>
	<ul class="dropdown-menu language-selector">


		<?php foreach ($languages as $langCode => $langName): ?>
			<?php if ( $langCode != Yii::$app->language ): ?>
				<li><?= Html::a($langName, MultiLanguageHelper::createMultilanguageReturnUrl($langCode)) ?></li>

			<?php endif; ?>

		<?php endforeach ?>

	</ul>
</li>
