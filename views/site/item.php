<?php
/* @var controllers\SiteController $items */
/* @var controllers\SiteController $user */
/* @var controllers\SiteController $login */
/* @var controllers\SiteController $model */
/* @var controllers\SiteController $comments */

use yii\bootstrap5\ActiveForm;

?>


<div class="py-3">
    <a href="/web/site" class="btn" style="background: rgba(255,250,0,0.9)">Go back</a>
</div>
<?php foreach ($items as $item): ?>
    <h1> Reviews <?= $item['title'] ?></h1>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <em class="card-title text-primary"> <?= $item['date_create']?></em>
                <h2 class="card-title">Title: <?= $item['title'] ?> </h2>
                <p class="card-title">Text: <?= $item['text'] ?> </p>
                <p class="card-title">Rating: <?= $item['rating'] ?> </p>

                <div>
                    <p class="card-title">Author: <?= $item['fio'] ?> </p>
                    <p class="card-title">Email: <?= $item['email'] ?> </p>
                    <p class="card-title">Phone: <?= $item['phone'] ?> </p>
                </div>

            </div>
        </div>
    </div>

<?php endforeach; ?>

<hr>

<h4>Comments</h4>
<?php if ($login): ?>
    <?php $form = ActiveForm::begin() ?>
    <div class="py-1 col-md-6">
        <?= $form->field($model, 'comment_text')->textInput() ?>
    </div>

    <div class="py-1">
        <button class="btn" style="background: rgba(255,250,0,0.9)"> Add Comment</button>
    </div>
    <?php ActiveForm::end() ?>
<?php endif ?>

<?php if (isset($comments)): ?>
<div class="list-group mt-5">
    <?php foreach ($comments as $comment): ?>
        <div class="list-group-item">
            <h5><?= $comment['fio']; ?></h5>
            <p><?= $comment['comment_text']; ?></p>

        </div>
    <? endforeach ?>
</div>
<?php else :?>
    <h2 class="text-muted">Comments not found</h2>
<?php endif;?>




<!--<a href="/web/user/login" class="btn " style="background: rgba(255,250,0,0.9)">To see posts you need to login</a>-->