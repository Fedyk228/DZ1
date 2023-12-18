<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use app\controllers\UserController;


AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="/web/" class="logo py-3"> POSTLOGO</a>
        <nav>
            <a href="/web/" class="me-3 ">Home</a>
            <?php $user = UserController::checkLogin();
            if ($user): ?>
                <a href="/web/user/" class="me-3">Hello <?= $user['fio']; ?>
                <a href="/web/user/logout">Logout</a>
            <?php else: ?>
                <a href="/web/user/login" class="me-3 py-3">Login</a>
                <a href="/web/user/register">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>


    <div class="container">
        <?= $content ?>
    </div>


<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
