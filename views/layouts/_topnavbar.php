<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            这里来点其他的
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <?= Html::a('<i class="fa fa-sign-out"></i>' . Yii::t('admin', 'Logout'), Url::to(['/admin/security/logout']), [
                    'title' => Yii::t('admin', 'Sign Out'),
                    'data' => [
                        'method' => 'post',
                        'confirm' => Yii::t('admin', 'You can improve your security further after logging out by closing this opened browser')
                    ]
                ]); ?>
            </li>
        </ul>
    </nav>
</div>
