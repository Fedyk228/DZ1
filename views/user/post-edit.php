<?php

/** @var controllers\UserController $err */
/** @var controllers\UserController $success */
/** @var controllers\UserController $model */

use yii\bootstrap5\ActiveForm;

?>


<h1>Post edit</h1>
<?php $form = ActiveForm::begin(); ?>
<a href="/web/user" class=" btn btn-success">Go back</a>
<div class="row">
    <div class="align-items-center">
        <div>
            <?= $form->field($model, 'title')->textInput() ?>
        </div>
        <div>
            <?= $form->field($model, 'text')->textarea() ?>
        </div>
        <div>
            <?= $form->field($model, 'rating')->dropDownList([
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,

            ]) ?>
        </div>

        <div>
            <button class="btn" style="background: rgba(255,250,0,0.9)">Save post</button>
        </div>
        <?php ActiveForm::end(); ?>
        <p class="text-success"><?= $success ?></p>
        <p class="text-danger"><?= $err ?></p>