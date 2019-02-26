<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\assets\ltAppAsset;
use \yii\helpers\Url;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title>Админка | <?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>

    <link rel="shortcut icon" href="/favicon.ico">
</head><!--/head-->

<body>
<?php $this->beginBody() ?>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="/<?php //\yii\helpers\Url::home(); ?>"><?=Html::img('@images/home/logo.png', ['alt' => 'E-SHOPPER']) ?></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<?php if(!Yii::$app->user->isGuest):?>
									<li><a href="<?= Url::to(['/site/logout'])?>"><i class="fa fa-user"></i> <?= Html::encode(Yii::$app->user->identity->username)?> (Выход)</a></li>
								<?php endif;?>
								<?php if (Yii::$app->user->can('MegaAdmin')):?>
								<li><a href="<?= Url::to(['/permit/access/role'])?>"><i class="fa fa-lock "></i>Roles</a></li>
								<li><a href="<?= Url::to(['/permit/access/permission'])?>"><i class="fa fa-lock "></i>Permits</a></li>
								<?php endif;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">

							<ul class="nav navbar-nav collapse navbar-collapse">
								<li class="dropdown"><a href="<?= Url::to(['/order/index'])?>">Заказы<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="<?= Url::to(['/order/index'])?>">Список заказов</a></li>
										<li><a href="<?= Url::to(['/order/create'])?>">Добавить заказ</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="<?= Url::to(['/category/index'])?>">Катогории<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="<?= Url::to(['/category/index'])?>">Список категорий</a></li>
										<li><a href="<?= Url::to(['/category/create'])?>">Добавить категорию</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="<?= Url::to(['/product/index'])?>">Товары<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="<?= Url::to(['/product/index'])?>">Список товаров</a></li>
										<li><a href="<?= Url::to(['/product/create'])?>">Добавить товар</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="<?= Url::to(['/user/index'])?>">Пользователи<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="<?= Url::to(['/user/index'])?>">Список пользователей</a></li>
										<li><a href="<?= Url::to(['/user/create'])?>">Добавить пользователя</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<form method="get" action="<?= Url::to(['product/search'])?>">
								<input type="text" placeholder="Поиск товаров" name="q"/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<div class="container">
		<?php if( Yii::$app->session->hasFlash('success') ): ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo Yii::$app->session->getFlash('success'); ?>
			</div>
		<?php endif;?>

		<?= $content; ?>

	</div>
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2 pull-left">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-3 pull-right">
						<div class="address">
							<img src="/images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013-<?= date('Y')?> E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
<?php
\yii\bootstrap\Modal::begin([
	'header' => '<h2>Корзина</h2>',
	'id' => 'cart',//присвоили диву модального окна id='cart'
	'size' => 'modal-lg',//азмер окна - св-ва из бутстрапа
	'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
        <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
]);//классы и атрибуты из бутстрапа
\yii\bootstrap\Modal::end();

?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>