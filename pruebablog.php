<?php

include_once('./blog.php');
include_once('./comment.php');
include_once('./datos.php');

$DB = Blog::getInstancia();

 foreach ($blogs as $blog) {
     
    $blog->guardarenBD();
    
} 
foreach ($comments as $comment) {

    $comment->guardarenBD();
    echo $comment->getBlog() . " ";;
}

?>