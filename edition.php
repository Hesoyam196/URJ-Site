<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/edition_style.css">
		<link rel="stylesheet" href="/css/authorization_style.css">
		<title>Ural Radio Engineering</title>
	</head>
	<body>
		<?php require "authorization.php" ?>
		<?php require "header.php" ?>
		<main>
      <div class="ISSN">
			<p>ISSN онлайн-версии: <span>2588-0462</span></p>
			<p>ISSN печатной версии: <span>2588-0454</span></p>
		</div>
      <?php
				$files;
				$img;
				$pdf;
				$articles;
        $path = $_GET['path'];

        $elements = explode("/", $path);
				if (file_exists($path)) {
        	$files = array_diff(scandir($path), array('..', '.'));
				}

        foreach ($files as $key => $file) {
          if (in_array("png", explode(".", $file)) || in_array("jpg", explode(".", $file))) { $img = $file; }
          if (in_array("pdf", explode(".", $file))) { $pdf = $file; }
        }

        $pdf = $path . "/" . $pdf;
        $img = $path . "/" . $img;
      ?>
      <div class="edition">
        <h1 class="edition-title"><?php echo "Том " . (string)((int)$elements[1] - 2016) . ", № " . $elements[2] . " (" . $elements[1] . "): URAL RADIO ENGINEERING JOURNAL"?></h1>
              <div class="cover">
                <img class="current-edition-img" src="<?php echo$img;?>">
              </div>
                <a class="button-link" href="<?php echo $pdf; ?>" download>Скачать выпуск</a>
      </div>
              <div class="description">
                <h2>Содержание</h2>
                <ul>
									<?php
										$articles_path = $path . "/" . "articles";
										if (file_exists($articles_path)) {
											$articles = array_diff(scandir($articles_path), array('..', '.'));
										}

										foreach ($articles as $key => $article) {
											$article = $articles_path . "/" . $article;
											$article_info = array_diff(scandir($article), array('..', '.'));
											$file_name;
											$file_autors;
											$name_articles;
											$autors;
											foreach ($article_info as $key => $article_el) {
												if (in_array("name", explode(".", $article_el))) { $file_name = $article . "/" . $article_el; }
												if (in_array("autors", explode(".", $article_el))) { $file_autors = $article . "/" . $article_el; }
											}

											$name_articles = file_get_contents($file_name);
											$get  = mb_detect_encoding($name_articles, array('utf-8', 'cp1251'));
											$name_articles = iconv($get,'UTF-8', $name_articles);

											if (file_exists($file_autors))
												$autors = file_get_contents($file_autors);
											$get  = mb_detect_encoding($autors, array('utf-8', 'cp1251'));
											$autors = iconv($get,'UTF-8', $autors);
											$article = "<li><form action=\"article.php\" method=\"GET\"><input type=\"hidden\" name=\"path\" value=\"" . $article . "\"><button class=\"article-link\">" . $name_articles . " " . (String)$autors . "</button></form></li>";
											echo $article;
										}
									?>
                </ul>
      </div>
		</main>
		<?php require "footer.php" ?>
	</body>
	<script src="js/menu.js"></script>
</html>
