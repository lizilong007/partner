<?php
namespace frontend\modules\git;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\git\controllers';
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
