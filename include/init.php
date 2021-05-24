<?php
$db = new mysqli('localhost', 'root', '', 'roshdana_blog');
ob_start();
session_start();
$user_query = $db->query("SELECT * FROM `users` ORDER BY `joinDate`");
$users = $user_query->fetch_all(MYSQLI_ASSOC);

$post_query = $db->query("SELECT * FROM `posts` ORDER BY `publish` DESC");
$posts = $post_query->fetch_all(MYSQLI_ASSOC);

$category_query = $db->query("SELECT * FROM `category`");
$categories = $category_query->fetch_all(MYSQLI_ASSOC);

function searchDbById($table,$id){
    global $db;
    $query="SELECT * FROM `{$table}` where `id`='{$id}'";
    $result=$db->query($query);
    return $result->fetch_assoc();
}
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

$current_user;
function islogin(){
    global $db,$current_user;
    if (isset($_SESSION['id'])){
        $current_user=searchDbById('users',$_SESSION['id']);
        return true;
    }
    else{
        return false;
    }
}

if (islogin()) {
    $hello='سلام '.$current_user['name'].'!';
    $logsection ='
    <a role="link" href="addpost.php" class="btn btn-primary col-lg-5">افزودن مطلب</a>
    <a role="link" href="logout.php" class="btn btn-secondary col-lg-5">خروج از سایت</a>';
} else {
    $hello='';
    $logsection = '
    <a role="link" href="signup.php" class="btn btn-primary col-lg-5">عضویت</a>
    <a role="link" href="login.php" class="btn btn-secondary col-lg-5">ورود</a>';
}
spl_autoload_register(function($class){
    include __DIR__."/components/{$class}.php";
});
register_shutdown_function(function () {
    global $page_title, $content, $logsection,$hello;
    $content = ob_get_clean();
    include __DIR__ . '/layout.php';
});