<?php
use yii\helpers\Url;
use yii\helpers\Html;
use xutl\inspinia\SideBar;
use yuncms\admin\helpers\MenuHelper;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <?= SideBar::widget([
            'options' => [
                'class' => 'nav metismenu',
                'id' => 'side-menu',
            ],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->getId())
        ]) ?>
    </div>
</nav>
