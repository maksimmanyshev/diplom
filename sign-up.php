<?php
session_start();
include 'db_connect.php';
 if (empty($_POST['login'])){
		echo "Введите логин <a href=index.php> назад</a>";
	}
	else  if (empty($_POST['password'])){
			echo "Введите пароль <a href=index.php> назад</a>";
		}
	else  if (empty($_POST['role'])){
		echo "Выберите роль <a href=index.php> назад</a>";
	}
	if ( isset($_POST['login']) && !empty($_POST['password'])) {
		
		 if ($_POST['role']==admin) {
			
			$login=$_POST['login'];
			$password=$_POST['password'];
			$result = mysqli_query($dbc,"SELECT * FROM admin WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_array($result);
		if ($myrow['password']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow['login'];
    $_SESSION['name']=$myrow['name'] ;
    $_SESSION['role']='admin';
    $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    header("Location: /index.php");;
    echo $_SESSION['name'];
    }
 else {    //если пароли не сошлись

    exit ("Извините, введённый вами login или пароль неверный. <br><a href='index.php'>Главная страница</a>");
    }

		}
		else if ($_POST['role']==student) {
			
			$login=$_POST['login'];
			$password=$_POST['password'];
			$result = mysqli_query($dbc,"SELECT * FROM students WHERE login='$login'"); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_array($result);
		if ($myrow['password']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow['login'];
    $_SESSION['surname_s']=$myrow['surname'];
    $_SESSION['patronimic']=$myrow['patronimic'];
    $_SESSION['name_s']=$myrow['name'];
    $_SESSION['role']='students';
    $_SESSION['grupp']=$myrow['id_groups_ref'];
    $_SESSION['id']=$myrow['id_students'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    header("Location: /index.php");;
    echo $_SESSION['login'];
		}
		
		else {echo "Выберете роль <a href=index.php> назад</a>";}
	}

	

		else if ($_POST['role']==user) {
			
			$login=$_POST['login'];
			$password=$_POST['password']; 
			$result = mysqli_query($dbc,"SELECT * FROM teacher t,groups g WHERE login='$login' "); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysqli_fetch_array($result);
		if ($myrow['password']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow['login']; 
     $_SESSION['surname_t']=$myrow['surname'];
    $_SESSION['patronimic_t']=$myrow['patronimic'];
    $_SESSION['name_t']=$myrow['name'];
    $_SESSION['role']='teacher';
    $_SESSION['id']=$myrow['id_teacher'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
    header("Location: /index.php");;
    echo $_SESSION['login'];
		}
		
		else {echo "Выберете роль <a href=index.php> назад</a>";}
	}

	
}


?>