<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/3 0003
 * Time: 11:30
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AddController extends Controller
{
    public $enableCsrfValidation = false;
//    添加接口
    public function actionIndex()
    {
        $res = file_get_contents("php://input");
        $arr = json_decode($res,true);
        $data = $arr['formdata'];
        $sql = yii::$app->db->createCommand()->insert('message',$data)->execute();
        if ($sql){
            return json_encode(['code'=>200,'msg'=>'添加成功','data'=>$sql]);
        }else{
            return json_encode(['code'=>201,'msg'=>'添加失败']);
        }
    }
//    展示借口
    public function actionShow(){
        $sql = yii::$app->db->createCommand("select * from message")->queryAll();
        return json_encode($sql);
    }
//    点击详情展示接口
    public function actionLshow()
    {
        $id = yii::$app->request->get('id');
        file_put_contents('12.txt',$id);
        $sql = Yii::$app->db->createCommand("SELECT * FROM message WHERE id = $id")
            ->queryOne();
        return json_encode($sql);
    }









}