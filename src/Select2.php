<?php
namespace yiiui\yii2materializeselect2;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\widgets\InputWidget;

class Select2 extends InputWidget
{
    /***
     * @var array
     */
    public $clientOptions = [];
    /***
     * @var array
     */
    public $clientEvents = [];
    /***
     * @var array
     */
    public $items = [];

    public function init() {
        parent::init();

        Html::addCssClass($this->options, 'browser-default');
        Html::addCssStyle($this->options, ['width' => '100%'], false);

        if (empty($this->clientOptions['placeholder']) && !empty($this->options['placeholder'])) {
            $this->clientOptions['placeholder'] = ArrayHelper::remove($this->options, 'placeholder');
        }
    }

    /***
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
