<?php
namespace frontend\modules\shop\controllers;

use Yii;

/**
 * Site controller
 */
class OrderController extends BaseController
{
    public $enableCsrfValidation = false;


    public function actionReserve()
    {
        var_dump($this->getGuuid());
    }

}
