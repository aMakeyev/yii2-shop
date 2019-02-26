<?php

use yii\helpers\Html;



$this->title = 'Добавить заказ';
$this->params['breadcrumbs'][] = ['label' => 'Список заказов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('form_create', [
        'model' => $model,
    ]) ?>

</div>
