<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ClassIfy extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $img;
    public $cname;
    public function attributeLabels()
    {
        return [
            'cname' => '分类名',
            'img' => '图片',
        ];
    }
    public function rules()
    {
        return [
            [['cname'], 'required'],
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