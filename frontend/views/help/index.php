<?php

use yii\helpers\Html;

$this->title = 'Help Center';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-index">

  <h1><?= Html::encode($this->title); ?></h1>

  <p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nulla porttitor massa id neque aliquam vestibulum morbi blandit cursus. Turpis cursus in hac habitasse platea. Sit amet risus nullam eget felis eget. Sed risus ultricies tristique nulla aliquet enim. Cursus mattis molestie a iaculis at erat pellentesque adipiscing. Gravida arcu ac tortor dignissim convallis aenean. Sapien pellentesque habitant morbi tristique senectus. Non curabitur gravida arcu ac tortor dignissim. Odio ut enim blandit volutpat maecenas. Massa tincidunt nunc pulvinar sapien. Sed vulputate mi sit amet mauris. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque. Nisl purus in mollis nunc sed id semper risus in. At tempor commodo ullamcorper a lacus vestibulum sed arcu. Odio ut sem nulla pharetra diam sit.</p>

  <p>Lacus vel facilisis volutpat est velit egestas dui. Aliquam nulla facilisi cras fermentum odio. Ultricies mi eget mauris pharetra et ultrices neque ornare aenean. Ipsum dolor sit amet consectetur adipiscing elit duis. Scelerisque varius morbi enim nunc faucibus a pellentesque. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Egestas quis ipsum suspendisse ultrices gravida dictum fusce. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Lacus laoreet non curabitur gravida. Viverra justo nec ultrices dui sapien eget mi proin sed. Mattis ullamcorper velit sed ullamcorper morbi. Cras semper auctor neque vitae. Velit dignissim sodales ut eu sem integer vitae. Semper viverra nam libero justo laoreet. Et odio pellentesque diam volutpat commodo sed. Sollicitudin nibh sit amet commodo.</p>

  <div><?= Html::a('Account Settings', ['/help/account-settings']); ?></div>
  <div><?= Html::a('Login And Security', ['/help/login-and-security']); ?></div>
  <div><?= Html::a('Privacy', ['/help/privacy']); ?></div>
</div>
