<?php

	include 'header.php';

	
	if (isset($_POST[add_date_teacher])) {
			
 			mysqli_query ($dbc,"INSERT INTO teacher (login,password,surname,name,patronimic,position,mail) VALUES ('".$_POST[login]."','".$_POST[password]."','".$_POST[Sur_Name]."','".$_POST[Name]."','".$_POST[Patronimicy]."','".$_POST[Position]."','".$_POST[mail]."')");
 		echo "<br> Данные успешно добавлены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
 		}
 	if (isset($_POST[add_date_students])) {

 			mysqli_query ($dbc,"INSERT INTO students (login,password,surname,name,patronimic,id_groups_ref) VALUES ('".$_POST[login]."','".$_POST[password]."','".$_POST[Sur_Name]."','".$_POST[Name]."','".$_POST[patronimyc]."','".$_POST[group]."')");
 		echo "<br> Данные успешно добавлены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
 		}
 		if (isset($_POST[add_date_groups])) {

 		mysqli_query ($dbc,"INSERT INTO groups (gname,id_teacher_ref,specialty) VALUES ('".$_POST[Name]."','".$_POST[teach]."','".$_POST[speciality]."')");
 		
 		echo "<br> Данные успешно добавлены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
 		}






 		if (isset($_POST[delete_date_groups])) {

 		mysqli_query ($dbc,"DELETE FROM groups WHERE id_groups='".$_POST[del_groups]."'");
 		
 		echo "<br> Данные успешно удалены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
 		}
 		if (isset($_POST[delete_date_students])) {

 			mysqli_query ($dbc,"DELETE FROM students WHERE id_students='".$_POST[del_students]."'");
 		echo "<br> Данные успешно удалены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
 		}
 		if (isset($_POST[delete_date_teacher])) {
			
 			mysqli_query ($dbc,"DELETE FROM teacher WHERE id_teacher='".$_POST[del_teacher]."'");
 		echo "<br> Данные успешно удалены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
 		}




		if (isset($_POST[re_add_date_teacher])) {
			mysqli_query ($dbc,"UPDATE teacher SET  login='$_POST[login]', password='$_POST[password]', surname='$_POST[Sur_Name]', name='$_POST[Name]', patronimic='$_POST[Patronimicy]', position='$_POST[Position]', mail='$_POST[mail]' WHERE id_teacher='".$_POST[id_t]."'");
 		echo "<br> Данные успешно обновлены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
		} 	
		if (isset($_POST[re_add_date_students])) {
			mysqli_query ($dbc,"UPDATE students SET login='$_POST[login]', password='$_POST[password]', surname='$_POST[Sur_Name]', name='$_POST[Name]', patronimic='$_POST[Patronimicy]', id_groups_ref='$_POST[group_s]' WHERE id_students='".$_POST[id_s]."'");
 		echo "<br> Данные успешно обновлены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
		} 
		if (isset($_POST[re_add_date_groups])) {
			mysqli_query ($dbc,"UPDATE groups SET  gname='$_POST[Name]', specialty='$_POST[speciality]', id_teacher_ref='$_POST[klass_room]' WHERE id_groups='".$_POST[id_g]."'");
 		echo "<br> Данные успешно обновлены. Сейчас вы будете перенаправлены в личный кабинет <br> Если этого не произошло нажмите ";
 		echo "<a href=index.php>ЗДЕСЬ</a> <br>";
 		echo "<script language='JavaScript' type='text/javascript'>
<!--
function GoNah(){
 location='index.php';
}
setTimeout( 'GoNah()', 3000 );
//-->
</script>";
		} 	


			include 'foother.php';
			?>
		