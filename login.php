<?php
include __DIR__.'/include/init.php';
$page_title='ورود';
if (islogin()){
    redirect('index.php');
}
if (method()=='POST'){
//    $list = $db->query("SELECT * FROM `users`");
//    $users = $list->fetch_all(MYSQLI_ASSOC);
    $email = realScape($_REQUEST['email']);
    $password = hash8($_REQUEST['pass']);
    $check=false;
    foreach ($users as $user){
        if($user['email']==$email && $user['password']==$password){
            $check=true;
            $_SESSION['id']=$user['authorId'];
        }
    }
    if($check){
        header("location: index.php");
    }
    else{
        echo "نام کاربری یا رمز عبور وارد شده صحیح نمی باشد!";
    }
}
?>
<form method="post" action="login.php">
    <fieldset>
        <legend>فرم ورود به سایت</legend>
        <table>
            <tr>
                <td><label for="email">آدرس ایمیل: </label></td>
                <td><input id="email" name="email" type="email"><br></td>
            </tr>
            <tr>
                <td><label for="pass">رمز عبور: </label></td>
                <td><input id="pass" name="pass" type="password"><br></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-primary" value="ورود"></td>
            </tr>
        </table>
    </fieldset>
</form>