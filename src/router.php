<?php
$conn = getConn();
if (!isset($conn)) {
    echo 'Error While loading (You can\' access to this page !)';
    exit();
}

function route($path) {
    $path = preg_replace('/[?#].*/', '', $path);
    $path = preg_replace('/https?:\/\/[^\/]+/', '', $path);
    return $path;
}

$router = route($_SERVER['REQUEST_URI']);
if ($router == '/' || $router == '') {
    $router = '/home';
} else if (substr($router, -1) === '/') {
    $router .= 'index';
}
if (!file_exists('page' . $router . '.php')) {
    header('Location: /error/404');
    exit();
}

function getRouter() {
    global $router;
    return $router;
}

?>
<?php if (strpos($router, 'error') === false   && strpos($router, 'login') === false && strpos($router, 'register') === false ) : ?>
<?php include 'component/navbar.php'; ?>
<?php endif; ?>
<main class="min-h-screen">
    <?php include 'page' . $router . '.php'; ?>

</main>
<?php if (strpos($router, 'error') === false && strpos($router, 'login') === false && strpos($router, 'register') === false  ): ?>
    <?php include 'component/footer.php'; ?>
<?php endif; ?>
