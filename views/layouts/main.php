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
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= Alert::widget() ?>
<div class="wrapper">
    <?= $this->render('_cart-block'); ?>
    <?= $this->render('_sidenav'); ?>
    <div uk-height-viewport="expand: true">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-lg-offset-1 col-lg-10 uk-padding-remove-bottom">
                    <?= Breadcrumbs::widget([
                        'homeLink' => [
                            'label' => '<i class="fa fa-home"></i>',
                            'url' => Yii::$app->homeUrl,
                        ],
                        'encodeLabels' => false,
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    </section>
                </div>
            </div>
        </div>
        <?= $content ?>
    </div>
    <div class="main uk-padding-remove">
        <?= $this->render('_footer'); ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
