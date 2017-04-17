<?php
use yii\helpers\Url;
use yii\helpers\Html;
use xutl\inspinia\SideBar;
use yuncms\admin\helpers\MenuHelper;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <?= \xutl\inspinia\Menu::widget([
            'options' => [
                'class' => 'nav metismenu',
                'id' => 'side-menu',
            ],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->getId())
        ]) ?>
    </div>
</nav>


<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold"><?= Yii::$app->user->identity->username; ?></strong>
                            </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><?= Html::a(Yii::t('admin', 'Logout'), Url::to(['/admin/security/logout']), [
                                'title' => Yii::t('admin', 'Sign Out'),
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => Yii::t('admin', 'You can improve your security further after logging out by closing this opened browser')
                                ]
                            ]); ?></li>
                    </ul>
                </div>
                <div class="logo-element">
                    YUN
                </div>
            </li>

            <li class="{{ isActiveRoute('main') }}">
                <a href="{{ url('/') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Main view</span></a>
            </li>
            <li class="{{ isActiveRoute('minor') }}">
                <a href="{{ url('/minor') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Minor view</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
