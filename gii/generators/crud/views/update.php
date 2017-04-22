<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use xutl\inspinia\Box;
use xutl\inspinia\Toolbar;
use xutl\inspinia\Alert;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Update '.Inflector::camel2words(StringHelper::basename($generator->modelClass)))?> . ': ' . $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString('Manage ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12 <?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">
            <?= "<?= " ?>Alert::widget() ?>
            <?= "<?php " ?>Box::begin([
            'header' => Html::encode($this->title),
            ]); ?>
            <div class="row">
                <div class="col-sm-4 m-b-xs">
                    <?= "<?= " ?>Toolbar::widget(['items' => [
                        [
                            'label' => <?= $generator->generateString('Manage ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>,
                            'url' => ['index'],
                        ],
                        [
                            'label' => <?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>,
                            'url' => ['create'],
                        ],
                    ]]); ?>
                </div>
                <div class="col-sm-8 m-b-xs">

                </div>
            </div>

            <?= "<?= " ?>$this->render('_form', [
            'model' => $model,
            ]) ?>
            <?= "<?php " ?>Box::end(); ?>
        </div>
    </div>
</div>