<?php
use yii\helpers\Url;
?>

<div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky" class="uk-hidden@m">
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="/">
                <img src="/img/logo.png" alt="">
            </a>
        </div>
        <div class="uk-navbar-right">
            <a class="uk-navbar-toggle" href="#" uk-toggle="target: #offcanvas-reveal">
                <span uk-navbar-toggle-icon><span class="mobile-menu-text">Menu</span></span>
            </a>
        </div>
    </nav>
    <div id="offcanvas-reveal" uk-offcanvas="mode: reveal; flip: true; overlay: true;container: false">
        <div class="uk-offcanvas-bar">

            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <h3>Menu</h3>
            <div class="hot-links">
                <span>
                    ZAVOLEJTE NÁM: <a href="tel:0420777570921" class="hvr-underline-from-left">+420 777 570 921</a>
                </span>
                <span>
                    KONTAKTUJTE NÁS: <a href="mailto:info@makoinspiration.cz" class="hvr-underline-from-left">info@makoinspiration.cz</a>
                </span>
            </div>
            <ul class="sidebar--nav sidebar--nav-half-padding uk-nav-parent-icon uk-width-1-1" uk-nav>
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
    </div>
</div>