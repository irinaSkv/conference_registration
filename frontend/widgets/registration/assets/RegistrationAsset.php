<?php

namespace frontend\widgets\registration\assets;

use yii\web\AssetBundle;

class RegistrationAsset extends AssetBundle
{
    public $sourcePath  = '@frontend/resources';

    public $js = [
        'js/RegistrationForm.js',
    ];
    
    public $publishOptions = [
        'forceCopy' => true
    ];
    
    public $css = [
        'css/RegistrationForm.css'
    ];

    public $depends = [];
}