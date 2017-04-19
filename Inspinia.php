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

/**
 * Class Inspinia
 * @package xutl\inspinia
 */
class Inspinia extends \yii\base\Widget
{
    /**
     * @var array the HTML attributes (name-value pairs) for the form tag.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * Prevent a widget from being sortable (can only be used with the value 'false').
     * @var bool
     */
    public $sortable;
    /**
     * Prevent a widget from having a toggle button (can only be used with the value 'false').
     * @var bool
     */
    public $togglebutton;
    /**
     * Prevent a widget from having a delete button (can only be used with the value 'false').
     * @var bool
     */
    public $deletebutton;
    /**
     * Prevent a widget from having a edit button (can only be used with the value 'false').
     * @var bool
     */
    public $editbutton;
    /**
     * Prevent a widget from having a fullscreen button (can only be used with the value 'false').
     * @var bool
     */
    public $fullscreenbutton;
    /**
     * The file that is loaded with ajax.
     * @var string/array
     */
    public $load;
    /**
     * Seconds to refresh a ajax file (see 'data-widget-load').
     * @var integer
     */
    public $refresh;
    /**
     * Prevent a ajax widget from showing a refresh button (can only be used with the value 'false').
     * @var bool
     */
    public $refreshbutton;
    /**
     * Hide a widget at load (can only be used with the value 'true').
     * @var bool
     */
    public $hidden;
    /**
     * This is active by default, set it to false to hide.
     * @var bool
     */
    public $colorbutton;
    /**
     * @var bool
     */
    public $custombutton;
    /**
     * Collapse a widget upon load (can only be used with the value 'true'). This will allways be collapsed every page load.
     * @var bool
     */
    public $collapsed;
    /**
     * You can exclude grids from being a sortable/droppable area, this means that all widgets in this area will work, but cant be sortable/droppable and that all other widgets cant be dropped in this area. Add this attribute (can only be used with the value 'false') to a grid element.
     * @var bool
     */
    public $grid;
    /**
     * Removes all padding inside widget body
     * @var bool
     */
    public $noPadding;
    /**
     * Header
     * @var string
     */
    public $header;
    /**
     * Header options
     * @var array
     */
    public $headerOptions = [];
    /**
     * header > h2 options
     * @var array
     */
    public $headerH2Options = [];

    /**
     * Body
     * @var string
     */
    public $body;
    /**
     * .widget-body options
     * @var array
     */
    public $bodyOptions = [];
    /**
     * Color widget
     * @var string
     */
    public $color = 'jarviswidget-color-white';
    /**
     * Toolbar header
     * @var string/array
     */
    public $toolbar;
    /**
     * Toolbar options
     * @var array
     */
    public $toolbarOptions = [];

    /**
     * Body toolbar
     * @var string/array
     */
    public $bodyToolbarActions;

    /**
     * Body toolbar
     * @var string/array
     */
    public $bodyToolbar;
    /**
     * Body toolbar options
     * @var array
     */
    public $bodyToolbarOptions = [];
    /**
     * Footer
     * @var string/array
     */
    public $footer;
    /**
     * Footer options
     * @var array
     */
    public $footerOptions = [];
    /**
     * Edit box
     * @var string
     */
    public $editBox = '<input class="form-control" type="text"><span class="note"><i class="fa fa-check text-success"></i> Change title to update and save instantly!</span>';
    /**
     * Editbox options
     * @var array
     */
    public $editBoxOptions = [];
    /**
     * @var string
     */
    public $addon;
    /**
     * @var bool
     */
    private $_beginning = false;
    /**
     * @var array
     */
    private $_toolbarLastOptions = [];
    /**
     * @var array
     */
    private $_bodyToolbarLastOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        ob_start();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->_setBeginning(true);
        $body = ob_get_clean();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        Html::addCssClass($this->options, 'ibox');

        $this->_setLoad();

        echo Html::beginTag('div', $this->options); // main div

        echo Html::beginTag('div', ['class' => 'ibox-title']);

        $this->_getAddOn();
        $this->_getToolbar();

        if ($this->header !== null) {
            echo Html::tag('h5', $this->header, $this->headerH2Options);
        }
        echo Html::tag('span', Html::tag('i', '', ['class' => 'fa fa-refresh fa-spin']), ['class' => 'jarviswidget-loader']);

        echo Html::endTag('header');
        echo Html::beginTag('div');
        // widget body
        Html::addCssClass($this->bodyOptions, 'ibox-content');
        $this->_setNoPadding();
        echo Html::beginTag('div', $this->bodyOptions);
        $this->_setBodyToolbarActions();
        $this->_getBodyToolbar();
        echo $this->body !== null ? $this->body : $body;
        $this->_getFooter();
        echo Html::endTag('div');
        echo Html::endTag('div');
        echo Html::endTag('div');
    }

    /**
     * Begin header
     * [[beginHeader]]
     * your data
     * [[endHeader]]
     * @throws Exception
     */
    public function beginHeader()
    {
        $this->_setBeginning(true);
        ob_start();
    }

    /**
     * End header
     * @throws Exception
     */
    public function endHeader()
    {
        $this->_setBeginning(false);
        $this->header = trim(ob_get_clean());
    }

    /**
     * Begin toolbar
     * [[beginToolbar]]
     * your data
     * [[endToolbar]]
     * @param array $options Toolbar options
     * @throws Exception
     */
    public function beginToolbar($options = [])
    {
        $this->_setBeginning(true);
        $this->_toolbarLastOptions = $options;
        ob_start();
    }

    /**
     * End toolbar
     * @throws Exception
     */
    public function endToolbar()
    {
        $this->_setBeginning(false);
        $toolbar = trim(ob_get_clean());
        if (is_string($this->toolbar)) {
            $this->toolbar = [$this->toolbar];
        }
        $this->toolbar[] = [
            'body' => $toolbar,
            'options' => $this->_toolbarLastOptions,
        ];
        $this->_toolbarLastOptions = [];
    }

    /**
     * Begin addon
     * [[beginAddon]]
     * your data
     * [[endAddon]]
     * @throws Exception
     */
    public function beginAddon()
    {
        $this->_setBeginning(true);
        ob_start();
    }

    /**
     * End addon
     * @throws Exception
     */
    public function endAddon()
    {
        $this->_setBeginning(false);
        $this->addon = trim(ob_get_clean());
    }

    /**
     * Begin Body Toolbar
     * [[beginBodyToolbar]]
     * your data
     * [[endBodyToolbar]]
     * @param array $options
     * @throws Exception
     */
    public function beginBodyToolbar($options = [])
    {
        $this->_setBeginning(true);
        $this->_bodyToolbarLastOptions = $options;
        ob_start();
    }

    /**
     * End Body Toolbar
     * @throws Exception
     */
    public function endBodyToolbar()
    {
        $this->_setBeginning(false);
        $toolbar = trim(ob_get_clean());
        if (is_string($this->bodyToolbar)) {
            $this->bodyToolbar = [$this->bodyToolbar];
        }
        $this->bodyToolbar[] = [
            'body' => $toolbar,
            'options' => $this->_bodyToolbarLastOptions,
        ];
        $this->_bodyToolbarLastOptions = [];
    }

    /**
     * Begin Footer
     * [[beginFooter]]
     * your data
     * [[endFooter]]
     * @param array $options
     * @throws Exception
     */
    public function beginFooter($options = [])
    {
        $this->_setBeginning(true);
        $this->footerOptions = ArrayHelper::merge($this->footerOptions, $options);
        ob_start();
    }

    /**
     * End footer
     * @throws Exception
     */
    public function endFooter()
    {
        $this->_setBeginning(false);
        $this->footer = trim(ob_get_clean());
    }

    /**
     * Get toolbar
     */
    private function _getToolbar()
    {
        if ($this->toolbar !== null) {
            Html::addCssClass($this->toolbarOptions, 'widget-toolbar');
            $toolbars = is_string($this->toolbar) ? [$this->toolbar] : $this->toolbar;
            foreach ($toolbars as $toolbar) {
                if (is_array($toolbar)) {
                    $body = isset($toolbar['body']) ? $toolbar['body'] : null;
                    $options = isset($toolbar['options']) ? $toolbar['options'] : [];
                    Html::addCssClass($options, 'widget-toolbar');
                    echo Html::tag('div', $body, $options);
                } else {
                    echo Html::tag('div', $toolbar, $this->toolbarOptions);
                }
            }
        }
    }

    /**
     * Get body toolbar
     */
    private function _getBodyToolbar()
    {
        if ($this->bodyToolbar !== null) {
            Html::addCssClass($this->bodyToolbarOptions, 'widget-body-toolbar');
            $toolbars = is_string($this->bodyToolbar) ? [$this->bodyToolbar] : $this->bodyToolbar;
            foreach ($toolbars as $toolbar) {
                if (is_array($toolbar)) {
                    $body = isset($toolbar['body']) ? $toolbar['body'] : null;
                    $options = isset($toolbar['options']) ? $toolbar['options'] : [];
                    Html::addCssClass($options, 'widget-body-toolbar');
                    echo Html::tag('div', $body, $options);
                } else {
                    echo Html::tag('div', $toolbar, $this->bodyToolbarOptions);
                }
            }
        }
    }

    /**
     * Get footer
     */
    private function _getFooter()
    {
        if ($this->footer !== null) {
            Html::addCssClass($this->footerOptions, 'ibox-footer');
            $footers = is_string($this->footer) ? [$this->footer] : $this->footer;
            foreach ($footers as $footer) {
                if (is_array($footer)) {
                    $body = isset($footer['body']) ? $footer['body'] : null;
                    $options = isset($footer['options']) ? $footer['options'] : [];
                    echo Html::tag('div', $body, $options);
                } else {
                    echo Html::tag('div', $footer, $this->footerOptions);
                }
            }
        }
    }

    /**
     * Get addon
     */
    private function _getAddOn()
    {
        if ($this->addon !== null) {
            echo $this->addon;
        }
    }

    /**
     * Set load
     */
    private function _setLoad()
    {
        if ($this->load !== null && !array_key_exists('data-widget-load', $this->options)) {
            $this->options['data-widget-load'] = Url::to($this->load);
        }
    }
    /**
     * Set no padding
     */
    private function _setNoPadding()
    {
        if ($this->noPadding !== null) {
            Html::addCssClass($this->bodyOptions, 'no-padding');
        }
    }

    private function _setBodyToolbarActions()
    {
        if ($this->bodyToolbarActions !== null) {
            $this->bodyToolbar = Toolbar::widget(['items' => $this->bodyToolbarActions]);
        }
    }

    /**
     * 设置开始
     * @param $bool
     * @throws Exception
     */
    private function _setBeginning($bool)
    {
        if (!is_bool($bool)) {
            throw new Exception('$bool in not boolean');
        }
        if ($this->_beginning === $bool) {
            throw new Exception("Error begin or end.");
        }
        $this->_beginning = $bool;
    }
}