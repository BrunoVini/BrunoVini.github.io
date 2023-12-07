<?php
    include('config.php');
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
    $urlArr = explode('/',$url);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bruno Souza - Portifólio</title>
</head>

<body>


  <?php

        if(file_exists("pages/". @$urlArr[0]. ".php")) {
            include("pages/". $urlArr[0]. ".php");
        } else if(@$urlArr[0] == 'news' || @$urlArr[1] == 'unique-news' || @$urlArr[2] == 'noticia') {
            include("pages/news/unique-news.php");
        } else {
            include("pages/404.php");        
        }

    ?>


</body>

</html>