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

class GoodController extends Controller
{
    public $enableCsrfValidation= false;
    //    商品添加页
    public function actionGood()
    {
        $model = new Goodss();
        return $this->render('goods',['model'=>$model]);
    }

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
    public function actionShow()
    {
        $sql = yii::$app->db->createCommand('select * from goods')->queryAll();
        return $this->render('show',['data' => $sql]);
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
}