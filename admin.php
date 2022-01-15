<?php
session_start();
	function protect_page() {
		if (logged_in() === False ) {
						header("Location: index.php");
				}
			}

	function logged_in() {
		return(isset($_SESSION['login'])) ? true : False;
		}
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
	</head>
	<body>
	<?php require "authorization.php" ?>
	<?php require "header.php"?>
  <main>
      <form action="php/download_data.php" class="downloadform" method="POST" enctype="multipart/form-data">
        <label>
          Обложка:<br>
          <input type="file" name="cover" id="cover">
        </label>
        <label>
          PDF файл:<br>
          <input type="file" name="file" id="file">
        </label>
        <label>
          Год выпуска:<br>
          <input type="text" name="year" id="year">
        </label>
        <div class="articles" id="parentId">
        </div>
        <a class="button-article" onclick="return addField()" href="#">Добавить статью</a>
        <input class="button-link" type="submit" value="Добавить журнал">
        <input type="hidden" name="articles_count" id="articles_count" value="0">
      </form>
		</main>
		<?php require "footer.php" ?>
	</body>
</html>
