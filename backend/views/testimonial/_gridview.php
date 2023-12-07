<?php // echo $this->render('_search', ['model' => $searchModel]); 

use common\models\Testimonial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TestimonialSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\Project[] $projects */
/** @var boolean $isProjectColumnVisible */
?>

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
          'filter' => $projects,
          'visible' => $isProjectColumnVisible,
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
            // instead of using the urlCreator you can simply use the controller properties to fix the view, edit, delete links
            'controller' => 'testimonial',
            // 'urlCreator' => function ($action, Testimonial $model, $key, $index, $column) {
            //     return Url::toRoute(['testimonial/'. $action, 'id' => $model->id]);
            //  }
        ],
    ],
]); ?>