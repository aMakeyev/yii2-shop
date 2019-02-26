<?php
return [
	'modules' => [
		'yii2images' => [
			'class' => 'rico\yii2images\Module',
			//be sure, that permissions ok
			//if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
			'imagesStorePath' => '@upload/store', //path to origin images
			'imagesCachePath' => '@upload/cache', //path to resized copies
			'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
			'placeHolderPath' => '@upload/store/no-image.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
			'imageCompressionQuality' => 100, // Optional. Default value is 85.
		],
	],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
		'@images' => '/frontend/web/images',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
		'authManager' => [
			'class' => 'yii\rbac\DbManager',
		],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
	'controllerMap' => [
		'elfinder' => [
			'class' => 'mihaildev\elfinder\PathController',
			'access' => ['admin'],
			'root' => [
				'baseUrl' => '',
				'path' => '../../frontend/web/upload/global/',
				'name' => 'Global'
			],
			/*'watermark' => [
				'source'         => __DIR__.'/logo.png', // Path to Water mark image
				'marginRight'    => 5,          // Margin right pixel
				'marginBottom'   => 5,          // Margin bottom pixel
				'quality'        => 95,         // JPEG image save quality
				'transparency'   => 70,         // Water mark image transparency ( other than PNG )
				'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
				'targetMinPixel' => 200         // Target image minimum pixel size
			]*/
		]
	],

];
