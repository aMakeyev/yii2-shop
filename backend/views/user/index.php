<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\helpers\Url;

$this->title = 'Список пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?/*= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
				'filter' => ['0' => 'Не активен', '10' => 'Активен']
			],
            //'created_at',
			[
				'attribute' => 'created_at',
				'filter' => DatePicker::widget([
					'model' => $searchModel,
					'attribute' => 'date_from',
					'attribute2' => 'date_to',
					'type' => DatePicker::TYPE_RANGE,
					'separator' => '-',
					'pluginOptions' => [
						'todayHighlight' => true,
						'autoclose'=>true,
						'format' => 'yyyy-mm-dd',
					],
				]),
				'format' => 'datetime',
			],
            //'updated_at',
			/*[
				'attribute' => 'id',
				'value' => function($data){
					return $data->auth_assignment[0]->item_name;
				},
				'filter' => false,
				'label' => 'Доступ',
			],
			[
				'attribute' => 'id',
				'value' => function($data){
					$roles ='';
					foreach($data->auth_assignment as $k => $v){
						$roles .= $k->item_name . ' ';
					}
					return $roles;
				},
				'filter' => false,
				'label' => 'Доступ',
			],*/
			['class' => 'yii\grid\ActionColumn',
				'template' => '{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{permit}&nbsp;&nbsp;{delete}&nbsp;&nbsp',
				'buttons' =>
					[
						'permit' => function ($url, $model) {
							return Html::a('<span class="glyphicon glyphicon-wrench"></span>', Url::to(['/permit/user/view', 'id' => $model->id]), [
								'title' => Yii::t('yii', 'Изменить права доступа')
							]); },
					]
			],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
