<?php
$path_journals = "D:/OpenServer/domains/mysite/journals/";
$years = array_diff(scandir($path_journals, 1), array('..', '.'));

foreach ($years as $key_year => $year) {
  $journals_in_year = array_diff(scandir($path_journals . "/" . $year), array('..', '.'));
  if (is_dir($path_journals . "/" . $year) && count($journals_in_year) != 0) {
    echo "
    <div class=\"year\">
				<h3>" . $year . "</h3>";
    foreach ($journals_in_year as $key_journal => $journal) {
      if (is_dir($path_journals . "/" . $year . "/" . $journal)) {
      $elements = array_diff(scandir($path_journals . "/" . $year . "/" . $journal), array('..', '.'));
      $pdf_journal_path = "";
      $img_journal_path = "";
      foreach ($elements as $key => $element) {
        $type = explode('.', $element);
        if ($type[1] == "pdf")
          $pdf_journal_path = $element;
        else if ($type[1] == "jpg" || $type[1] == "png" || $type[1] == "svg")
          $img_journal_path = $element;
      }
      $img_journal_path = "/journals" . "/" . $year . "/" . $journal . "/" . $img_journal_path;
              echo ("<div class=\"edition\">
                      <form class=\"journal\" action=\"edition.php\" method=\"GET\">
                      <input type=\"hidden\" name=\"path\" value=\"journals" . "/" . $year . "/" . $journal . "\"/>
                      <button>
                      <img src=\"" . $img_journal_path . "\">
                      <p>Том " . (string)((int)$year - 2016)  . ", № " . $journal . " (" . $year . "): URAL RADIO ENGINEERING JOURNAL</p></button></form></div>");
      }
    }
    echo "</div>";
  }
}
?>
