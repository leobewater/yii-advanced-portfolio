<?php

use kartik\editors\Summernote;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Project $model */
/** @var yii\widgets\ActiveForm $form */

// load js file
$this->registerJsFile(
  '@web/js/projectForm.js',
  ['depends' => [\yii\web\JqueryAsset::class]]
);
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= 
    // Usage with model & active form including model validation
    $form->field($model, 'tech_stack')->widget(Summernote::class, [
      'useKrajeePresets' => true,
      // other widget settings
    ]);
    ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::class, [
        // already configued in the common/config/main.php
        // 'dateFormat' => 'yyyy-MM-dd',
        'options' => ['readonly' => true],
    ]) ?>

    <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class, [
        // already configued in the common/config/main.php
        // 'dateFormat' => 'yyyy-MM-dd', 
        'options' => ['readonly' => true],
    ]) ?>

    <?php        
      foreach($model->images as $image) :?>
      <div id="project-form__image-container-<?= $image->id ?>" class="project-form__image-container">
        <?= Html::img($image->file->absoluteUrl(), [
          'alt' => 'Demo of the user interface',
          'height' => 200,
          'class' => 'project-form__image',
        ]); ?>

        <?= Html::button(Yii::t('app', 'Delete'), [
          'class' => 'btn btn-danger btn-delete-project',
          'data-project-image-id' => $image->id
        ]); ?>

        <div id="project-form__image-error-message-<?= $image->id ?>" class="text-danger"></div>
      </div>
    <?php endforeach; ?>
    

    
    <?= $form->field($model, 'imageFile')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
