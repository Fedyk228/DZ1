<?php

/** @var controllers\SiteController $posts */
?>

<h2>Post page</h2>
<?php if ($posts): ?>
    <div class="list-group">
        <?php foreach ($posts as $post): ?>
            <div class="list-group-item">
                <a href="/web/site/item/<?= $post['id']?>"><?= $post['title'] ?></a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
