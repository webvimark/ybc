<?php
/**
 * @var $this yii\web\View
 */
use webvimark\behaviors\multilanguage\language_selector_widget\LanguageSelector;
use webvimark\modules\UserManagement\components\GhostHtml;
use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;

?>

<header class="header">
<?= Html::a(
	'<i class="fa fa-leaf"></i> ' . Yii::$app->name,
	Yii::$app->homeUrl,
	['class' => 'logo']
) ?>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>

<div class="navbar-right">
<ul class="nav navbar-nav">

	<?= LanguageSelector::widget([
		'viewFile'=>'@app/views/layouts/partials_backend/_languageSelector'
	]) ?>


	<!-- User Account: style can be found in dropdown.less -->
	<li class="dropdown user user-menu">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<i class="glyphicon glyphicon-user"></i>
			<span><?= Yii::$app->user->username ?> <i class="caret"></i></span>
		</a>
		<ul class="dropdown-menu">

			<!-- Menu Footer-->
			<li class="user-footer">
				<div class="pull-left">
					<?= GhostHtml::a(
						'<i class="fa fa-random"></i> ' . UserManagementModule::t('back', 'Change password'),
						['/user-management/auth/change-own-password'],
						['class'=>'btn btn-default btn-flat']
					) ?>
				</div>
				<div class="pull-right">
					<?= Html::a(
						'<i class="fa fa-power-off"></i> ' . UserManagementModule::t('back', 'Logout'),
						['/user-management/auth/logout'],
						['class'=>'btn btn-default btn-flat']
					) ?>
				</div>
			</li>
		</ul>
	</li>
</ul>
</div>
</nav>
</header>