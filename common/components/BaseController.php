<?php
namespace common\components;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\View;
class BaseController extends Controller
{

    /**
     * layout 统一
     */
    public $layout = "@common/views/layout.php";

    public function init()
    {
        parent::init();
    }

    /**
     * 设置js文件
     */
    public function setJsFile($files, $options = [], $key = null )
    {
        // $jsFiles  =   StaticVersionUtil::js($files);
        if(is_array($jsFiles))
        {
            foreach($jsFiles ?: [] as $jf)
            {
                Yii::$app->view->registerJsFile($jf, $options, $key);
            }
        }
        else
        {
            Yii::$app->view->registerJsFile($jsFiles, $options, $key);
        }
    }
    /**
     * The JS code block to be registered
     */
    public function setJs($js, $position = View::POS_READY, $key = null)
    {
        Yii::$app->view->registerJs( $js, $position, $key );
    }

    public function setCss( $css, $options = [], $key = null )
    {
        Yii::$app->view->registerCss( $css, $options, $key );
    }

    /**
     * 设置css文件
     */
    public function setCssFile($files, $options = [], $key = null )
    {
        // $cssFiles  =   StaticVersionUtil::css($files);
        if(is_array($cssFiles))
        {
            foreach($cssFiles ?: [] as $cf)
            {
                Yii::$app->view->registerCssFile($cf, $options, $key);
            }
        }
        else
        {
            Yii::$app->view->registerCssFile($cssFiles, $options, $key);
        }

    }

    protected function setTitle($title)
    {
        Yii::$app->view->title = $title;
    }

    protected function setKeywords($str)
    {
        $this->setMetaTag(['content' => $str], 'keywords');
    }

    protected function setDescription($str)
    {
        $this->setMetaTag(['content' => $str], 'description');
    }

    private function setMetaTag($str, $type)
    {
        Yii::$app->view->registerMetaTag($str, $type);
    }

    public function outPutJSON($array){
        exit(json_encode($array));
    }

    // 为了兼容，搬入这里
    public function outputResult($errcode = 0, $errmsg = '', $data = array()) {
        header('Content-type: application/json');
        $result = array();
        $result['errcode'] = $errcode;
        $result['errmsg'] = $errmsg;
        $result['data'] = self::retOutputFilter($data);
        echo json_encode($result);
        Yii::$app->end();
    }

    private static function retOutputFilter($data) {
        if(!is_array($data))
        {
            return $data;
        }

        foreach($data as $k => $v)
        {
            if(is_null($v))
            {
                unset($data[$k]);
            }
            else if(is_array($v))
            {
                $data[$k] = self::retOutputFilter($v);
            }
        }

        return $data;
    }

}
