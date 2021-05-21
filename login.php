<?php
include __DIR__.'/include/init.php';
$page_title='ورود';
if(islogin()){
    redirect('index.php');
}
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
    $alert= '<div class="alert alert-danger text-right mx-auto">نام کاربری یا رمز عبور وارد شده صحیح نمی باشد!</div>';
}
?>
<form method="post" action="login.php">
    <fieldset>
        <?php if(isset($alert)){
            echo $alert;
        }?>
        <legend class="text-right w-auto px-2">فرم ورود به سایت</legend>
        <table>
            <tr>
                <td><label for="email">آدرس ایمیل: </label></td>
                <td><input class="form-control" id="email" name="email" type="email" required><br></td>
            </tr>
            <tr>
                <td><label for="pass">رمز عبور: </label></td>
                <td><input id="pass" name="pass" class="form-control" type="password" required><br></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-primary" value="ورود"></td>
            </tr>
        </table>
    </fieldset>
</form>