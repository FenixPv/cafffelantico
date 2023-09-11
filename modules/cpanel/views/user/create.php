<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\cpanel\models\User $model
 */

$this->title = 'Новый пользователь';
$this->params['breadcrumbs'][] = ['label' => 'Контрольная панель', 'url' => ['/cpanel']];
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
