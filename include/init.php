<?php
$db = new mysqli('localhost', 'root', '', 'roshdana_blog');
ob_start();
session_start();
$user_query = $db->query("SELECT * FROM `users`");
$users = $user_query->fetch_all(MYSQLI_ASSOC);

$post_query = $db->query("SELECT * FROM `posts`");
$posts = $post_query->fetch_all(MYSQLI_ASSOC);

$category_query = $db->query("SELECT * FROM `category`");
$categories = $category_query->fetch_all(MYSQLI_ASSOC);

function redirect($url)
{
    header("location: $url");
}

function method()
{
    return $_SERVER['REQUEST_METHOD'];
}

function hash8($str)
{
    return sha1(md5(sha1(md5(sha1(md5(sha1(md5($str))))))));
}

function realScape($str)
{
    global $db;
    return $db->real_escape_string($str);
}

//if (islogin()) {
//    global $user;
//    $logsection = '<li class="nav-item"><a>سلام '.$user['name'] .' !</a></li>
//        <li class="blog-item"><a role="link" href="addpost.php" class="btn btn-primary">افزودن مطلب</a></li>
//        <li class="blog-item"><a role="link" href="logout.php" class="btn btn-secondary">خروج از حساب</a></li>';
//} else {
//    $logsection = '<li class="blog-item"><a href="signup.php" class="btn btn-primary">عضویت</a></li>
//        <li class="blog-item"><a href="login.php" class="btn btn-secondary">ورود</a></li>';
//}
register_shutdown_function(function () {
    global $page_title, $content, $logsection;
    $content = ob_get_clean();
    include __DIR__ . '/layout.php';
});