Select2 Widget for Yii 2 with Materialize styles
================================================

[![Latest Stable Version](https://poser.pugx.org/yii-ui/yii2-materialize-select2/version)](https://packagist.org/packages/yii-ui/yii2-materialize-select2)
[![Total Downloads](https://poser.pugx.org/yii-ui/yii2-materialize-select2/downloads)](https://packagist.org/packages/yii-ui/yii2-materialize-select2)
[![Maintainability](https://api.codeclimate.com/v1/badges/f8fa3c129287f7c567aa/maintainability)](https://codeclimate.com/github/yii-ui/yii2-materialize-select2/maintainability)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)
[![License](https://poser.pugx.org/yii-ui/yii2-materialize-select2/license)](https://packagist.org/packages/yii-ui/yii2-materialize-select2)


This is an [Yii framework 2.0](http://www.yiiframework.com) widget of the [Select2](https://select2.org/) replacement for select boxes with styles for the [Materialize CSS Framework](http://materializecss.com/).

Installation
------------

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```
php composer.phar require yii-ui/yii2-materialize-select2
```

or add

```
"yii-ui/yii2-materialize-select2": "~1.0.0"
```

to the require section of your `composer.json` file.

Usage
-----

```php 
use yiiui\yii2materializeselect2\Select2:


// with \yii\widgets\ActiveForm;
echo $form->field($model, 'attribute')->widget(Select2::class, [
    'items' => [1 => 'Apple', 2 => 'Banana'],
    'options' => [
        'placeholder' => 'Select your favourite',
    ],
    'clientOptions' => [
        'allowClear' => true
    ],
]);
    
// as widget 
Select2::widget([
    'name' => 'input-name',
    'value' => 2,
    'items' => [1 => 'Apple', 2 => 'Banana'],
    'options' => [
        'placeholder' => 'Select your favourite',
    ],
    'clientOptions' => [
        'allowClear' => true
    ],    
]);
```


More [Examples](https://www.yii-ui.com/yii2-materialize-select2) will be added soon at https://www.yii-ui.com/yii2-materialize-select2.
For plugin configuration see Materialize [Documentation](http://next.materializecss.com/).

Documentation
------------

[Documentation](https://www.yii-ui.com/yii2-materialize-select2) will be added soon at https://www.yii-ui.com/yii2-materialize-select2.

License
-------

**yii2-materialize-select2** is released under the MIT License. See the [LICENSE.md](LICENSE.md) for details.
