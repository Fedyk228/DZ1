<?php
/* @var controllers\SiteController $items */
/* @var controllers\SiteController $user */
?>



<?php
echo '<pre>';
print_r($items);
echo '</pre>';
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





<!--<a href="/web/user/login" class="btn " style="background: rgba(255,250,0,0.9)">To see posts you need to login</a>-->