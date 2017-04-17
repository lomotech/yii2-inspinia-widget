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
    public $sourcePath = '@xutl/inspinia/assets';

    public $css = [
        'css/inspinia.css'
    ];

    /**
     * @inherit
     */
    public $js = [
        'js/inspinia.js',

    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}