<?php

class card
{
    public $postCard;

    public function addPostCard($edit = false)
    {
        $cat = searchDbById('category', $this->postCard['catId']);
        $author = searchDbById('users', $this->postCard['authorId']);
        if (strlen($this->postCard['detail']) > 70) {
            $text = substr($this->postCard['detail'], 0, 70) . ' ...';
        } else {
            $text = $this->postCard['detail'];
        }
        echo
            '<div class="card col-lg-5 col-md-5 col-sm-11 m-1">
                <a href="post.php?'.$this->postCard['id'].'">
                <figure>
                    <img src="./img/Layer 4-1.png" class="card-img-top" alt="user">
                    <div class="tag tag-' . $cat['catNameEn'] . '">
                        <p>' . $cat['catName'] . '</p>
                    </div>
                </figure>
                </a>
                <div class="card-body">
                    <div class="card-title">
                        <a href="post.php?postid='.$this->postCard['id'].'" class="card-link">' . $this->postCard['title'] . '</a>
                    </div>
                    <div class="card-text">
                        ' . $text . '
                        <div class="author-date">
                            <div class="author my-3">
                                <a href="post.php?authorid='.$this->postCard['authorId'].'">
                                    ' . $author['name'] . ' ' . $author['lastName'] . '
                                </a>
                            </div>
                            <div class="date">
                                <p>
                                    ' . $this->postCard['publish'] . '
                                </p>
                            </div>
                        </div>
                    </div>';
        if ($edit) {
            echo '<form action="editpost.php" method="get"><button type="submit" name="postid" class="btn btn-sm btn-primary" value="' . $this->postCard['id'] . '">ویرایش</button></form>';
        }
        echo '</div>
</div>';
    }
}