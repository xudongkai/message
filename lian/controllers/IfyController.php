<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/30 0030
 * Time: 14:59
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

class IfyController extends Controller
{
    public $enableCsrfValidation= false;
    //分类添加页
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
    public function actionShow()
    {
        $sql = yii::$app->db->createCommand('select * from classify')->queryAll();
        return $this->render('show',['data'=>$sql]);
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
}