<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1>Просмотр заказа №<?= $model->id ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить заказ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			[
				'attribute' => 'created_at',
				'format' => 'datetime',
			],
			[
				'attribute' => 'updated_at',
				'format' => 'datetime',
			],
            'qty',
            'sum',
//            'status',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">Активен</span>' : '<span class="text-success">Завершен</span>',
                'format' => 'html',
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItems;?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($items as $item):?>
                <tr>
                    <td><a href="<?= \yii\helpers\Url::to(['/product/view', 'id' => $item->product_id])?>"><?= $item['name']?></a></td>
                    <td><?= $item['qty_item']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['sum_item']?></td>
                </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>

</div>
