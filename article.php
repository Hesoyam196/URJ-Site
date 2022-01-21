<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/journal_style.css">
		<link rel="stylesheet" href="/css/authorization_style.css">
		<link rel="stylesheet" href="/css/article_style.css">
		<script src="js/jquery-3.6.0.js"></script>
		<title>Ural Radio Engineering</title>
	</head>
	<body>
		<?php require "authorization.php" ?>
		<?php require "header.php" ?>
		<main>
      <?php
        $path = $_GET['path'];
				$elements = array_diff(scandir($path), array('..', '.'));
				$name;
				$autors;
				$annotatin;
				$citation;
				$literatures;
				$keywords;
				$link;
				$pdf;
				$video;

				function get_text($file) {
					$new_file = file_get_contents($file);
					$get = mb_detect_encoding($new_file, array('utf-8', 'cp1251', 'koi8-r', 'windows-1251'));
					$new_file = iconv($get,'utf-8', $new_file);

					if ($new_file == "") {
						$new_file = file_get_contents($file);
					}
					return $new_file;
				}

				foreach ($elements as $key => $element) {
					if (in_array("name", explode(".", $element))) { $name = $path . "/" . $element; }
					if (in_array("autors", explode(".", $element))) { $autors = $path . "/" . $element; }
					if (in_array("annotation", explode(".", $element))) { $annotatin = $path . "/" . $element; }
					if (in_array("citation", explode(".", $element))) { $citation = $path . "/" . $element; }
					if (in_array("literatures", explode(".", $element))) { $literatures = $path . "/" . $element; }
					if (in_array("keywords", explode(".", $element))) { $keywords = $path . "/" . $element; }
					if (in_array("link", explode(".", $element))) { $link = $path . "/" . $element; }
					if (in_array("pdf", explode(".", $element))) { $pdf = $path . "/" . $element; }
					if (in_array("mp4", explode(".", $element))) { $video = $path . "/" . $element; }
				}

				if (file_exists($name))
					$name = get_text($name);

				if (file_exists($autors))
					$autors = get_text($autors);

				if (file_exists($annotatin))
					$annotatin = get_text($annotatin);

				if (file_exists($citation))
					$citation = get_text($citation);

				if (file_exists($literatures))
					$literatures = get_text($literatures);

				if (file_exists($keywords))
					$keywords = get_text($keywords);

				if (file_exists($link))
					$link = get_text($link);

				if ($name != "") {
					echo "<h1 class=\"title\">" . $name . "</h1>";
				}
				if ($pdf != "") {
					echo "<a class=\"button-link download\" href=\"" . $pdf . "\">Скачать статью</a>";
				}

				echo "<div class=\"content\">";
				if ($autors != "") {
					echo "<div class=\"autors\"><h2>Авторы</h2>";
					echo "<p>" . $autors . "</p></div>";
				}

				if ($video != "") {
					echo "<div class=\"video\"><h2>Видеофрагмент</h2>";
					echo "<video src=\"" . $video . "\" controls></video></div>";
				}

				if ($annotatin != "") {
					echo "<div class=\"annotation\"><h2>Аннотация</h2>";
					echo "<p>" . $annotatin . "</p></div>";
				}

				if ($citation != "") {
					echo "<div class=\"citation\"><h2>Цитирование</h2>";
					echo "<p id=\"to-copy\">" . $citation . "</p>";
					echo "<button class=\"citation-button\" onclick=\"copytext('#to-copy')\">Скопировать цитирование</button></div>";
				}


				if ($keywords != "") {
					$keywords = explode("\n", $keywords);
						echo "<div class=\"keywords\"><h2>Ключевые слова</h2><p>";
					for ($i = 0; $i < count($keywords); $i++) {
						echo "<span>" . $keywords[$i] . "</span>";
					}
					echo "</p></div>";
				}

				if ($link != "") {
						echo "<p class=\"link\">DOI: <a href=\"" . $link . "\">" . $link . "</a></p>";
				}

				if ($literatures != "") {
					$lit = explode("\n", $literatures);
					echo "<div class=\"literatures\"><h2>Литература</h2>";
					echo "<ol>";
					for ($i = 0; $i < count($lit); $i++) {
						echo "<li>" . $lit[$i] . "</li>";
					}
					echo "</ol></div>";
				}
				echo "</div>";
      ?>
		</main>
		<?php require "footer.php" ?>
	</body>
	<script>
function copytext(el) {
    var $tmp = $("<input>");
    $("body").append($tmp);
    $tmp.val($(el).text()).select();
    document.execCommand("copy");
    $tmp.remove();
}
</script>
	<script src="js/citation_script.js"></script>
	<script src="js/menu.js"></script>
</html>
