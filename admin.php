<?php

 	
?>
	
	<br>
	<form action="" method="post">
		<button name="teachers">Преподаватели</button>
		<button name="students">Студенты</button>
		<button name="groups">Группы</button>
		
	</form>
<?php
	if (isset($_POST['teachers'])) {
		echo "<h1>Преподаватели</h1>";
		$result = mysqli_query($dbc,"SELECT * FROM teacher ORDER BY surname"); //извлекаем из базы все данные 
    	echo "<table border=1px>";
    	echo "<tr><th>Номер</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Должность</th><th>Эл. почта</th><th>Логин</th><th>Пароль</th></tr>";
    	$f=1;
    	while($row=mysqli_fetch_array($result))
{ echo '<tr><td>'.$f.'</td><td>'.$row[surname].'</td><td>'.$row[name].'</td><td>'.$row[patronimic].'</td><td>'.$row[position].'</td><td>'.$row[mail].'</td><td>'.$row[login].'</td><td>'.$row[password].'</td></tr>';
$f++;
}
echo "</table>
<form action='' method='post'>
	<br><button name='new_date_teachers'>Добавить</button>
	<button name='del_date_teachers'>Удалить</button>
	<button name='re_date_teachers'>Редактировать</button>

</form>";


		# code...
	}
	if (isset($_POST['students'])) {
		echo " <h1> Студенты </h1>";
		$result = mysqli_query($dbc,"SELECT * FROM students s,groups g where s.id_groups_ref=g.id_groups ORDER BY id_groups_ref, surname" ); //извлекаем из базы все данные 
    	echo "<table border=1px>";
    	echo "<tr><th>Номер</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Группа</th><th>Логин</th><th>Пароль</th></tr>";
    	$f=1;
    	while($row=mysqli_fetch_array($result))
{ echo '<tr><td>'.$f.'</td><td>'.$row[surname].'</td><td>'.$row[name].'</td><td>'.$row[patronimic].'</td><td>'.$row[gname].'</td><td>'.$row[login].'</td><td>'.$row[password].'</td></tr>';
$f++;
}
echo "</table><form action='' method='post'>
	<br><button name='new_date_students'>Добавить</button>
	<button name='del_date_students'>Удалить</button>
	<button name='re_date_students'>Редактировать</button>

</form>";
		# code...
	}
	if (isset($_POST['groups'])) {
		echo "<h1>Группы</h1>";
		$result = mysqli_query($dbc,"SELECT * FROM groups g,teacher t where g.id_teacher_ref=t.id_teacher ORDER BY gname"); //извлекаем из базы все данные 
    	echo "<table border=1px>";
    	echo "<tr><th>Номер</th><th>Название</th><th>Класный руководитель</th><th>Специальность</th></tr>";
    	$f=1;
    	while($row=mysqli_fetch_array($result))
{ echo '<tr><td>'.$f.'</td><td>'.$row[gname].'</td><td>'.$row[surname].'</td><td>'.$row[specialty].'</td></tr>';
$f++;
}
echo "</table><form action='' method='post'>
	<br><button name='new_date_groups'>Добавить</button>
	<button name='del_date_groups'>Удалить</button>
	<button name='re_date_groups'>Редактировать</button>

</form>";
		# code...
	}

?>


<?php
	if (isset($_POST['new_date_teachers'])) {

		?> 
		<form action="addition.php"  method='post' >
 <p class="info"> Логин :<input type='text' name='login' size='20' value=''></p>
 <p class="info"> пароль :<input type='text' name='password' size='20' value=''></p>
 	<p class="info"> Фамилия :<input type='text' name='Sur_Name' size='20' value=''></p>
 	<p class="info"> Имя :<input type='text' name='Name' size='20' value=''></p>
 	<p class="info"> Отчество :<input type='text' name='Patronimicy' size='20' value=''></p>
 	<p class="info"> Должность :<input type='text' name='Position' size='20' value=''></p>
 
 	<p class="info"> Электронная почта :<input type='text' name='mail' size='20' value=''></p>
 	
 	<P>
	<input type='submit' name='add_date_teacher' value="Добавить">
</P>
 </form>
 <?php 
 		
 		
 		
	}	
?>
<?php
	if (isset($_POST['new_date_students'])) {

		?> 
		<form action="addition.php"  method='post' >
 <p class="info"> Логин :<input type='text' name='login' size='20' value=''></p>
 <p class="info"> пароль :<input type='text' name='password' size='20' value=''></p>
 	<p class="info"> Фамилия :<input type='text' name='Sur_Name' size='20' value=''></p>
 	<p class="info"> Имя :<input type='text' name='Name' size='20' value=''></p>
 	<p class="info"> Отчество :<input type='text' name='patronimyc' size='20' value=''></p>
 	<p class="info"> группа :<select name="group">
 					<?php
 						$result2 = mysqli_query($dbc,"SELECT * FROM groups ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_groups].'>'.$row2[gname].'</option>';
 						}
 					?>
 			</select></p>
 	
 	<P>
	<input type='submit' name='add_date_students' value="Добавить">
</P>
 </form>
 <?php  		
	}
		
?>
<?php
	if (isset($_POST['new_date_groups'])) {

		?> 
		<form action="addition.php"  method='post' >
 
 	<p class="info"> Название :<input type='text' name='Name' size='20' value=''></p>
 	<p class="info"> Специальность :<input type='text' name='speciality' size='20' value=''></p>
 	<p class="info"> классный руководитель :<select name="teach">
 					<?php
 						$result2 = mysqli_query($dbc,"SELECT * FROM teacher ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_teacher].'>'.$row2[surname].'</option>';
 						}
 					?>
 			</select></p>
 	<P>	<input type='submit' name='add_date_groups' value="Добавить"></P>
 </form>
 <?php  		
	}
		
?>
<?php
	if (isset($_POST['del_date_groups'])) {

		?> 
		<br>
		<form action="addition.php"  method='post' >
 			<select name='del_groups'>
 			<?php
 						$result2 = mysqli_query($dbc,"SELECT * FROM groups ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_groups].'>'.$row2[gname].' </option>';
 						}
 					?>
 					</select>
 
 		<input type='submit' name='delete_date_groups' value="Удалить">
 </form>
 <?php  		
	}
		
?>
<?php
	if (isset($_POST['del_date_students'])) {

		?> 
		<br>
		<form action="addition.php"  method='post' >
 				<select name='del_students'>
 			<?php
 						$result2 = mysqli_query($dbc,"SELECT * FROM students ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_students].'>'.$row2[surname].'  '.$row2[name].'  '.$row2[patronimic].'</option>';
 						}
 					?>
 					</select>
	<input type='submit' name='delete_date_students' value="Удалить">
</P>
 </form>
 <?php  		
	}
		
?>
<?php
	if (isset($_POST['del_date_teachers'])) {

		?> 
		<br>
		<form action="addition.php"  method='post' >
 			<select name='del_teacher'>
 			<?php
 						$result2 = mysqli_query($dbc,"SELECT * FROM teacher ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_teacher].'>'.$row2[surname].'  '.$row2[name].'  '.$row2[patronimic].'</option>';
 						}
 					?>
 					</select>
	<input type='submit' name='delete_date_teacher' value="Удалить">
</P>
 </form>
 <?php 
 		
 		
 		
	}	
?>





<?php
	if (isset($_POST['re_date_teachers'])) { 
?>
		<br>
		<form action="" name="" method="post">
		<select name="teach">
 					<?php
 						$result2 = mysqli_query($dbc,"SELECT * FROM teacher ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_teacher].'>'.$row2[surname],'  ' , $row2[name] ,'  ' , $row2[patronimic].  '</option>';
 						}
 					?>
 			</select>
 			<button name='redd_date_teacher'>Редактировать</button>
 			</form>

<?php
 	}
 		if (isset($_POST['redd_date_teacher'])) { 
 				$result2 = mysqli_query($dbc,"SELECT * FROM teacher WHERE id_teacher='$_POST[teach]'");	
 						while($row2=mysqli_fetch_array($result2)) {
 				echo "<form action='addition.php'  method='post' >
 				<p style='display:none;'><input type=text name=id_t value='".$row2[id_teacher]."'>
				 <p  class='info'> Логин :<input type='text' name='login' size='20' value='".$row2[login]."'></p>
				 <p class='info'> пароль :<input type='text' name='password' size='20' value='".$row2[password]."'></p>
				 	<p class='info'> Фамилия :<input type='text' name='Sur_Name' size='20' value='".$row2[surname]."'></p>
				 	<p class='info'> Имя :<input type='text' name='Name' size='20' value='".$row2[name]."'></p>
				 	<p class='info'> Отчество :<input type='text' name='Patronimicy' size='20' value='".$row2[patronimic]."'></p>
				 	<p class='info'> Должность :<input type='text' name='Position' size='20' value='".$row2[position]."'></p>
				 
				 	<p class='info'> электронная почта :<input type='text' name='mail' size='20' value='".$row2[mail]."'></p>
				 	
				 	<P>
					<input type='submit' name='re_add_date_teacher' value='Редактировать'>
				</P>";
				}
 		}

?>


<?php
	if (isset($_POST['re_date_students'])) { 
?>
		<br>
		<form action="" name="" method="post">
		<select name="stud">
 					<?php
 						$result2 = mysqli_query($dbc,"SELECT * FROM students ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_students].'>'.$row2[surname],'  ' , $row2[name] ,'  ' , $row2[patronimic].  '</option>';
 						}
 					?>
 			</select>
 			<button name='redd_date_students'>Редактировать</button>
 			</form>

<?php
 	}
 		if (isset($_POST['redd_date_students'])) { 
 				$result2 = mysqli_query($dbc,"SELECT * FROM students WHERE id_students='$_POST[stud]'");	
 						while($row2=mysqli_fetch_array($result2)) {
 				echo "<form action='addition.php'  method='post' >
 				<p style='display:none;'><input type=text name=id_s value='".$row2[id_students]."'>
				 <p class='info'> Логин :<input type='text' name='login' size='20' value='".$row2[login]."'></p>
				 <p class='info'> пароль :<input type='text' name='password' size='20' value='".$row2[password]."'></p>
				 	<p class='info'> Фамилия :<input type='text' name='Sur_Name' size='20' value='".$row2[surname]."'></p>
				 	<p class='info'> Имя :<input type='text' name='Name' size='20' value='".$row2[name]."'></p>
				 	<p class='info'> Отчество :<input type='text' name='Patronimicy' size='20' value='".$row2[patronimic]."'></p>
				 		<p class='info'> группа :<select name='group_s'>";
 					
 						$result2 = mysqli_query($dbc,"SELECT * FROM groups ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_groups].'>'.$row2[gname].'</option>';
 						}
 					echo "</select></p>			 
				 			 	
				 	<P>
					<input type='submit' name='re_add_date_students' value='Редактировать'>
				</P>";
				}
 		}

?>

<?php
	if (isset($_POST['re_date_groups'])) { 
?>
		<br>
		<form action="" name="" method="post">
		<select name="grup">
 					<?php
 						$result2 = mysqli_query($dbc,"SELECT * FROM groups ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_groups].'>'.$row2[gname].  '</option>';
 						}
 					?>
 			</select>
 			<button name='redd_date_groups'>Редактировать</button>
 			</form>

<?php
 	}
 		if (isset($_POST['redd_date_groups'])) { 
 				$result2 = mysqli_query($dbc,"SELECT * FROM groups WHERE id_groups='$_POST[grup]'");	
 						while($row2=mysqli_fetch_array($result2)) {
 				echo "<form action='addition.php'  method='post' >
 					<p style='display:none;'><input type=text name=id_g value='".$row2[id_groups]."'>
				  	<p class='info'> Название :<input type='text' name='Name' size='20' value='".$row2[gname]."'></p>
				 	<p class='info'> Специальность :<input type='text' name='speciality' size='20' value='".$row2[specialty]."'></p>
				 	<p class='info'> Классный руководитель :<select name='klass_room'>";
 					
 						$result2 = mysqli_query($dbc,"SELECT * FROM teacher ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_teacher].'>'.$row2[surname], ' ' ,$row2[name], ' ', $row2[patronimic].'</option>';
 						}
 					echo "</select></p>			 
				 			 	
				 	<P>
					<input type='submit' name='re_add_date_groups' value='Редактировать'>
				</P>";
				}
 		}

?>
