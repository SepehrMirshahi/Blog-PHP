<?php
include __DIR__.'/include/init.php';
$page_title='خانه';
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
