<?php

/** @var controllers\UserController $model */
/** @var controllers\UserController $success */
/** @var controllers\UserController $err */

use yii\bootstrap5\ActiveForm;

?>

<div class="row">
    <div class="col-sm-6 offset-3">
        <h1 class="s-title">Register</h1>

        <?php $form = ActiveForm::begin(); ?>
        <div class="py-1">
            <?= $form->field($model, 'fio')->textInput(); ?>
        </div>
        <div class="py-1">
            <?= $form->field($model, 'email')->textInput(); ?>
        </div>
        <div class="py-1">
            <?= $form->field($model, 'phone')->textInput(); ?>
        </div>
        <div class="py-1">
            <?= $form->field($model, 'password')->textInput(); ?>
        </div>
        <div class="py-1">
            <lable class="form-label" for="users-r-password">Repeat password</lable>
            <input type="text" id="users-r-password" class="form-control" name="r_password">
        </div>
        <div class="py-1">
            <button class="btn" style="background: rgba(255,250,0,0.9)">Register</button>
            <a href="/web/user/login" class="btn btn-primary">Login</a>
        </div>

        <p class="text-success"><?= $success ?></p>
        <p class="text-danger"><?= $err ?></p>
        <?php ActiveForm::end()?>
    </div>
</div