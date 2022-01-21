<?php
session_start();
	function protect_page() { if (logged_in() === False ) {	header("Location: index.php"); } }
	function logged_in() { return(isset($_SESSION['login'])) ? true : False; }
	protect_page();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/authorization_style.css">
    <link rel="stylesheet" href="/css/admin_style.css">
    <script src="js/form_script.js"></script>
		<title>Ural Radio Engineering</title>
		<style>
			.authorization a:first-child {
				display: none;
			}

			.authorization  {
				top: 35%;
			}
		</style>
	</head>
	<body>
	<?php require "authorization.php" ?>
	<?php require "header.php"?>

  <main>
		<h1>Добавление нового журнала</h1>
      <form action="php/download_data.php" class="downloadform" method="POST" enctype="multipart/form-data">
				<h4>Заполните поля:</h4>
				<div class="journal-items">
        <label>
          Обложка: <span>*</span><br>
          <input required type="file" name="cover" id="cover">
        </label>
        <label>
          PDF файл: <span>*</span><br>
          <input required type="file" name="file" id="file">
        </label>
        <label>
          Год выпуска: <span>*</span><br>
          <input required type="text" name="year" id="year">
        </label>
			</div>
        <div class="articles" id="parentId">
        </div>
        <a class="article-button" onclick="return addField()" href="#">Добавить статью</a><br>
        <input class="button-link" type="submit" value="Добавить выпуск">
        <input type="hidden" name="articles_count" id="articles_count" value="0">
      </form>
		</main>
		<?php require "footer.php" ?>
	</body>
	<script type="text/javascript">
	// Targets all textareas with class "txta"
let textareas = document.querySelectorAll('textarea'),
	hiddenDiv = document.createElement('div'),
	content = null;

// Adds a class to all textareas
for (let j of textareas) {
j.classList.add('txtstuff');
}

// Build the hidden div's attributes

// The line below is needed if you move the style lines to CSS
// hiddenDiv.classList.add('hiddendiv');

// Add the "txta" styles, which are common to both textarea and hiddendiv
// If you want, you can remove those from CSS and add them via JS
hiddenDiv.classList.add('txta');

// Add the styles for the hidden div
// These can be in the CSS, just remove these three lines and uncomment the CSS
hiddenDiv.style.display = 'none';
hiddenDiv.style.whiteSpace = 'pre-wrap';
hiddenDiv.style.wordWrap = 'break-word';

// Loop through all the textareas and add the event listener
for(let i of textareas) {
(function(i) {
	// Note: Use 'keyup' instead of 'input'
	// if you want older IE support
	i.addEventListener('input', function() {

		// Append hiddendiv to parent of textarea, so the size is correct
		i.parentNode.appendChild(hiddenDiv);

		// Remove this if you want the user to be able to resize it in modern browsers
		i.style.resize = 'none';

		// This removes scrollbars
		i.style.overflow = 'hidden';

		// Every input/change, grab the content
		content = i.value;

		// Add the same content to the hidden div

		// This is for old IE
		content = content.replace(/\n/g, '<br>');

		// The <br ..> part is for old IE
		// This also fixes the jumpy way the textarea grows if line-height isn't included
		hiddenDiv.innerHTML = content + '<br style="line-height: 3px;">';

		// Briefly make the hidden div block but invisible
		// This is in order to read the height
		hiddenDiv.style.visibility = 'hidden';
		hiddenDiv.style.display = 'block';
		i.style.height = hiddenDiv.offsetHeight + 'px';

		// Make the hidden div display:none again
		hiddenDiv.style.visibility = 'visible';
		hiddenDiv.style.display = 'none';
	});
})(i);
}
	</script>
</html>
