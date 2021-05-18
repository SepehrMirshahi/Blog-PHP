<?php
include __DIR__ . '/include/init.php';
$page_title = 'افزودن مطلب جدید';

?>
<form method="post" action="#">
    <fieldset class="post">
        <legend>افزودن مطلب</legend>
        <label for="title">عنوان مطلب:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="text">متن:</label><br>
        <textarea name="text" id="text" cols="30" rows="10"></textarea><br>
        <label> دسته بندی:</label><br>
        <select name="cat" required>
            <?php
                foreach ($categories as $category) {
                    echo "<option value={$category['id']}>&nbsp;&nbsp;&nbsp;&nbsp;{$category['name']}&nbsp;&nbsp;&nbsp;&nbsp;</option>";
                }
            ?>
        </select><br>
        <input type="submit" class="btn btn-primary" value="افزودن">
    </fieldset>
</form>
