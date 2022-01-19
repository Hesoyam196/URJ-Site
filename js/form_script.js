var countOfFields = 0; // Текущее число полей
var curFieldNameId = 0; // Уникальное значение для атрибута name
var maxFieldLimit = 100; // Максимальное число возможных полей
function deleteField(a) {
countOfFields--;
curFieldNameId--;
// Получаем доступ к ДИВу, содержащему поле
var contDiv = a.parentNode;
// Удаляем этот ДИВ из DOM-дерева
contDiv.parentNode.removeChild(contDiv);
// Уменьшаем значение текущего числа полей
// Возвращаем false, чтобы не было перехода по сслыке
document.getElementById('articles_count').value = countOfFields;
return false;
}
function addField() {
if (countOfFields >= maxFieldLimit) {
alert("Слишком много статей!");
return false;
}
// Увеличиваем текущее значение числа полей
countOfFields++;
// Увеличиваем ID
curFieldNameId++;
// Создаем элемент ДИВ
var div = document.createElement("div");
// Добавляем HTML-контент с пом. свойства innerHTML
div.classList.add("article");
div.innerHTML = "<h3>Статья "+String(curFieldNameId)+"</h3><label>PDF Файл: <span>*</span><br><input required type=\"file\" name=\"article_file"+String(curFieldNameId)+"\" id=\"article_file"+String(curFieldNameId)+"\"></label>"+
"<label>Название:<br><textarea required placeholder=\"Введите название статьи...\" name=\"name"+String(curFieldNameId)+"\" id=\"name"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Авторы:<br><textarea placeholder=\"Введите авторов...\" name=\"autors"+String(curFieldNameId)+"\" id=\"autors"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Аннотация:<br><textarea placeholder=\"Введите аннотацию...\" name=\"annotation"+String(curFieldNameId)+"\" id=\"annotation"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Цитирование:<br><textarea placeholder=\"Введите цитирование...\" name=\"citation"+String(curFieldNameId)+"\" id=\"citation"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Ключевые слова:<br><textarea placeholder=\"Введите ключевые слова через перенос строки. Например: электричество\nрадио\" name=\"keywords"+String(curFieldNameId)+"\" id=\"keywords"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Литература:<br><textarea placeholder=\"Введите литературу через перенос строки...\" name=\"literatures"+String(curFieldNameId)+"\" id=\"literatures"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>DOI:<br><textarea placeholder=\"Введите DOI...\" name=\"DOI"+String(curFieldNameId)+"\" id=\"DOI"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Видеофрагмент:<br><input type=\"file\" name=\"video"+String(curFieldNameId)+"\" id=\"video"+String(curFieldNameId)+"\"></label>"+
"<a class=\"article-button\" onclick=\"return deleteField(this)\" href=\"#\">Удалить статью</a>";
// Добавляем новый узел в конец списка полей
document.getElementById("parentId").appendChild(div);
document.getElementById('articles_count').value = countOfFields;
// Возвращаем false, чтобы не было перехода по сслыке
return false;
}