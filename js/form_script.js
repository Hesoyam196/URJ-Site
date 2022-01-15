var countOfFields = 0; // Текущее число полей
var curFieldNameId = 0; // Уникальное значение для атрибута name
var maxFieldLimit = 100; // Максимальное число возможных полей
function deleteField(a) {
// Получаем доступ к ДИВу, содержащему поле
var contDiv = a.parentNode;
// Удаляем этот ДИВ из DOM-дерева
contDiv.parentNode.removeChild(contDiv);
// Уменьшаем значение текущего числа полей
countOfFields--;
// Возвращаем false, чтобы не было перехода по сслыке
return false;
}
function addField() {
if (countOfFields >= maxFieldLimit) {
alert("Число полей достигло своего максимума = " + maxFieldLimit);
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
div.innerHTML = "<label>PDF Файл:<br><input type=\"file\" name=\"article_file"+String(curFieldNameId)+"\" id=\"article_file"+String(curFieldNameId)+"\"></label>"+
"<label>Название:<br><textarea name=\"name"+String(curFieldNameId)+"\" id=\"name"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Авторы:<br><textarea name=\"autors"+String(curFieldNameId)+"\" id=\"autors"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Аннотация:<br><textarea name=\"annotation"+String(curFieldNameId)+"\" id=\"annotation"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Цитирование:<br><textarea name=\"citation"+String(curFieldNameId)+"\" id=\"citation"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Ключевые слова:<br><textarea name=\"keywords"+String(curFieldNameId)+"\" id=\"keywords"+String(curFieldNameId)+"\"></textarea></label>"+
"<label>Литература:<br><textarea name=\"literatures"+String(curFieldNameId)+"\" id=\"literatures"+String(curFieldNameId)+"\"></textarea></label>"+
"<a class=\"article-button\" onclick=\"return deleteField(this)\" href=\"#\">Удалить статью</a>";
// Добавляем новый узел в конец списка полей
document.getElementById("parentId").appendChild(div);
document.getElementById('articles_count').value = curFieldNameId;
// Возвращаем false, чтобы не было перехода по сслыке
return false;
}