<?php

/**
 * @var $this yii\web\View
 * @var $model \app\modules\cpanel\models\LoginForm
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Войти';

?>

<div class="user-default-login">
    <article class="d-flex justify-content-center align-items-center pt-3">
        <section class="text-light text-center px-5 py-3 surface-dark">
            <h1 class="fs-1 caffelantico"><?php echo $this->title; ?></h1>
            <p class="fs-4">Для входа введите логин и пароль:</p>
            <?php
            $form = ActiveForm::begin(['id' => 'login-form']);

            echo $form->field($model, 'login')->textInput([
                'placeholder' => 'Логин',
                'class' => 'form-control form-control-lg form-control-dark',
            ])->label(false);
            echo $form->field($model, 'password')->passwordInput([
                'placeholder' => 'Пароль',
                'class' => 'form-control form-control-lg form-control-dark',
            ])->label(false);
            ?>
            <div class="form-check form-switch">
                <?php
                echo $form->field($model, 'rememberMe')->checkbox([
                    'class' => 'form-check-input',
                    'type' => 'checkbox',
                    'role' => 'switch',
                    'id' => 'flexSwitchCheckDefault'
                ])->label('Запомнить меня', [
                    'class' => 'form-check-label',
                    'for' => 'flexSwitchCheckDefault'
                ]);
                ?>
            </div>
            <?php
            echo Html::submitButton('Вход', ['class' => 'btn btn-lg btn-dark w-100', 'name' => 'login-button']);
            ActiveForm::end();
            ?>
        </section>
    </article>
</div>
