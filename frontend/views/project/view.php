<?php

use kartik\rating\StarRating;
use yii\bootstrap5\Carousel;
use yii\helpers\Html;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var common\models\Project $model */
/** @var yii\data\ActivateDataProvider $dataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

  <div class="project-view__dates">
    <?= $model->start_date . ' ' . Yii::t('app', 'to') . ' ' . $model->end_date; ?>
  </div>

  <?php
  echo Carousel::widget([
    'items' => $model->carouselImages(),
    'options' =>['class'=> 'project-view__carousel'],
  ]);
  ?>

  <div class="project-view__tech-stack">
    <span class="fw-bold"><?= Yii::t('app', 'Tech stack'); ?>: </span>
    <?= $model->tech_stack; ?>
  </div>

  <div class="project-view__description">
    <?= $model->description ?>
  </div>

  <?php if($model->testimonials): ?>
    <h2><?= Yii::t('app', 'Testimonials'); ?></h2>
  
    <?= ListView::widget([
      'dataProvider' => $dataProvider,
      'itemOptions' => ['class' => 'testimonial'],
      'itemView' => '_testimonial',
      'layout' => "{items}\n{pager}"
    ]); 
    ?>
    
    <?php foreach($model->testimonials as $testimonial): ?>
      
    <?php endforeach; ?>
  <?php endif; ?>

</div>
