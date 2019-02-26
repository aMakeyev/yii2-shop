<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05.12.18
 * Time: 11:56
 */

namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;
use yii\helpers\Html;

class CategoryController extends AppController {

	public function actionIndex(){
		$hits = Product::find()->where(['hit' => '1'])->limit(6)->all();//-поп.товары. '1' – т.к.поле Enum. Если int – 0. Всего 6 шт
		$this->setMeta('E-SHOPPER');//здесь только тайтл делаем. Дает подсказки в коде: последовательно значения тайтл, кивордс, дескрипшен. Но только если в''или "" вводиш.
		return $this->render('index', compact('hits'));

	}
	public function actionView($id){
		//$id = Yii::$app->request->get('id');комент.т.к.id передается в метод+обрабатd url-meneger.т.е.2 варианта есть
		//$products = Product::find()->where(['category_id' => $id])->all();
		$category = Category::findOne($id);//запрос к категориям чтобы выводить ниже имя,ключевики и дескрипшен
		if(empty($category))
			throw new HttpException(404, 'Такой категории нет');
		$query = Product::find()->where(['category_id' => $id]);// ->all() не пишем
		$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		$this->setMeta('E-SHOPPER | ' . $category->name, $category->keywords, $category->description);
		return $this->render('view', compact('products', 'pages', 'category'));
	}
	public function actionSearch(){
		$q = trim(Yii::$app->request->get('q'));
		$this->setMeta('E-SHOPPER | Поиск:' . @Html::encode($q));
		if(!$q)
			return $this->render('search');
		$query = Product::find()->where(['like', 'name', $q]);
		$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12, 'forcePageParam' => false, 'pageSizeParam' => false]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		return $this->render('search', compact('products', 'pages', 'q'));
	}

}