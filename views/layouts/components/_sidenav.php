<?php
use yii\helpers\Url;
?>

<?= $this->render('_mobilenav') ?>
<aside class="sidebar uk-visible@m">
    <div class="sidebar--wrap uk-flex uk-flex-middle uk-flex-center uk-flex-column">
        <div class="sidebar--logo hvr-grow">
            <a href="/">
                <img src="/img/logo.png" alt="">
            </a>
        </div>
        <ul class="sidebar--nav uk-nav-default uk-nav-parent-icon uk-width-1-1" uk-nav>
            <li class="uk-nav-header">Navigace</li>
            <li><a href="/">Domů</a></li>
            <?php foreach(\app\models\Menu::getFrontendMenu() as $menu): ?>
                <?php if(empty($menu['children'])): ?>
                    <li>
                        <?= \yii\helpers\Html::a($menu['title'], Url::to(['page/view', 'slug' => $menu['slug']])); ?>
                    </li>
                <?php else: ?>
                    <li class="uk-parent">
                        <?= \yii\helpers\Html::a($menu['title'], $menu['slug'], ['class' => 'parent']); ?>
                        <ul class="uk-nav-sub">
                            <?php foreach($menu['children'] as $child): ?>
                                <li>
                                    <?= \yii\helpers\Html::a($child['title'], Url::to(['page/view', 'slug' => $child['slug']])); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            <li>
                <?php if(Yii::$app->user->getIsGuest()) : ?>
                    <?= \yii\helpers\Html::a('Přihlásit se', ['/user/login']); ?>
                <?php else : ?>
                    <?= \yii\helpers\Html::a('Profil', ['/user/profile']); ?>
                <?php endif; ?>
            </li>

            <li class="uk-nav-header">Sledujte nás</li>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>

            <li class="uk-nav-transparent-divider"></li>
            <li>
                <?= \app\Components\Search\SearchWidget::widget() ?>
            </li>
        </ul>
    </div>
</aside>