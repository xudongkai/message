<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/25 0025
 * Time: 8:47
 */
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Goodss extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $img;
    public $gname;
    public function attributeLabels()
    {
        return [
            'gname' => '商品名',
            'img' => '图片',
        ];
    }
    public function rules()
    {
        return [
            [['gname'], 'required'],
            [['img'], 'file', 'maxFiles' => 4],
        ];
    }

    public function upload()
    {
        $photo = 'uploads/';
        if (!file_exists($photo)){
            mkdir($photo,'0777',true);
        }
        foreach ($this->img as $file) {
            $data = $file->saveAs($photo . $file->baseName . '.' . $file->extension);
        }
        return $data;
    }
}