<?php
use xutl\inspinia\SideBar;
use yuncms\admin\helpers\MenuHelper;
$menus = MenuHelper::getAssignedMenu(Yii::$app->user->getId());
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <?= SideBar::widget([
            'top' => $this->render(
                '_navigation_header.php'
            ),
            'options' => [
                'class' => 'nav metismenu',
                'id' => 'side-menu',
            ],
            'items' => $menus
        ]) ?>
    </div>
</nav>