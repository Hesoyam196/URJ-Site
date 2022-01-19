<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/authorization_style.css">
    <link rel="stylesheet" href="/css/search_style.css">
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
    <h1>Поиск</h1>
    <p>Поиск по названиям статей</p>
		<form class="search-form" action="search.php" method="GET">
      <div class="search-line">
      <input type="text" id="require" name="require" value=<?php echo "\"" . $_GET['require'] . "\""; ?>>
      <button class="submit" type="submit" name="button">Найти <img src="img/search.png"></button>
    </div>
      <div class="checks">
        <p>Искать так же в</p>
      <div class="checkbox">
        <span>aннотациях</span>
        <input class="custom-checkbox" type="checkbox" name="annotation" id="annotation" <?php if ($_GET['annotation'] == "on") echo "checked"; ?>>
        <label for="annotation"></label>
      </div>
      <div class="checkbox">
        <span>ключевых словах</span>
        <input class="custom-checkbox" type="checkbox" name="keywords" id="keywords" <?php if ($_GET['keywords'] == "on") echo "checked"; ?>>
        <label for="keywords"></label>
      </div>
    </div>
    </form>
    <?php
    function get_text($file) {
      $new_file = file_get_contents($file);
      $get = mb_detect_encoding($new_file, array('utf-8', 'cp1251', 'koi8-r', 'windows-1251'));
      $new_file = iconv($get,'utf-8', $new_file);

      if ($new_file == "") {
        $new_file = file_get_contents($file);
      }
      return $new_file;
    }

    function get_article_name($path) {
      $path = $path . "/name.txt";
      if (file_exists($path)) {
        return get_text($path);
      }
      return false;
    }

    $path = "D:/OpenServer/domains/mysite/journals";
    $years = array_diff(scandir($path), array('..', '.'));
    $result = [];

    if ($_GET['require'] != ""){
    foreach ($years as $key => $year) {
      $year = $path . "/" . $year;
      $journals = array_diff(scandir($year), array('..', '.'));

      foreach ($journals as $key => $journal) {
        $article_path = $year . "/" . $journal . "/articles";
        $journal = $year . "/" . $journal;
        $articles;

        if (file_exists($article_path))
          $articles = array_diff(scandir($article_path), array('..', '.'));

        foreach ($articles as $key => $article) {
          $article = $article_path . "/" . $article;
          $name = $article . "/name.txt";
          $annotation = $article . "/annotation.txt";
          $keywords = $article . "/keywords.txt";

          if (file_exists($name)) {
            $name_text = get_text($name);
            $pos_in_name = stripos($name_text, $_GET['require']);
            if ($pos_in_name !== false) {
              if ($result[$journal] != "") {
                if (!in_array($article, $result[$journal])) { $result[$journal][] = $article; }}
              else { $result[$journal][] = $article; }}
          }

          if (file_exists($annotation) and $_GET['annotation'] == "on") {
            $annotation_text = get_text($annotation);
            $pos_in_annotation = stripos($annotation_text, $_GET['require']);
            if ($pos_in_annotation !== false) {
              if ($result[$journal] != ""){
                if (!in_array($article,   $result[$journal])) { $result[$journal][] = $article; }}
              else { $result[$journal][] = $article; }}
          }

          if (file_exists($keywords) and $_GET['keywords'] == "on") {
            $keywords_text = get_text($keywords);
            $pos_in_keywords = stripos($keywords_text, $_GET['require']);
            if ($pos_in_keywords !== false) {
                if ($result[$journal] != ""){
                if (!in_array($article,   $result[$journal])) { $result[$journal][] = $article; }}
                else {  $result[$journal][] = $article;  }}
          }
        }
      }
    }

      foreach (array_keys($result) as $key => $value) {
        $elements = explode("/", $value);
        $year = (int)$elements[count($elements) - 2];
        $journal = (int)$elements[count($elements) - 1];
        echo "<div class=\"jour\"><ul class=\"ul-search\">
        <form action=\"edition.php\" method=\"GET\"><input type=\"hidden\" name=\"path\" value=\"journals" . "/" . $year . "/" . $journal . "\"/><button class=\"journal-button\">
        Том " . (string)((int)$year - 2016)  . ", № " . $journal . " (" . $year . "): URAL RADIO ENGINEERING JOURNAL</button></form>";
        foreach ($result[$value] as $key => $p) {
          echo "<li><div class=\"artic\"><form action=\"article.php\" method=\"GET\"><input type=\"hidden\" name=\"path\" value=\"" . $p . "\">
          <button class=\"article-button\">" . get_article_name($p) . "</button></form></div></li>";
        }
        echo "</ul></div>";
      }
    }
    ?>
		</main>
		<?php require "footer.php" ?>
	</body>
  <script src="js/menu.js"></script>
</html>
