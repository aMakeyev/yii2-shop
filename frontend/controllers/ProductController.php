<?php

namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class ProductController extends AppController{

    public function actionView($id){
        //$id = Yii::$app->request->get('id');
//        $product = Product::find()->with('category')->where(['id' == $id])->limit(1)->one();//для жадной.здесь лучше ленивая:
		$product = Product::findOne($id);
        if(empty($product))
        	throw new HttpException(404, 'Такого товара нет');
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits'));
    }

    public function actionIndex(){
    	$this->setMeta('E-SHOPPER | Товары');
    	$query = Product::find();
    	$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 12, 'forcePageParam' => false, 'pageSizeParam' => false]);
    	$products = $query->offset($pages->offset)->limit($pages->limit)->all();
    	return $this->render('index', compact('products', 'pages'));

	}

} 