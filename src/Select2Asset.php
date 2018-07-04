<?php
namespace yiiui\yii2materializeselect2;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    public $sourcePath = '@bower/select2/dist';

    public $js = [
        'js/select2.full.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
