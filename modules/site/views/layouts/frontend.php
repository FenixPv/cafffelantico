<?php

/**
 * @var yii\web\View $this
 * @var string $content
 */

/** @noinspection DuplicatedCode */
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
$this->registerCssFile('@web/css/frontend.css', [
    'depends' => [BootstrapAsset::class],
]);
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.googleapis.com']);
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com']);
$this->registerLinkTag([
    'rel' => 'stylesheet',
    'href' => 'https://fonts.googleapis.com/css2?family=Rubik+Dirt&family=Russo+One&display=swap'
]);

$this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header  id="header" class="mb-3 sticky-top">
    <?php
    NavBar::begin([
        'brandLabel' => 'CAFFÉ L’Antico',
        'brandUrl' => Yii::$app->homeUrl,
        'innerContainerOptions' => ['class' => 'container'],
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark']
    ]);
    /** @noinspection PhpUnhandledExceptionInspection */
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav m-auto'],
        'items' => [
            ['label' => 'История', 'url' => ['/history']],
            ['label' => 'Страсть', 'url' => ['/site/about']],
            ['label' => 'Кофе', 'url' => ['/site/contact']],
        ]
    ]);

    NavBar::end();
    ?>

</header>
<hr>
<main class="container">
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
<?php
$this->endPage();
