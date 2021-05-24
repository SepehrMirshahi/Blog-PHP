<?php
include __DIR__ . '/include/init.php';
$page_title = 'افزودن مطلب جدید';
if(!islogin()){
    redirect('login.php');
}
if(method()=='POST'){
    $title=realScape($_REQUEST['title']);
    $text=realScape($_REQUEST['text']);
    $authorId=$current_user['id'];
    $uniqueId=uniqid();
    $catId=(int)$_REQUEST['cat'];
    $check=true;
    foreach ($posts as $post){
        if($post['title']==$title){
            $check=false;
        }
    }
    if ($check) {
        $postQuery = "INSERT INTO `posts` (`title`,`detail`,`authorId`,`id`,`uniqueId`) VALUES ('{$title}','{$text}','{$authorId}','{$catId}','{$uniqueId}')";
        $postuserQuery = "INSERT INTO `postuser` (`postId`,`userId`) VALUES ('{$uniqueId}','{$authorId}')";
        $catpostQuery = "INSERT INTO `categorypost` (`postId`,`categoryId`) VALUES ('{$uniqueId}','{$catId}')";
        $db->query($postQuery);
        $db->query($postuserQuery);
        $db->query($catpostQuery);
        if ($db->error==Null) {
            $alert = '<div class="alert alert-success text-right mx-auto">این مطلب با موفقیت به سایت افزوده شد!</div>';
        }
        else{
            $alert = '<div class="alert alert-danger text-right mx-auto">خطایی در فرایند افزودن مطلب رخ داد!</div>';
        }
    }
    else{
        $alert = '<div class="alert alert-warning text-right mx-auto">پیش از این مطلبی با این عنوان در سایت منتشر شده است! لطفا عنوان مطلب را تغییر دهید!</div>';
    }
}
?>
<form method="post" action="#">
    <fieldset class="post text-right">
        <?php if(isset($alert)){
            echo $alert;
        }?>
        <legend class="w-auto mx-1">افزودن مطلب</legend>
        <label for="title" class="form-group">عنوان مطلب:</label><br>
        <input type="text" class="form-control" id="title" name="title" required><br>
        <label for="text" class="form-group">متن:</label><br>
        <textarea name="text" class="form-control" id="text" cols="30" rows="10" required></textarea><br>
        <label class="form-group" for="cat"> دسته بندی:</label><br>
        <select name="cat" id="cat" class="form-control" required>
            <?php
                foreach ($categories as $category) {
                    echo "<option value={$category['catId']}>&nbsp;&nbsp;&nbsp;&nbsp;{$category['catName']}&nbsp;&nbsp;&nbsp;&nbsp;</option>";
                }
            ?>
        </select><br>
        <input type="submit" class="btn btn-primary" value="افزودن">
    </fieldset>
</form>
