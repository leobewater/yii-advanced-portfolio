<?php

use common\models\Testimonial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TestimonialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Testimonials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Testimonial'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
              // output project name instead of id
              'attribute' => 'project_id',
              'format' => 'raw',
              'value' => function($model) {
                /**
                 * @var $model common\models\Testimonial
                 */
                return Html::a($model->project->name, ['project/view', 'id' => $model->project_id]);
              }
            ],
            [
              // output image instead of image id
              'attribute' => 'customer_image_id',
              'format' => 'raw',
              'value' => function($model) {
                /**
                 * @var $model common\models\Testimonial
                 */
                if(!$model->customerImage) {
                  return null;
                }
                return Html::img($model->customerImage->absoluteUrl(), [
                  'alt' => $model->customer_name,
                  'height' => 75,
                ]);
              }
            ],
            'title',
            'customer_name',
            //'review:ntext',
            'rating',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Testimonial $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
