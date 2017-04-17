<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use xutl\inspinia\InspiniaAsset;

$assetBundle = InspiniaAsset::register($this);

$this->title = 'Manage Center';
?>
<?php $this->beginPage() ?><!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::tag('title', Html::encode($this->title)); ?>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        <?= $this->render('_sidebar.php', ['assetBundle' => $assetBundle]) ?>

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?= $this->render('_topnavbar.php', ['assetBundle' => $assetBundle]) ?>

            <!-- Main view  -->
            <?= $content ?>

            <!-- Footer -->
            <?= $this->render('_footer.php', ['assetBundle' => $assetBundle]) ?>

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>