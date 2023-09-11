<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\cpanel\models\User $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-form">

    <?php

    $form = ActiveForm::begin();
    echo $form->field($model, 'login')->textInput(['maxlength' => true]);
    echo $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]);
    echo $form->field($model, 'email')->textInput(['maxlength' => true]);
    echo $form->field($model, 'status')->dropDownList($model::getStatusesArray());
    ?>


    <div class="form-group mt-3">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
