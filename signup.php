<?php
include __DIR__ . '/include/init.php';
$page_title = "ثبت نام";
if (method() == 'POST') {
    if ($_REQUEST['pass'] == $_REQUEST['pass2']) {
        $name = realScape($_REQUEST['name']);
        $lname = realScape($_REQUEST['lname']);
        $email = realScape($_REQUEST['email']);
        $pass = hash8($_REQUEST['pass']);
        $check=true;
        foreach($users as $user) {
            if ($user['email'] == $email) {
                $check = false;
            }
        }
        if($check){
            $query="INSERT INTO `users` (`name`,`lastName`,`email`,`password`) VALUES ('{$name}','{$lname}','{$email}','{$pass}')";
            $db->query($query);
            $alert= '<div class="alert alert-success text-right mx-auto">ثبت نام با موفقیت انجام شد! هم اکنون می توانید وارد شوید!</div>';
        }
        else {
            $alert= '<div class="alert alert-danger text-right mx-auto">کاربری با این ایمیل قبلا ثبت نام کرده است!</div>';
        }
    }
    else{
        $alert= '<div class="alert alert-danger text-right mx-auto">گذرواژه با تایید آن همخوانی ندارد. لطفا مجدد تلاش نمایید!</div>';
    }
}
?>
<form method="post" action="signup.php">
    <fieldset>
        <?php if(isset($alert)){
            echo $alert;
        }?>
        <legend class="text-right w-auto px-1">فرم ثبت نام</legend>
        <table>
            <tr>
                <td><label for="name">نام: </label></td>
                <td><input id="name" class="form-control" name="name" type="text" required><br></td>
            </tr>
            <tr>
                <td><label for="lname">نام خانوادگی: </label></td>
                <td><input id="lname" class="form-control" name="lname" type="text" required><br></td>
            </tr>
            <tr>
                <td><label for="email">آدرس ایمیل: </label></td>
                <td><input id="email" class="form-control" name="email" type="email" required><br></td>
            </tr>
            <tr>
                <td><label for="pass">رمز عبور: </label></td>
                <td><input id="pass" class="form-control" name="pass" type="password" required><br></td>
            </tr>
            <tr>
                <td><label for="pass2">تایید رمز عبور: </label></td>
                <td><input id="pass2" class="form-control" name="pass2" type="password" required><br></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-primary" type="submit" value="ثبت نام"></td>
            </tr>
        </table>
    </fieldset>
</form>