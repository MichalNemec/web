<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="main">
    <div class="site-index">
        <div class="container-fluid">
            <div class="row">
                <?= $this->render("_slider"); ?>
                <?= $this->render('_about'); ?>
                <?= $this->render('_categories'); ?>
                <?= $this->render('_which'); ?>
            </div>

        </div>
    </div>
</div>
<div class="uk-background-fixed uk-background-center-center"
     style="background-image: url(https://www.henkel.com/resource/image/38056/4x3/1249/938/158ca2e27bf8fe95517f9b0277b9da6e/pU/henkel-duesseldorf-a33-building.jpg);">
    <?= $this->render('_stores'); ?>
</div>
<div class="main">
    <?= $this->render('_newsletter'); ?>
    <div>
        <?= $this->render('_instagram'); ?>
    </div>
</div>