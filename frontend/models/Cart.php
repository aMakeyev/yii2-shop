<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.12.18
 * Time: 17:11
 */

namespace frontend\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord {
	public $name;
	public $email;
	public $phone;
	public $address;

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name', 'email', 'phone', 'address'], 'required'],
			// email has to be a valid email address
			['email', 'email'],
			['phone', 'phone'],
		];
	}


	public function behaviors()
	{
		return [
			'image' => [
				'class' => 'rico\yii2images\behaviors\ImageBehave',
			]
		];
	}
	public function addToCart($product, $qty = 1){
		$mainImage = $product->getImage();
		if(isset($_SESSION['cart'][$product->id])){
			$_SESSION['cart'][$product->id]['qty'] += $qty;//эл-т количество
		}else{
			$_SESSION['cart'][$product->id] = [//создаем массив товара в карзине - подет по id
				'qty' => $qty,
				'name' => $product->name,
				'price' => $product->price,
				'img' => $mainImage->getUrl('x50')
			];
		}
		$_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;//общ.кол-во товаров в карзин - способ ключи-одинаковый префикс (чтобы не нагромождать новыми массивами. Если сессия такая существует присваиваем её значение + кол-во сейчас заказанного товара, если нет - то присваиваем ей значение $qty
		$_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty*$product->price : $qty*$product->price;//общая сумма заказа

	}
	public function recalc($id){
		if(!isset($_SESSION['cart'][$id])) return false;
		$qtyMinus = $_SESSION['cart'][$id]['qty'];
		$sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
		$_SESSION['cart.qty'] -= $qtyMinus;
		$_SESSION['cart.sum'] -= $sumMinus;
		unset($_SESSION['cart'][$id]);
	}


}