<header>
	<div class="main-logo">
		<a href="index.php"><img src="/img/mini-logo.png"></a>
	</div>
	<a class="header-title" href="index.php">URAL RADIO ENGINEERING JOURNAL</a>
	<nav>
		<ul class="nav-menu">
			<li><a href="/">Главная</a></li>
			<li><a href="journal.php">Журнал</a></li>
			<li><a href="to_authors.php">Авторам</a></li>
			<li><a href="redactors.php">Редакция</a></li>
			<li><a href="contacts.php">Контакты</a></li>
		</ul>
	</nav>
	<?php
	if(isset($_SESSION['login'])) {
		$login = $_SESSION['login'];
		echo "<div class=\"authorization\">
		<a style=\"font-size: 32px;\" href=\"admin.php\">+</a>
		<a href='php/logout.php'>Выйти</a>
		</div>";
	}
	else {
		$login = $_SESSION['login'];
		echo "<div class=\"authorization\">
			<button onclick=\"show('block')\">
			<img class=\"img-auth\" src=\"/img/auth.png\">
			<p>Авторизация</p>
		</button>
		</div>";
	}
	?>
</header>
