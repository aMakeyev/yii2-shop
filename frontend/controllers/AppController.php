<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.12.18
 * Time: 11:55
 */

namespace frontend\controllers;

use yii\web\Controller;

class AppController extends Controller{
	protected function setMeta($title = null, $keywords = null, $description = null){
		$this->view->title = $title;
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);//"чтобы если нет, получить пустую строку
		$this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
	}

}