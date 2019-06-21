<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>"
      class="cors geolocation svg templatestrings picture filereader fetch svgfilters willchange audio adownload audioloop csspointerevents template placeholder imgcrossorigin inlinesvg videocrossorigin videopreload csscalc csspositionsticky supports svgclippaths svgforeignobject video svgasimg no-touchevents checked cssvmaxunit cssvminunit cssvwunit fullscreen objectfit object-fit cssfilters flexbox flexboxlegacy flexwrap no-overflowscrolling desktop landscape windows windows10 windows10_0 64bit chrome chrome74 chrome74_0 webkit cs-cz webpalpha webpanimation webplossless webp webp-alpha webp-animation webp-lossless audiopreload no-videoautoplay">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/site.webmanifest">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#cd9446">
    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#cd9446">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<svg aria-hidden="true" focusable="false" style="width:0;height:0;position:absolute;">
    <linearGradient id="gradient-horizontal">
        <stop offset="0%" stop-color="var(--color-stop-1)" />
        <stop offset="50%" stop-color="var(--color-stop-2)" />
        <stop offset="100%" stop-color="var(--color-stop-3)" />
    </linearGradient>
    <linearGradient id="gradient-vertical" x2="0" y2="1">
        <stop offset="0%" stop-color="var(--color-stop-1)" />
        <stop offset="50%" stop-color="var(--color-stop-2)" />
        <stop offset="100%" stop-color="var(--color-stop-3)" />
    </linearGradient>
</svg>
<?php $this->beginBody() ?>

<?= Alert::widget() ?>
<div class="wrapper">
    <?= $this->render('components/_sidenav'); ?>
    <?= $content ?>
    <?= $this->render('components/_footer'); ?>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
