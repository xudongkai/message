<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AdminController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        return $this->render('signin');
    }

    public function actionLogin()
    {
        $data = yii::$app->request->post();
        $uname = $data['uname'];
        $time = time("YmdHis");
        var_dump($time);die;
        $data['time'] = time("YmdHis");
        $sql = yii::$app->db->createCommand()->insert('admin',$data)->execute();
        if ($sql){
            $res = yii::$app->db->createCommand("select * from admin where `uname` = '$uname'")->queryALL();

            if (1){}

        }
    }
}