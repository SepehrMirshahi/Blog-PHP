<?php
include __DIR__.'/include/init.php';
$page_title='ویرایش مطلب';
if (method()=='POST'){
    $query="UPDATE `posts` SET `title`='{$_POST['title']}',`detail`='{$_POST['text']}',`catId`='{$_POST['cat']}' WHERE `uniqueId`='{$_POST['postId']}'";
    $result=$db->query($query);
    if($result){
        $alert= '<div class="alert alert-success text-right mx-auto">ویرایش مطلب با موفقیت انجام شد!</div>';
    }
}
else{
    $alert= '<div class="alert alert-danger text-right mx-auto">خطایی در فرایند ویرایش مطلب رخ داد!</div>';
}

if (isset($_REQUEST)) {
    $editPost = searchDbById('posts', $_GET['postid']);
    $alert401='<div class="alert alert-danger text-center mx-auto my-5">خطای 401: شما اجازه ی دسترسی به این صفحه را ندارید!<br>اگر نویسنده ی این مطلب شما هستید لطفا با حساب خود وارد سایت شوید</div>';
    if (islogin()) {
        if ($editPost['authorId'] != $current_user['id']){
            echo $alert401;
            die();
        }
    }
    else{
        echo $alert401;
        die();
    }
}
?>

<form method="post" action="#">
    <fieldset class="post text-right">
        <?php if(isset($alert)){
            echo $alert;
        }?>
        <legend class="w-auto mx-1">ویرایش مطلب</legend>
        <input type="hidden" name="postId" value="<?=$editPost['uniqueId']?>">
        <label for="title" class="form-group">عنوان مطلب:</label><br>
        <input type="text" class="form-control" id="title" value="<?=$editPost['title']?>" name="title" required><br>
        <label for="text" class="form-group">متن:</label><br>
        <textarea name="text" class="form-control" id="text" cols="30" rows="10" required><?=$editPost['detail']?></textarea><br>
        <label class="form-group" for="cat"> دسته بندی:</label><br>
        <select name="cat" id="cat" class="form-control" required>
            <?php
            foreach ($categories as $category) {
                echo "<option ";
                if ($editPost['catId']==$category['id']){
                    echo 'selected ';
                }
                echo "value={$category['id']}>{$category['catName']}</option>";
            }
            ?>
        </select><br>
        <input type="submit" class="btn btn-primary" value="ویرایش">
    </fieldset>
</form>
