<?php
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
	<?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<header id="top" role="banner">
	<!--Home Block-->
	<section id="home" class="section">
		<div class="container">
			<div class="row">
				<div class="cntr circle-btn">
					<div>
						<a href="#"><span><i class="fa fa-microphone"></i></span></a>
						<a href="#"><span><i class="fa fa-random"></i></span></a>
						<a href="#"><span><i class="fa fa-volume-up"></i> </span></a>
					</div>
					<div class="mob-nav visible-xs visible-sm">
						<a href="#features"><span><i class="fa fa-th-large"></i> </span></a>
						<a href="#portfolio"><span><i class="fa fa-bookmark-o"></i> </span></a>
						<a href="#welcome"><span><i class="fa fa-heart"></i> </span></a> <br>
						<a href="#video"><span><i class="fa fa-film"></i> </span></a>
						<a href="#press"><span><i class="fa fa-star"></i> </span></a>
						<a href="#contact"><span><i class="fa fa-envelope"></i> </span></a>
					</div>
					<!-- <a href="#"><span><i class="fa fa-pencil"></i></span></a>
					<a href="#"><span><i class="fa fa-text-width"></i></span></a>		 -->
				</div>
				<div class="col-sm-12 col-md-12 cntr">
					<div class="hidden-sm hidden-xs">
						<h1 class="no-margin-top"><strong>Simple</strong> Way to <strong> develope</strong>  iPhone and android <strong>apps</strong></h1>
						<br>
						<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </h4>
						<br>
						<p>
							<a class="btn btn-primary btn-lg getstarted" href="#">Get Started Now <i class="fa fa-angle-double-right"></i></a><br>
							<a class="see-document" href="#"> <i class="fa fa-caret-right"></i> view more</a>
						</p>
					</div>

					<div class="cntr">
						<ul class="social-icons">
							<li><a class="social-network ico-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a class="social-network ico-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a class="social-network ico-youtube" href="#"><i class="fa fa-youtube"></i></a></li>

							<!--
								<li><a class="social-network ico-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a class="social-network ico-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a class="social-network ico-dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a class="social-network ico-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a class="social-network ico-pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
								<li><a class="social-network ico-dropbox" href="#"><i class="fa fa-dropbox"></i></a></li>
								<li><a class="social-network ico-skype" href="#"><i class="fa fa-skype"></i></a></li>
								<li><a class="social-network ico-tumblr" href="#"><i class="fa fa-tumblr"></i></a></li>
								<li><a class="social-network ico-vimeo" href="#"><i class="fa fa-vimeo-square"></i></a></li>
								<li><a class="social-network ico-flickr" href="#"><i class="fa fa-flickr"></i></a></li>
								<li><a class="social-network ico-github" href="#"><i class="fa fa-github-alt"></i></a></li>
								<li><a class="social-network ico-renren" href="#"><i class="fa fa-renren"></i></a></li>
								<li><a class="social-network ico-vk" href="#"><i class="fa fa-vk"></i></a></li>
								<li><a class="social-network ico-xing" href="#"><i class="fa fa-xing"></i></a></li>
								<li><a class="social-network ico-weibo" href="#"><i class="fa fa-weibo"></i></a></li>
								<li><a class="social-network ico-rss" href="#"><i class="fa fa-rss"></i></a></li>
							-->

						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</header>

<div class="header">
	<div id="nav-sticky-wrapper" class="sticky-wrapper" style="height: 52px;"><div id="nav" class="navbar-wrapper">
			<div class="navbar">
				<div class="container">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="#top" class="navbar-brand"><i class="fa fa-microphone"></i> VOICE</a>
					</div>
					<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
						<?= MenuWidget::widget([
							'id'=>1,
							'options'=>[
								'class'=>'nav navbar-nav',
							],
						]) ?>


						<ul class="nav navbar-nav navbar-right">
							<li><a href="#contact">Contact Us</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div></div>
</div>
<div class="wrap">


	<div class="container">
		<?=
		Breadcrumbs::widget([
			'links' => isset( $this->params['breadcrumbs'] ) ? $this->params['breadcrumbs'] : [],
		]) ?>
		<?= $content ?>
	</div>
</div>

<footer class="footer">
	<div class="container">
		<p class="pull-left">&copy; My Company <?= date('Y') ?></p>

		<p class="pull-right"><?= Yii::powered() ?></p>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
