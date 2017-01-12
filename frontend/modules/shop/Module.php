<?php
namespace frontend\modules\shop;
ini_set('display_errors', 'Off');
error_reporting(0);
class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\shop\controllers';
    public $defaultRoute    =   'index';

    public $controllerMap     =   [
      // 'h5report' => [
      //    'class' => 'frontend\modules\git\controllers\report\ReportController',
      // ],
    ];

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
