<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/css/journal_style.css">
		<link rel="stylesheet" href="/css/authorization_style.css">
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
			<div class="archive">
				<h1>Архив</h1>
				<?php require "php/journals_load.php" ?>
			</div>
		</main>
		<?php require "footer.php" ?>
	</body>
</html>
