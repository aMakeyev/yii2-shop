<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поиск: ' . @Html::encode($q);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

	<h2 class="title text-center">Поиск товаров по запросу: <?= @Html::encode($q)?></h2>
	<p>
		<?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			//            'category_id',
			[
				'attribute' => 'category_id',
				'value' => function($data){
					return $data->category->name;
				},
			],
			'name',
			//            'content:ntext',
			'price',
			[
				'attribute' => 'hit',
				'value' => function($data){
					return !$data->hit ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
				},
				'format' => 'html',
			],
			[
				'attribute' => 'new',
				'value' => function($data){
					return !$data->new ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
				},
				'format' => 'html',
			],
			[
				'attribute' => 'sale',
				'value' => function($data){
					return !$data->sale ? '<span class="text-danger">Нет</span>' : '<span class="text-success">Да</span>';
				},
				'format' => 'html',
			],
			// 'keywords',
			// 'description',
			// 'img',
			// 'hit',
			// 'new',
			// 'sale',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>
</div>
