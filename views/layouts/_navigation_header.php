<?php
use yii\helpers\Url;
use yii\helpers\Html;
 ?>
<li class="nav-header">
    <div class="dropdown profile-element">
        <span><img alt="image" class="img-circle" src="<?=Yii::$app->user->identity->getAvatar('small')?>"></span>
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold"> <?=Yii::$app->user->identity->username?> </strong>
                            </span>
                            <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
                        </span>
        </a>
        <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="#">退出</a></li>
        </ul>
    </div>
    <div class="logo-element">
        YUN
    </div>
</li>
