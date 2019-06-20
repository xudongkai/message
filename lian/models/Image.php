<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/25 0025
 * Time: 9:11
 */
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Image extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $img;
    public function attributeLabels()
    {
        return [
            'img' => '图片',
        ];
    }
    public function rules()
    {
        return [
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