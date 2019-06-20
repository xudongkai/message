<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\validators\Volidator;
use yii\captcha\Captcha;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'],'action' => 'index.php?r=sku/ifyadd']) ?>

    <?= $form->field($model, 'cname')->textInput() ?>
    <?= $form->field($model, 'img[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <button>添加</button>

<?php ActiveForm::end() ?>