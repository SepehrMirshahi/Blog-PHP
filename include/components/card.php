<?php

class card
{
    public $postCard;

    public function addPostCard($edit=false)
    {
        $cat = searchDbById('category', $this->postCard['catId']);
        $author = searchDbById('users', $this->postCard['authorId']);
        echo
'<div class="card col-lg-5 col-md-5 col-sm-11 m-1">
    <figure class="figure">
        <img src="./img/Layer 4-1.png" alt="user">
        <div class="tag tag-' . $cat['catNameEn'] . '">
            <p>' . $cat['catName'] . '</p>
        </div>
    </figure>
    <h2 class="card-header">
        '.$this->postCard['title'].'
    </h2>
    <h2 class="card-body">
        ' . $this->postCard['detail'] . '
    </h2>
    <div class="author-date">
        <div class="author">
            <a href="#">
                ' . $author['name'] . ' ' . $author['lastName'] . '
            </a>
        </div>
        <div class="date">
            <p>
                ' . $this->postCard['publish'] . '
            </p>
        </div>';
        if($edit){
            echo'<div><form action="editpost.php" method="get"><button type="submit" name="postid" class="btn btn-sm btn-primary" value="'.$this->postCard['id'].'">ویرایش</button></form> </div>';
        }
echo '</div>
</div>';
    }
}