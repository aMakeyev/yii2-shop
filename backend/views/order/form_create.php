<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;


?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model,'created_at')->widget(
		DateTimePicker::className([
			'name' => 'datetime_10',
			'options' => ['placeholder' => 'Select operating time ...'],
			'convertFormat' => true,
			'pluginOptions' => [
				'format' => 'Y-m-d H:i:s',
				'startDate' => '01-Mar-2014 12:00 AM',
				'todayHighlight' => true
			]
		])
	) ?>
	<?= $form->field($model,'updated_at')->widget(
		DateTimePicker::className([
			'name' => 'datetime_10',
			'options' => ['placeholder' => 'Select operating time ...'],
			'convertFormat' => true,
			'pluginOptions' => [
				'format' => 'Y-m-d H:i:s',
				'startDate' => '01-Mar-2014 12:00 AM',
				'todayHighlight' => true
			]
		])
	) ?>

    <?= $form->field($model, 'qty')->textInput() ?>

    <?= $form->field($model, 'sum')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ '0' => 'Активен', '1' => 'Завершен', ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
