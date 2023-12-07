<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = Yii::$app->name . ' - My Portfolio';
?>
<div class="site-index">
    
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">

            <?= Html::img('@web/images/astronaut.png', [
                  'alt' => Yii::t('app', 'My profile photo'),
                  'class' => 'site-index__photo'
                ]); 
            ?>

            <h1 class="site-index__h1"><?= Yii::t('app', 'Hi, my name is Luis'); ?></h1>

            <p class="lead"><?= Yii::t('app', 'You have successfully created your Yii-powered application.'); ?></p>

            <p><?= Html::a(Yii::t('app', 'See my work'), ['/project'], ['class' => 'btn btn-primary']); ?></p>
        </div>
    </div>

</div>
