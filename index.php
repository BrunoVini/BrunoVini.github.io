<script>
	var userLang = navigator.language || navigator.userLanguage;
	var url = window.location.href;
	var urlArr = url.split('/');
    var lang = urlArr[3].substring(0, 2);

	if (lang.includes('pt') || lang.includes('en')) {
		if (urlArr[4] === undefined || urlArr[4].length == 0) {
			let lastChar = url[url.length - 1];
			if (lastChar == '/') {
				url = url.slice(0, -1);
			}
			window.location.href = url + '/home';
		}
        window.history.pushState({}, null, urlArr[0] + '//' + urlArr[2] + '/' + lang + '/' + urlArr[4]);
	} else {
		let newUrl = urlArr[0] + '//' + urlArr[2] + '/' + userLang + '/' + lang;
		if (urlArr[4] != undefined) {
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
    $urlArr = explode('/', $url);    
    if(strpos($urlArr[1], 'pt') !== false) {
        $lang = "pt";
    } else {
        $lang = "en";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bruno Souza - Portifólio</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
		integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet"
		href="<?php echo INCLUDE_PATH ?>styles/main.css">
</head>

<body>

	<!-- SideBar -->
	<aside>
		<div class="sidebar">
			<div class="sidebar-header">
				<img src="https://github.com/BrunoVini.png" alt="Bruno Souza">
				<h3>Bruno Souza</h3>
				<p class="en">
                    <?php echo $lang === ("pt") ? "Desenvolvedor Full Stack" : "Full Stack Developer" ;?>
                </p>
			</div>
			<div class="sidebar-menu">
				<ul>
					<li>
                        <a href="home">
							<i class="fa-solid fa-house"></i>
							Home
						</a>
                    </li>
                    <li>
                        <a href="about">
                            <i class="fa-solid fa-user"></i>
                            <?php echo $lang === ("pt") ? "Sobre" : "About" ;?>
                        </a>
                    </li>
					<li>
                        <a href="portifolio">
							<i class="fa-regular fa-folder-open"></i>
                            <?php echo $lang === ("pt") ? "Portifólio" : "Portifolio" ;?>
                        </a>
					</li>
					<li> <a href="<?php echo INCLUDE_PATH . "documents/curriculum-" . $lang?>.pdf" target="_blank" rel="noopener noreferrer">
                    <i class="fa-regular fa-file-pdf"></i>
                        <?php echo $lang === ("pt") ? "Currículo" : "Curriculum" ;?>
                    </a>
					</li>
				</ul>

                <div id="flags">
                    <a href="<?php echo INCLUDE_PATH ?>pt/<?php echo $urlArr[2] ?>" class="pt <?php echo $lang === ("pt") ? "active" : "" ; ?>">
                        <img src="<?php echo INCLUDE_PATH ?>images/pt.svg" alt="Português">
                    </a>
                    <a href="<?php echo INCLUDE_PATH ?>en/<?php echo $urlArr[2] ?>" class="en <?php echo $lang === ("pt") ? "" : "active" ; ?>">
                        <img src="<?php echo INCLUDE_PATH ?>images/en.svg" alt="English">
                    </a>
                </div>
			</div>
		</div>
	</aside>

    <!-- Main -->
    <div id="body">
        <div id="conteudo">
            <?php    
            if(file_exists("pages/". @$urlArr[2]. ".php")) {
                include("pages/". $urlArr[2]. ".php");
            } else {
                echo "<script>window.location.href = '". INCLUDE_PATH. $lang. "/home';</script>";
            }
    
            ?>
        </div>
    </div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
	</script>

</body>

</html>