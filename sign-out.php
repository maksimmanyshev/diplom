<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['id']) ;// разрегистрировали переменную
session_destroy(); // разрушаем сессию
header("Location: /index.php");
?>