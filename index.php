<!DOCTYPE html>
<?php 
    include_once('datos.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Irish+Grover' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
<link href="css/screen.css" type="text/css" rel="stylesheet" />
<link href="css/sidebar.css" type="text/css" rel="stylesheet" />
<link href="css/blog.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="img/favicon.ico" />
</head>
<body>
<section id="wrapper">
<header id="header">
<div class="top">
<nav>
<ul class="navigation">
<li><a href="index_sb.php">Home</a></li>
<li><a href="about_sb.php">About</a></li>
<li><a href="contact_sb.php">Contact</a></li>
</ul>
</nav>
</div>
<hgroup>
<h2><a href="index_sb.php/">symblog</a></h2>
<h3><a href="index_sb.php/">creating a blog in Symfony2</a></h3>
</hgroup>
</header>
<section class="main-col">
<?php    
    foreach ($blogs as $blog) {
        
        /* Crea una version reducida del texto del blog para mostrarse */
        $blogreducido;
        try {
            $blogreducido = substr($blog->blog,0,200);
        } catch (\Throwable $th) {
            $blogreducido = $blog->blog;
        }
        echo'<article class="blog>
                <div class="date">
                     <time datetime="'.$blog->created_at->format('Y-m-d H:i:s').'"></time>
                </div>
                <header>
                    <h2><a href="show_sb.php?id=n"> '.$blog->title.' </a></h2>
                </header>
                <img src="./img/'.$blog->image.'"/>
                <div class="snippet">
                     <p>'.$blogreducido.'<p>
                    <p class="continue"><a href="#">Continue reading...</a></p>
                </div>
                <footer class="meta">
                    <p>Comments: <a href="#"> '.count($blog->comments).' </a></p>
                    <p>Posted by <span class="highlight">'. $blog->author .'</span></p>
                    <p>Tags: <span class="highlight">'. $blog->tags .'</span></p>
                </footer>
            </article>
                
        ';
    }

?>

 <!-- <article class="blog">
<div class="date">'
<time datetime=" "> </time>
 </div>
<header>
<h2><a href="show_sb.php?id=n"> Titulo blog </a></h2>
</header>'
<img src="img/imagen" />
<div class="snippet">
<p> blog </p>'
<p class="continue"><a href="#">Continue reading...</a></p>
</div>'
<footer class="meta">'
<p>Comments: <a href="#"> Numero comentarios </a></p>
 <p>Posted by <span class="highlight">dsyph3r</span> at 07:06PM</p>
 <p>Tags: <span class="highlight">symfony2, php, paradise, symblog</span></p>
</footer>
</article> -->
</section>
<aside class="sidebar">
<section class="section">
<header>
<h3>Tag Cloud</h3>
</header>
<p class="tags">
<span class="weight-1">magic</span>
<span class="weight-5">symblog</span>
<span class="weight-4">movie</span>
</p>
</section>
<section class="section">
<header>
<h3>Latest Comments</h3>
</header>
<article class="comment">
<header>
<p class="small"><span class="highlight">Carlos Aguilera</span> commented on
<a href="#">A day with Symfony2</a>
</p>
</header>
<p>Comentario Usuario</p>
</article>
</section>
</aside>
<div id="footer">
dwes symblog - created by <a href="#">dwes</a>
</div>
</section>
</body>
</html>