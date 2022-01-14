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
          <img class="current-edition-line" src="/img/line1.png">
          <img class="current-edition-img" src="<?php echo$img_journal_path;?>">
        </div>
        <h1 class="journal-title"><?php echo "Том " . (string)((int)$years[0] - 2016)  . ", № " . $journals_in_year[0] . " (" . $years[0] . "): URAL RADIO ENGINEERING JOURNAL"?></h1>
        <div class="description">
          <h2>Содержание<a class="button-link" target="_blank" href="<?php echo $pdf_journal_path; ?>">Читать выпуск</a><a class="button-link" href="<?php echo $pdf_journal_path; ?>" download>Скачать выпуск</a></h2>
          <ul>
            <li>Терагерцовый сканирующий рефлектометр для визуализации строения полимерных конструкций в аддитивном производстве
              A. I. Berdyugin, A. V. Badin, R. P. Gursky, E. A. Trofimov, G. E. Kuleshov</li>
            <li>Частотно-перестраиваемое устройство на основе многослойного полосково-щелевого перехода и его применение для измерения диэлектрических свойств материалов
              D. G. Fomin, N. V. Dudarev, S. N. Darovskikh</li>
            <li>Исследование и модификация метода формирования встречного вихревого поля для развертывания фазы
              A. V. Sosnovsky</li>
            <li>Распознавание радиолокационных изображений, формируемых радиолокационными системами с синтезированной апертурой
              N. S. Vinogradova, L. G. Dorosinsky</li>
            <li>Учет паразитных эффектов при измерении эффективной диэлектрической проницаемости методом четвертьволнового резонатора
              A. V. Kornev, G. G. Goshin</li>
            <li>Метод повышения помехоустойчивости радиолокационных датчиков с переключением частоты
              V. Ya. Noskov, E. V. Bogatyrev, K. A. Ignatkov, O. A. Chernyh, K. D. Shaidurov</li>
          </ul>
    </div>
</div>
