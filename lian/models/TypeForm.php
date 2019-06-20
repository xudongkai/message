<?php
namespace app\models;


class UploadForm extends Model
{
    public function rules()
    {
        return [
// name，email，subject 和 body 特性是 `require`（必填）的
            [['name', 'email', 'subject', 'body'], 'required'],

// email 特性必须是一个有效的 email 地址
            ['email', 'email'],
        ];
    }
}