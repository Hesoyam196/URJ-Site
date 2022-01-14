<div onclick="show('none')" id="gray"></div>
<div id="window">
    <img class="close" src="img/close.png" alt=""  onclick="show('none')">
    <div class="form">
        <h2>Вход</h2>
        <form action="index.php" name="f1" method="POST">
            <input type="text" placeholder="Логин" name="login" class="input">
            <input type="password" placeholder="Пароль" name="password" class="input">
            <div class="button-i">
            <input type="submit" value="Войти" name="sab" class="input">
            </div>
        </form>
    </div>
</div>
<script>
  function show(state)
	{
	document.getElementById('window').style.display = state;
	document.getElementById('gray').style.display = state;
	}
</script>
<?php
session_start();
if(isset($_POST['login']) and isset($_POST['password'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];
  if(1 == 1) { //УСЛОВИЕ СОВПАДЕНИЯ ЛОГИНА И ПАРОЛЯ
    $_SESSION['login'] = $login;
  }
  else {
    $fsmg = "Ошибка";
  }
}

if(isset($_SESSION['login'])) {
  $login = $_SESSION['login'];
  echo "Вы вошли!!";
}


?>
