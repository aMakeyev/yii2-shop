<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\widgets\DetailView;

mihaildev\elfinder\Assets::noConflict($this);

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">Родительская категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?= \frontend\components\MenuWidget::widget(['tpl' => 'select_product', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    ?>
    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder', [])
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

	<?php $img = $model->getImage();?>
	<?= "<img src='{$img->getUrl('x85')}'>" ?>

    <?= $form->field($model, 'image')->fileInput() ?>
	<?php $imgs = $model->getImages();
	foreach($imgs as $img){
		echo "<div class='text-center float-left''><img src='{$img->getUrl('x85')}'><br>";
		//echo Html::input('checkbox',['name' => 'delimg'],['value' => $img->id]);
		//$form->field($model, 'hit')->checkbox([ '0', $img->id]);
		echo Html::a('Удалить', ['deleteimage', 'id' => $model->id, 'imgId' => $img->id], [
			'class' => 'text-danger',
			'data' => [
				'method' => 'post',
			],
		]) . '</div>';
	}?>
	<?= '<div class="clearfix"></div>';?>
    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
