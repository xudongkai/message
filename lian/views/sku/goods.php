<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/25 0025
 * Time: 8:44
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\validators\Volidator;
use yii\captcha\Captcha;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action' => 'index.php?r=sku/goodadd']) ?>

<?= $form->field($model, 'gname')->textInput() ?>
<?= $form->field($model, 'img[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

<button>添加</button>

<?php ActiveForm::end() ?>
