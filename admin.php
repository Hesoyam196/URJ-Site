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
</html>
