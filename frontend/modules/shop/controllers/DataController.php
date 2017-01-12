<?php
namespace frontend\modules\shop\controllers;

use Yii;

/**
 * Site controller
 */
class DataController extends BaseController
{
    public $enableCsrfValidation = false;


    public function actionProductList()
    {
        $category     = Yii::$app->request->get('category');
        $json = file_get_contents(__DIR__ . "/../_data/$category.json");
        return $json;
    }

    public function actionReportCode()
    {
        $code     = Yii::$app->request->get('code');
        if($code)
        {
            $this->setCodeCookie($code);
        }
        return '';
    }

}
