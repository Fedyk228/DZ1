<?php
/** @var controllers\UserController $err */
/** @var controllers\UserController $success */
/** @var controllers\UserController $model */
/** @var controllers\UserController $exist */
/** @var controllers\UserController $posts */
use yii\bootstrap5\ActiveForm;
use yii\web\Controller;

?>

<?php if ($exist) : ?>
    <h1>Cabinet - Reviews</h1>
    <?php $form = ActiveForm::begin(); ?>
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
                <button class="btn btn-success">Add post</button>
            </div>
            <?php ActiveForm::end(); ?>
            <p class="text-danger"><?= $err ?></p>
        </div>
    </div> <?php else : ?>
    <div class="py-3">
        <a href="/web/user/login" class="btn btn-primary"> Pls Login</a>
    </div>
<?php endif; ?>

<hr>

<div class="row">
    <?php if($posts): ?>
    <div class="list-group">
        <?php foreach ($posts as $post):
            if($post['id_author'] == $exist['uid']): ?>
                <div class="list-group-item d-flex justify-content-between">
                    <div>
                        <em class="text-primary"><?= $post['date_create']?></em>
                        <h4><?= $post['title']?></h4>
                    </div>
                </div>
        <?php endif;?>
        <?php endforeach;?>
    </div>

    <?php else:?>

        <h2 class="text-secondary">No reviews</h2
    <?php endif;?>
</div>


