<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>
<div class="main">
    <?= $this->render('components/_welcome') ?>
    <?= $this->render('components/_partners') ?>
    <?= $this->render('components/_products') ?>
    <?= $this->render('components/_howitworks') ?>
    <?= $this->render('components/_testimonials') ?>
    <?= $this->render('components/_map') ?>
    <?= $this->render('components/_stats') ?>
    <?= $this->render('components/_overview') ?>
    <?= $this->render('components/_newsletter') ?>
    <?= $this->render('components/_invitation') ?>
</div>