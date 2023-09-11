<?php

/**
 * @var yii\web\View $this
 * @var string $content
 */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\BootstrapAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.png')]);
/** @noinspection PhpUnhandledExceptionInspection */
$this->registerCssFile('@web/css/backend.css', [
    'depends' => [BootstrapAsset::class],
]);

$this->beginPage();

?>

<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="vh-100">
<?php $this->beginBody() ?>
<header  id="header">
    <?php
    NavBar::begin([
        'brandLabel' => 'CAFFÉ L’Antico',
        'brandUrl' => Yii::$app->homeUrl,
        'innerContainerOptions' => ['class' => 'container-fluid'],
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark sticky-top']
    ]);
    /** @noinspection PhpUnhandledExceptionInspection */
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav m-auto'],
        'items' => [
            ['label' => 'Контрольная панель', 'url' => ['/cpanel']],
            ['label' => 'Сайт', 'url' => ['/cpanel/site']],
            ['label' => 'Блог', 'url' => ['/cpanel/blog']],
            ['label' => 'Каталог', 'url' => ['/cpanel/catalog']],
            ['label' => 'Пользователи', 'url' => ['/cpanel/user']],
        ]
    ]);

    NavBar::end();
    ?>

</header>
<hr>
<main class="container-fluid">
    <?php
    if (!empty($this->params['breadcrumbs'])) {
        /** @noinspection PhpUnhandledExceptionInspection */
        echo Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);
    }
    /** @noinspection PhpUnhandledExceptionInspection */
    echo Alert::widget();
    echo $content;
    ?>

</main>
<?php $this->endBody() ?>
</body>
<?php $this->endPage() ?>
