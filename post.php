<?php
include __DIR__.'/include/init.php';
if (count($_GET)==0){
    redirect('index.php');
}
elseif (isset($_GET['postid'])){
    $postShow=searchDbById('posts',$_GET['postid']);
    $page_title=$postShow['title'];?>
<div class="container post-show my-5 p-5">
    <p><?=nl2br($postShow['detail'])?></p>
</div>
<?php }
elseif (isset($_GET['authorid'])){
    $author=searchDbById('users',$_GET['authorid']);
    $page_title=$author['name'].' '.$author['lastName']; ?>
<section class="py-4">
    <div class="container row mx-auto text-right justify-content-center">
        <?php
        foreach ($posts as $post){
            if ($post['authorId']==$_GET['authorid']) {
                $card = new card();
                $card->postCard = $post;
                $card->addPostCard(isset($current_user) && $post['authorId'] == $current_user['id']);
            }
        }
        ?>
    </div>
</section>
<?php }
elseif (isset($_GET['catid'])){
    $category=searchDbById('category',$_GET['catid']);
    $page_title=$category['catName']; ?>
    <section class="py-4">
        <div class="container row mx-auto text-right justify-content-center">
            <?php
            foreach ($posts as $post){
                if ($post['catId']==$_GET['catid']) {
                    $card = new card();
                    $card->postCard = $post;
                    $card->addPostCard(isset($current_user) && $post['authorId'] == $current_user['id']);
                }
            }
            ?>
        </div>
    </section>
<?php }