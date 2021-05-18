<?php
include __DIR__.'/include/init.php';
$page_title='ورود';

if(method()=='POST'){
    $email=realScape($_REQUEST['email']);
    $pass=hash8($_REQUEST['pass']);
    foreach ($users as $user){
        if ($user['email']==$email && $user['password']==$pass){
            $_SESSION['id']=$user['id'];
            $_SESSION['token']=$user['password'];
            redirect('index.php');
        }
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