<?php

use yii\bootstrap5\Carousel;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Project $model */

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
  
    <?php foreach($model->testimonials as $testimonial): ?>
      <div class="project-view__testimonials">
        <?php if($testimonial->customerImage) {
          echo Html::img($testimonial->customerImage->absoluteUrl(), [
            'class' => 'project-view__testimonial-image'
          ]);
        }
        ?>
        <?= $testimonial->customer_name; ?>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

</div>
