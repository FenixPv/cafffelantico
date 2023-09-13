<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\cpanel\models\Page $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php
    /** @noinspection PhpUnhandledExceptionInspection */
    echo $form->field($model, 'body')->widget(
            CKEditor::class,
        config: [
        'editorOptions' => \mihaildev\elfinder\ElFinder::ckeditorOptions(
            'elfinder',
            [
            'preset' => 'basic',
            'height' => '35vh',
            'inline' => false, // по умолчанию false
        ])
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
