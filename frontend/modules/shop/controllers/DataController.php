<?php
namespace frontend\modules\shop\controllers;

use Yii;

/**
 * Site controller
 */
class DataController extends \frontend\controllers\BaseController
{
    public $enableCsrfValidation = false;


    public function actionProductList()
    {
        $this->_setHeader();
        $category     = Yii::$app->request->get('category');
        $json = file_get_contents(__DIR__ . "/../_data/$category.json");
        return $json;
    }



    private function _setHeader()
    {
        header('Content-type: application/json');
        // 指定允许其他域名访问
        header('Access-Control-Allow-Origin:*');
        // 响应类型
        header('Access-Control-Allow-Methods:GET,POST');
        // 响应头设置
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
    }
}
