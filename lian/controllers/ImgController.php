<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/30 0030
 * Time: 14:58
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

class ImgController extends Controller
{
    public $enableCsrfValidation= false;
//轮播图加页
    public function actionImg()
    {
        $model = new Image();
        return $this->render('image', ['model' => $model]);
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
                $img = $photo . $model->img[0]->name;
                $data = array('img' => $img);
                $sql = yii::$app->db->createCommand()->insert('image', $data)->execute();
                if ($sql) {
                    echo "<script>alert('添加成功！！');</script>";
                }
            }
        }
    }

    public function actionShow()
    {
        $sql = yii::$app->db->createCommand('select * from image')->queryAll();
        return $this->render('show',['data' => $sql]);
    }

//轮播图接口
    public function actionApiimg()
    {
        $sql = yii::$app->db->createCommand('select * from image')->queryAll();
        foreach ($sql as $k => $v) {
            $v['img'] = "http://127.0.0.1/fu/lian/web/" . $v['img'];
            $data[] = $v;
        }
        echo json_encode($data);
    }
}