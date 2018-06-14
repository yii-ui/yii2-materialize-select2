<?php
namespace yiiui\yii2materializeselect2;

use yii\web\AssetBundle;

class Select2MaterializeAsset extends AssetBundle
{
    public $sourcePath = __DIR__.'/assets';

    public $css = [
        'css/select2materialize.min.css',
    ];

    public $depends = [
        'yiiui\yii2materializeselect2\Select2Asset',
    ];
}
