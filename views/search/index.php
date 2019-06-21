<?php
use yii\helpers\Url;
use app\modules\admin\components\Helpers\Helpers;

$this->title = Yii::$app->name . ' | Vyhledávání: '. $query;
?>

<section class="section--bg section--bg-2">
    <div class="section--content section--content-fix">
        <div class="">
            <div class="uk-padding-large uk-width-1-1">
                <h6>Vyhledávání</h6>
                <h1>
                    <?= $query ?>
                </h1>
            </div>
            <div class="uk-child-width-1-1 uk-padding-large uk-padding-remove-top" uk-height-match="target: > div > .uk-card" uk-grid
                 uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300">
                <?php foreach($searchResults as $result) : ?>
                <div class="hvr-grow">
                    <div class="uk-card uk-card-default uk-card-body uk-position-relative">
                        <?= \yii\helpers\Html::a('', Url::to(['page/view', 'slug' => $result->slug]), ['class' => 'link--absolute']); ?>
                        <h6><?= $result->title ?></h6>
                        <h3><?= Helpers::makeFancyTitle($result->subtitle); ?></h3>
                        <?= Helpers::truncate($result->text, 200); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>