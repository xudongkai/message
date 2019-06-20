<?php

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

class SkuController extends Controller
{
    public $enableCsrfValidation= false;
//   跳转分类添加页
    public function actionIfy()
    {
        $model = new ClassIfy();
        return $this->render('ify',['model'=>$model]);
    }
//分类表单，文件上传添加
    public function actionIfyadd()
    {
        $photo = 'uploads/';
        $model = new ClassIfy();
        if (Yii::$app->request->isPost) {
            $cname = $_POST['ClassIfy']['cname'];
            $model->img = UploadedFile::getInstances($model, 'img');
            if ($model->upload()) {
                // 文件上传成功
               $img = $photo.$model->img[0]->name;
                $data = array('cname'=>$cname,'img'=>$img);
               $sql = yii::$app->db->createCommand()->insert('classify',$data)->execute();
               if ($sql){
                   echo "<script>alert('分类添加成功！！');</script>";
               }
            }
        }
    }
//分类展示接口
    public function actionApiify()
    {
        $sql = yii::$app->db->createCommand('select * from classify')->queryAll();
        foreach ($sql as $k => $v){
            $v['img'] = "http://127.0.0.1/fu/lian/web/".$v['img'];
            $data[] = $v;
        }
        echo json_encode($data);
    }
//    跳转商品添加页
    public function actionGood()
    {
        $model = new Goodss();
        return $this->render('goods',['model'=>$model]);
    }
//    商品添加
    public function actionGoodadd()
    {
        $photo = 'uploads/';
        $model = new Goodss();
        if (Yii::$app->request->isPost) {
            $cname = $_POST['Goodss']['gname'];
            $model->img = UploadedFile::getInstances($model, 'img');
            if ($model->upload()) {
                // 文件上传成功
                $img = $photo.$model->img[0]->name;
                $data = array('gname'=>$cname,'img'=>$img);
                $sql = yii::$app->db->createCommand()->insert('goods',$data)->execute();
                if ($sql){
                    echo "<script>alert('添加成功！！');</script>";
                }
            }
        }
    }
//    商品API接口
    public function actionApigoods()
    {
        $sql = yii::$app->db->createCommand('select * from goods')->queryAll();
        foreach ($sql as $k => $v){
            $v['img'] = "http://127.0.0.1/fu/lian/web/".$v['img'];
            $data[] = $v;
        }
        echo json_encode($data);
    }
//    跳转轮播图添加页
    public function actionImg()
    {
        $model = new Image();
        return $this->render('image',['model'=>$model]);
    }
//轮播图文件上传添加
    public function actionImgadd()
    {
        $photo = 'uploads/';
        $model = new Image();
        if (Yii::$app->request->isPost) {
            $model->img = UploadedFile::getInstances($model, 'img');
            if ($model->upload()) {
                // 文件上传成功
                $img = $photo.$model->img[0]->name;
                $data = array('img'=>$img);
                $sql = yii::$app->db->createCommand()->insert('image',$data)->execute();
                if ($sql){
                    echo "<script>alert('添加成功！！');</script>";
                }
            }
        }
    }
//轮播图接口
    public function actionApiimg()
    {
        $sql = yii::$app->db->createCommand('select * from image')->queryAll();
        foreach ($sql as $k => $v){
            $v['img'] = "http://127.0.0.1/fu/lian/web/".$v['img'];
            $data[] = $v;
        }
        echo json_encode($data);
    }
//添加接口
    public function actionAdd()
    {
        $post = file_get_contents("php://input");
//        file_put_contents('12.txt',$post);
        $arr= json_decode($post,true);
        $_SESSION['formData'] = $arr['formData'];
        $_SESSION['time'] = time()+7100;//1559297567
        $res = array($_SESSION['formData']);
        if($res){
            $list = $res[0];
            $sql = yii::$app->db->createCommand()->insert('add',$list)->execute();
            if ($sql){
                $code = ['code'=>200,'msg'=>'ok'];
                echo json_encode($code);
            } else{
                $code = ['code'=>404,'msg'=>'添加失败！！'];
                echo json_encode($code);
            }
        } else{
            $code = ['code'=>404,'msg'=>'没有数据！！'];
            echo json_encode($code);
        }
    }

}