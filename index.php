<script>
    var userLang = navigator.language || navigator.userLanguage;
    var url = window.location.href;
    var urlArr = url.split('/');
    
    if(urlArr[3] == 'pt-BR' || urlArr[3] == 'en') {
        if(urlArr[4] === undefined || urlArr[4].length == 0) {
            let lastChar = url[url.length - 1];
            if(lastChar == '/') {
                url = url.slice(0, -1);
            }            
            window.location.href = url + '/home';
        }
    } else {
        let newUrl = urlArr[0] + '//' + urlArr[2] + '/' + userLang + '/' + urlArr[3];
        if(urlArr[4] != undefined) {
            newUrl += '/' + urlArr[4];
        } else {
            newUrl += 'home';
        }
        window.location.href = newUrl;
    }

</script>
<?php
    include('config.php');
    $url = "$_SERVER[REQUEST_URI]" ? "$_SERVER[REQUEST_URI]" : 'home';
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

    <!-- SideBar -->
    <aside>
        <div class="sidebar">
            <div class="sidebar-header">
                <img src="https://github.com/BrunoVini.png" alt="Bruno Souza">
                <h3>Bruno Souza</h3>
                <p>Full Stack Developer</p>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li><a href="home">Home</a></li>
                    <li><a href="sobre">Sobre</a></li>
                    <li><a href="contato">Contato</a></li>
                </ul>
            </div>
        </div>
    </aside>


  <?php

        if(file_exists("pages/". @$urlArr[2]. ".php")) {
            include("pages/". $urlArr[2]. ".php");
        } else {
            include("pages/404.php");        
        }

    ?>


</body>

</html>