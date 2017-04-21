<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace xutl\inspinia;

use yii\helpers\Url;
use yii\helpers\Html;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\bootstrap\BootstrapWidgetTrait;

/**
 * Class Widget
 * @package xutl\inspinia
 */
class Widget extends \yii\base\Widget
{
    use BootstrapWidgetTrait;

    /**
     * @var array the HTML attributes for the widget container tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
}