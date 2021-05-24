<?php
include __DIR__.'/include/init.php';
$page_title='خانه';
if (islogin()) {
    echo $current_user['name'];
}
?>

<section id="recent" class="py-4">
    <div class="container row mx-auto justify-content-center">
        <?php
            $recentPost=array_chunk($posts,4,true);
            foreach ($recentPost[0] as $post){
                $card = new card();
                $card->postCard = $post;
                $card->addPostCard();
            }
        ?>
    </div>
</section>

