<?php

	include 'header.php';

if (empty($_SESSION['id'])) {
	echo "


 	<h1 align='center'> Журнал посещаемости</h1>
 	<div><p align='center'>Для работы с журналом пройдите авторизацию</p></div>
 	<div class=sig_up>
 	<form action='sign-up.php' method='post'>
 		<div> выберете роль на сайте </div>
 		<input type='radio' name='role' value='admin' > Администратор <br>
 		<input type='radio' name='role' value='user' > Преподаватель <br>
 		<input type='radio' name='role' value='student' > Cтудент <br>
 		<input type='text' size='40' name='login'><br><br>
 		<input type='password' size='40' name='password'><br><br>

 		<input type='submit' class='button_one' >


 	</form>
 	
 	</div> ";

}
	else  if ($_SESSION['login']=='admin'){ 
		echo "<p>Вы вошли как ", $_SESSION['name']; 
echo "<br><a href='sign-out.php'>Выход</a></p>";
include 'admin.php';
}
else if ($_SESSION['role']=='teacher') {
	echo "<p>Вы вошли как ", $_SESSION['surname_t'], " ", $_SESSION['name_t']," ", $_SESSION['patronimic_t'];
	echo "<br> <a href='sign-out.php'>Выход</a></p>";
	include 'lk_teacher.php';
}
else if ($_SESSION['role']=='students') {
	echo "<p>Вы вошли как ", $_SESSION['surname_s'], " ", $_SESSION['name_s']," ", $_SESSION['patronimic'];
	echo "<br> <a href='sign-out.php'>Выход</a></p>";
	include 'lk_students.php';
}
	include 'foother.php';
?>