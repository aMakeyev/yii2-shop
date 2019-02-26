<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.01.19
 * Time: 0:05
 */

namespace frontend\controllers;

class BlogController extends AppController {
	public function actionIndex(){
		$this->setMeta('E-SHOPPER | Блог');
		return $this->render('index');
	}


	public function actionView(){
		$this->setMeta('E-SHOPPER | Блог');

		return $this->render('view');
	}

}