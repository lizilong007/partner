<?php
namespace frontend\modules\shop\controllers;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\View;
class BaseController extends \frontend\controllers\BaseController
{

    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);

        $this->_setHeader();
        $this->_setCookies();

        return $result;
    }

    public function getGuuid()
    {
        return \Yii::$app->request->cookies->get('guuid');
    }

    public function getCode()
    {
        return \Yii::$app->request->cookies->get('code');
    }

    public function setCodeCookie($code)
    {
        if(!\Yii::$app->request->cookies->has('code'))
        {
            \Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'code',
                'value' => $code,
                'expire'=> time() + 365 * 24 * 60 * 60
            ]));
        }
    }

    private function _setCookies()
    {
        if(!\Yii::$app->request->cookies->has('guuid'))
        {
            \Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'guuid',
                'value' => uniqid(),
                'expire'=> time() + 365 * 24 * 60 * 60
            ]));
        }
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
