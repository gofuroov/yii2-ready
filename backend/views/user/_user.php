<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 09/01/22
 * Time: 14:46
 *
 * @var $this \yii\web\View
 */

?>
<div class="card card-primary card-outline">
    <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="<?= Yii::$app->user->identity->photoUrl ?>"
                 alt="User profile picture">
        </div>

        <h3 class="profile-username text-center"><?= Yii::$app->user->identity->fullname ?? '' ?></h3>

        <p class="text-muted text-center">
            <?= Yii::$app->user->identity->typeName ?? '' ?>
        </p>

        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
                <b>ID</b>
                <a class="float-right">
                    <?= Yii::$app->user->id ?>
                </a>
            </li>
            <li class="list-group-item">
                <b>Yaratilgan</b>
                <a class="float-right">
                    <?= Yii::$app->formatter->asDate(Yii::$app->user->identity->created_at) ?>
                </a>
            </li>
            <li class="list-group-item">
                <b>O'zgartirilgan</b>
                <a class="float-right">
                    <?= Yii::$app->formatter->asDate(Yii::$app->user->identity->updated_at) ?>
                </a>
            </li>
        </ul>
        <a class="btn btn-primary btn-block">
            <i class="fa fa-check"></i>
            <b>Faol</b>
        </a>
    </div>
    <!-- /.card-body -->
</div>