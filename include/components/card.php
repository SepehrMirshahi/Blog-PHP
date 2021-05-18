<?php
function card($catId,$category,$title,$author,$date){
echo '<div class="card">
    <figure class="figure">
        <img src="./img/Layer 4-1.png" alt="user">
        <div class="tag tag-'.$catId.'">
            <p>'.$category.'</p>
        </div>
    </figure>
    <h6 class="card-headline">
        '.$title.'
    </h6>
    <div class="author-date">
        <div class="author">
            <a href="#">
                '.$author.'
            </a>
        </div>
        <div class="date">
            <p>
                '.$date.'
            </p>
        </div>
    </div>
</div>';
}