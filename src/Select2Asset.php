<?php
namespace yiiui\yii2materializeselect2;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    public $sourcePath = '@npm/select2/dist';

    public $js = [
        'js/select2.full.min.js'
    ];

    public $css = [
        'css/select2.min.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
