<?php
include __DIR__.'/include/init.php';
$page_title='خانه';
if (islogin()) {
    echo $current_user['name'];
}
?>
<!--Recent Posts-->
<section id="recent" class="py-4">
    <div class="container row mx-auto text-right justify-content-center">
        <?php
            $recentPost=array_chunk($posts,4,true);
            foreach ($recentPost[0] as $post){
                $card = new card();
                $card->postCard = $post;
                $card->addPostCard(isset($current_user)&&$post['authorId']==$current_user['id']);
            }
        ?>
    </div>
</section>
<!--CTA-->
<?php
if (!islogin()){?>
<section id="call-to-action">
    <div class="container">
        <div class="call-card">
            <div class="call-header wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                <span></span>
                <h6>
                    همین حالا عضو شوید
                </h6>
            </div>
            <div class="call-main">
                <h4>
                    با عضویت در سایت از امکانات ویژه سایت بهره مند شوید.
                </h4>
                <p>
                    با عضویت رایگان در سایت ما نویسنده شوید، مطالب جدید به سایت اضافه کنید و آنها را ویرایش کنید!
                </p>
            </div>
            <a href="signup.php" class="call-btn" type="submit">
                عضویت رایگان!
            </a>
        </div>
    </div>
</section>
<?php }?>