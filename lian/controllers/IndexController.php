<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/30 0030
 * Time: 10:27
 */
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Image;
use app\models\Goodss;
use app\models\ClassIfy;
use yii\web\UploadedFile;

class IndexController extends Controller
{
    public $enableCsrfValidation = false;
    // 跳转首页
    public function actionIndex()
    {
        return $this->render('index');
    }
    // 跳转登陆页
    public function actionLogin()
    {
        return $this->render('login');
    }
    // 登陆
    public function actionAdmin()
    {
        $data = yii::$app->request->post();
        $uname = $data['uname'];
        
        $pwd=$data['pwd'];
        $info = Yii::$app->db->createCommand("SELECT * FROM `user` WHERE uname='$uname' and pwd='$pwd'")->queryAll();
        if ($info) {
            return json_encode(['stat'=>200,'msg'=>'登陆成功']);
        }else{
            return json_encode(['stat'=>100,'msg'=>'登陆失败']);
        }
    }
}