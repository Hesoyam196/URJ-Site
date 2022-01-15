<?php
$year = $_POST['year'];
$journals_path = "D:/OpenServer/domains/mysite/journals/";
$year_path = $journals_path . (string)$year;
#возможные if'ы по полям
if (!file_exists($year_path)) {
  mkdir($year_path);
}

$journals = array_diff(scandir($year_path), array('..', '.'));
$current_journal_path = $year_path . "/" . (string)(count($journals) + 1);
$articles_path = $current_journal_path . "/" . "articles";
mkdir($current_journal_path);
mkdir($articles_path);

if (move_uploaded_file($_FILES['file']['tmp_name'], $current_journal_path . "/" . $_FILES['file']['name'])) {
}
else {
}

if (move_uploaded_file($_FILES['cover']['tmp_name'], $current_journal_path . "/" . $_FILES['cover']['name'])) {
}
else {
}

for ($i = 1; $i <= (int)($_POST['articles_count']); $i++) {
  $current_article_path = $articles_path . "/" . (string)($i);
  mkdir($current_article_path);
  if (move_uploaded_file($_FILES['article_file' . (string)($i)]['tmp_name'], $current_article_path . "/" . $_FILES['article_file' . (string)($i)]['name'])) {
  }
  else {
  }

  $file_name = fopen($current_article_path . "/" . "name.txt", 'w') or die("не удалось создать файл");
  fwrite($file_name, $_POST['name' . (string)($i)]);
  fclose($file_name);

  $file_name = fopen($current_article_path . "/" . "autors.txt", 'w') or die("не удалось создать файл");
  fwrite($file_name, $_POST['autors' . (string)($i)]);
  fclose($file_name);

  $file_name = fopen($current_article_path . "/" . "annotation.txt", 'w') or die("не удалось создать файл");
  fwrite($file_name, $_POST['annotation' . (string)($i)]);
  fclose($file_name);

  $file_name = fopen($current_article_path . "/" . "citation.txt", 'w') or die("не удалось создать файл");
  fwrite($file_name, $_POST['citation' . (string)($i)]);
  fclose($file_name);

  $file_name = fopen($current_article_path . "/" . "keywords.txt", 'w') or die("не удалось создать файл");
  fwrite($file_name, $_POST['keywords' . (string)($i)]);
  fclose($file_name);

  $file_name = fopen($current_article_path . "/" . "literatures.txt", 'w') or die("не удалось создать файл");
  fwrite($file_name, $_POST['literatures' . (string)($i)]);
  fclose($file_name);
}
header("Location: /../admin.php");
exit();
?>
