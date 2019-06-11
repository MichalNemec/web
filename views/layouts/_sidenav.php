<div class="sidenav flex flex-direction-column flex-justify-content-space-between">
    <div class="logo">
        <a href="/">
            MA-KO
            <small>Inspiration</small>
        </a>
    </div>
    <div class="menu">
        <div class="hamburger-btn flex flex-direction-column flex-justify-content-space-between"
             uk-toggle="target: #offcanvas-nav-primary">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="search">
        <?php if(Yii::$app->user->getIsGuest()) {
            echo \yii\helpers\Html::a(' <i class="fas fa-user"></i>', ['/user/login']);
        } else {
            echo \yii\helpers\Html::a('<i class="far fa-user"></i><i class="fas fa-check"></i>', ['/user/profile']);
        }
        ?>
        <?= \yii\helpers\Html::a('<i class="fas fa-search"></i>', ['search/index']); ?>
    </div>
</div>

<div id="offcanvas-nav-primary" uk-offcanvas="mode: reveal; overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">
        <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical uk-nav-parent-icon" uk-nav>
            <?php foreach(\app\models\Menu::getFrontendMenu() as $menu): ?>
                <?php if(empty($menu['children'])): ?>
                    <li>
                        <?= \yii\helpers\Html::a($menu['title'], $menu['slug']); ?>
                    </li>
                <?php else: ?>
                    <li class="uk-parent">
                        <?= \yii\helpers\Html::a($menu['title'], $menu['slug']); ?>
                        <ul class="uk-nav-sub">
                            <?php foreach($menu['children'] as $child): ?>
                                <li>
                                    <?= \yii\helpers\Html::a($child['title'], $child['slug']); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>