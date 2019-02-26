<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Пользователь: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Список пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
			//'status',
			[
				'attribute' => 'status',
				'value' => function ($data){
					return $data->status ? '<span class="text-success">Активен</span>' : '<span class="text-danger">Не активен</span>';

				},
				'format' => 'html',
			],
            //'created_at',
			[
			   'attribute' => 'created_at',
			   'format' => 'datetime',
			],
			/*[
				'attribute' => 'id',
				'value' => function($data){
					return $data->auth_assignment[0]->item_name;
				},
				'label' => 'Доступ',
			],*/
            //'updated_at',
			[
				'attribute' => 'updated_at',
				'format' => 'datetime',
			]

        ],
    ]) ?>

</div>
