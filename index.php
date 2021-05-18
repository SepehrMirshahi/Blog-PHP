<?php
include __DIR__.'/include/init.php';
$page_title='خانه';
if (islogin()) {
    echo $current_user['name'];
}
?>

<section id="recent">
    <div class="container">
        <?php
            foreach ($posts as $post){
                card($post['catId'],$post['catName'],$post['title'],'ads',$post['publish']);
            }
        ?>
    </div>
</section>
