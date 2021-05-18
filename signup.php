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
        echo 'fuck';
        foreach($users as $user) {
            if ($user['email'] == $email) {
                $check = false;
            }
        }
            if($check){
                $query="INSERT INTO `users` (`name`,`lastName`,`email`,`password`) VALUES ('{$name}','{$lname}','{$email}','{$pass}')";
                $db->query($query);
                echo $db->error();
                echo 'fuck';
            }
            else {
                echo 'کاربری با این ایمیل قبلا ثبت نام کرده است!';
            }
    }
    else{
        echo 'گذرواژه با تایید آن همخوانی ندارد. لطفا مجدد تلاش نمایید!';
    }
}
else{
    echo 'wrong method';
}
echo 'fuck';
?>
<form method="post" action="signup.php">
    <fieldset>
        <legend>فرم ثبت نام</legend>
        <table>
            <tr>
                <td><label for="name">نام: </label></td>
                <td><input id="name" name="name" type="text"><br></td>
            </tr>
            <tr>
                <td><label for="lname">نام خانوادگی: </label></td>
                <td><input id="lname" name="lname" type="text"><br></td>
            </tr>
            <tr>
                <td><label for="email">آدرس ایمیل: </label></td>
                <td><input id="email" name="email" type="email"><br></td>
            </tr>
            <tr>
                <td><label for="pass">رمز عبور: </label></td>
                <td><input id="pass" name="pass" type="password"><br></td>
            </tr>
            <tr>
                <td><label for="pass2">تایید رمز عبور: </label></td>
                <td><input id="pass2" name="pass2" type="password"><br></td>
            </tr>
            <tr>
                <td></td>
                <td><input class="btn btn-primary" type="submit" value="ثبت نام"></td>
            </tr>
        </table>
    </fieldset>
</form>