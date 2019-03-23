<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить товар?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	<?php $img = $model->getImage();?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'name',
            //'content:ntext',
			[
				'attribute' => 'content',
				'format' => 'html',
			],
            'price',
            'keywords',
            'description',
            //'img',
			[
				'attribute' => 'image',
				'value' => "<img src='{$img->getUrl('x120')}'>",
				'format' => 'html',
			],
			'hit',
            'new',
            'sale',
        ],
    ]) ?>

</div>
