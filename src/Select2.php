<?php

namespace yiiui\yii2materializeselect2;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\InputWidget;

/**
 * Class Select2
 * @package yiiui\yii2materializeselect2
 */
class Select2 extends InputWidget
{
    /**
     * @var array
     */
    public $clientOptions = [];

    /**
     * @var array
     */
    public $clientEvents = [];

    /**
     * @var array
     */
    public $items = [];

    /**
     * @var bool
     */
    public $allowHtml = true;

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init() {
        parent::init();

        Html::addCssClass($this->options, 'browser-default');
        Html::addCssStyle($this->options, ['width' => '100%'], false);

        if ($this->allowHtml && empty($this->clientOptions['escapeMarkup'])) {
            $this->clientOptions['escapeMarkup'] = new JsExpression('function(m){return m}');
        }

        if (empty($this->clientOptions['placeholder']) && !empty($this->options['placeholder'])) {
            $this->clientOptions['placeholder'] = ArrayHelper::remove($this->options, 'placeholder');
        }
    }

    /**
     * @return bool
     */
    public function beforeRun()
    {
        if (!parent::beforeRun()) {
            return false;
        }

        Select2MaterializeAsset::register($this->getView());

        return true;
    }

    /**
     * @return string
     */
    public function run() {
        $this->registerPlugin();

        if ($this->hasModel()) {
            return Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
        } else {
            return Html::dropDownList($this->name, $this->value, $this->items, $this->options);
        }
    }

    protected function registerPlugin()
    {
        $id = $this->options['id'];

        if (!isset($this->clientOptions['dropdownParent'])) {
            $this->clientOptions['dropdownParent'] = new JsExpression('jQuery(jQuery(\'#'.$id.'\').parents(\'.modal-content, body\')[0])');
        }

        $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
        $js = ['jQuery(\'#'.$id.'\').select2('.$options.');'];

        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = 'jQuery(\'#'.$id.'\').on(\''.$event.'\', '.$handler.');';
            }
        }

        $this->getView()->registerJs(implode("\n", $js));
    }
}
