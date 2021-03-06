<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		//'css/site.css',
		//'css/bootstrap.min.css" rel="stylesheet',
		'css/font-awesome.min.css',
		'css/prettyPhoto.css',
		'css/price-range.css',
		'css/animate.css',
		'css/responsive.css',
		'css/main.css',
	];
	public $js = [
		//'js/jquery.js',
		//'js/bootstrap.min.js',
		'js/jquery.scrollUp.min.js',
		'js/price-range.js',
		'js/jquery.prettyPhoto.js',
		'js/jquery.cookie.js',
		'js/jquery.accordion.js',
		'js/main.js'
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];
}
