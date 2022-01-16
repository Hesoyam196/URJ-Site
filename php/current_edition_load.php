<?php
$path_journals = "D:/OpenServer/domains/mysite/journals/";
$years = array_diff(scandir($path_journals, 1), array('..', '.'));
$journals_in_year = array_diff(scandir($path_journals . "/" . $years[0], 1), array('..', '.'));
$elements;
if (count($years) != 0)
  $elements = array_diff(scandir($path_journals . "/" . $years[0] . "/" . $journals_in_year[0], 1), array('..', '.'));
else
  $elements = "";

foreach ($elements as $key => $element) {
  $type = explode('.', $element);
  if ($type[1] == "pdf")
    $pdf_journal_path = $element;
  else if ($type[1] == "jpg" || $type[1] == "png" || $type[1] == "svg")
    $img_journal_path = $element;
}
  $img_journal_path = "/journals" . "/" . $years[0] . "/" . $journals_in_year[0] . "/" . $img_journal_path;
  $pdf_journal_path = "/journals" . "/" . $years[0] . "/" . $journals_in_year[0] . "/" . $pdf_journal_path;
?>

<div class="current-edition">
        <h1>Текущий выпуск:</h1>
        <div class="cover">
          <img class="current-edition-img" src="<?php echo$img_journal_path;?>">
        </div>
        <h1 class="journal-title"><?php echo "Том " . (string)((int)$years[0] - 2016)  . ", № " . $journals_in_year[0] . " (" . $years[0] . "): URAL RADIO ENGINEERING JOURNAL"?></h1>
        <div class="description">
          <h2>Содержание
            <form action="edition.php" method="GET">
              <input type="hidden" name="path" value="<?php echo "journals/" . $years[0] . "/" . $journals_in_year[0] ?>">
              <button class="button-link">Посмотреть выпуск</button>
            </form>
            <a class="button-link" href="<?php echo $pdf_journal_path; ?>" download>Скачать выпуск</a>
          </h2>
          <ul>
            <?php
              $articles;
              $articles_path = "journals" . "/" . $years[0] . "/" . $journals_in_year[0] . "/" . "articles";
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

                $autors = file_get_contents($file_autors);
                $get  = mb_detect_encoding($autors, array('utf-8', 'cp1251'));
                $autors = iconv($get,'UTF-8', $autors);
                echo "<li>" . $name_articles . " " . (String)$autors . "</li>";
              }
            ?>
    </div>
</div>
