<?php

use yii\grid\SerialColumn;
use app\modules\cpanel\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\cpanel\models\search\SearchUser $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = ['label' => 'Контрольная панель', 'url' => ['/cpanel']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php

    Pjax::begin();

    /** @noinspection PhpUnhandledExceptionInspection */
    echo GridView::widget(config: [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            'created_at:date',
            'updated_at:date',
            'login',
            'email:email',
            'status',
            [
                'class' => ActionColumn::class,
                'urlCreator' => static function ( $action, User $model) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]) ?>

    <?php Pjax::end(); ?>

</div>
