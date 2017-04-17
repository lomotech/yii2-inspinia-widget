<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace xutl\inspinia;

use yii\web\AssetBundle;

class InspiniaAsset extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@vendor/xutl/yii2-inspinia-widget/assets';

    public $css = [
        //'css/open-sans.css',
        'css/inspinia.css'
    ];

    /**
     * @inherit
     */
    public $js = [
        'js/inspinia.js',
    ];

    public $depends = [
        'xutl\inspinia\PaceAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'xutl\fontawesome\Asset',
    ];
}