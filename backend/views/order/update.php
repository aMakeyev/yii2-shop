<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Order */

$this->title = 'Редактирование заказа: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';


?>
<div class="order-update">

    <h1>Редактирование заказа №<?= $model->id ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'attributes' => [
			[
				'attribute' => 'created_at',
				'format' => 'datetime',
			],
			[
				'attribute' => 'updated_at',
				'format' => 'datetime',
			],
		]
    ]) ?>

</div>
