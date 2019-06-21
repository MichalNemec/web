<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Muli:400,700&display=swap',
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/css/uikit.min.css',
        'https://use.fontawesome.com/releases/v5.8.2/css/all.css',
        'css/hover.min.css',
        'css/main.min.css',
    ];
    public $js = [
        'https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit-icons.min.js',
        'js/pace.min.js',
        'js/modernizr.custom.js',
        'js/draggabilly.pkgd.min.js',
        'js/elastiStack.js',
        'js/frontend.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
