<?php
namespace frontend\modules\git\controllers;

use Yii;
use GitHubWebhook\Handler;

/**
 * Site controller
 */
class WebController extends \frontend\controllers\BaseController
{
    public function actionHooks()
    {
        $handler = new Handler("wodemiyao5225840,./;", \Yii::getAlias('@root'));
        if($handler->handle()) {
            echo "OK";
        } else {
            echo "Wrong secret";
        }
    }
}
