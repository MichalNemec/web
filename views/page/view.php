<?php
use app\modules\admin\components\Helpers\Helpers;
$this->title = Yii::$app->name . ' | '. $model->title;
?>

<section class="section--bg section--bg-2">
    <div class="section--content section--content-fix">
        <div class="">
            <div class="uk-padding-large uk-width-1-1">
                <h6><?= $model->title; ?></h6>
                <h1>
                    <?= Helpers::makeFancyTitle($model->subtitle); ?>
                </h1>
            </div>
            <div class="uk-child-width-1-1 uk-padding-large" uk-height-match="target: > div > .uk-card" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300">
                <?= $model->text; ?>
            </div>
        </div>
    </div>
</section>