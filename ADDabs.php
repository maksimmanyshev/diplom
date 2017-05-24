<?php
	session_start();
	include 'header.php';
	echo "<form action='' method='post' name='abs'>";
	echo "<a href=index.php>Назад</a>";
	
	$rez1 = mysqli_query($dbc, "SELECT id_students, name, surname FROM students s WHERE s.id_groups_ref='$_SESSION[grp]' ");
	while ($arr=mysqli_fetch_assoc($rez1)) { 
		$students[]=$arr; 
		$q++;
		
	}
		
		echo "<p>День <input type='text' size=3 name='day'>
				<select name='mount'>
		<option value='1'>Январь</option>
		<option value='2'>Февраль</option>
		<option value='3'>Март</option>
		<option value='4'>Апрель</option>
		<option value='5'>Май</option>
		<option value='6'>Июнь</option>
		<option value='7'>Июнь</option>
		<option value='8'>Август</option>
		<option value='9'>Сентябрь</option>
		<option value='10'>Октябрь</option>
		<option value='11'>Ноябрь</option>
		<option value='12'>Декабрь</option>

	</select>

	 Год:<input type='text' size=5 name='year'></p>";
		echo "<table border='1' > <tr> <th>№</th><th>Фамилия Имя</th> ";
		$z=0;

		foreach ($students as $student) {
			$w = $student['id_students'];
 echo "<tr><td>".$student['id_students']."</td>";
 echo "<td><i>".$student['surname']." ".$student['name']."</i></td>";
 echo "<td><select name='abss[]'>
 		<option value=0>0</option>
 		<option value=6>6</option>
 		<option value=4>4</option>
 		<option value=2>2</option>
 		</select></td>";

 		$z++;
	}
	
	
	echo "</table> ";
	echo "<input type='submit' name='add_abs' value='Добавить'>";
	
echo "</form>";


	if (isset($_POST[add_abs])) {
		
		if (empty($_POST[day])) {
			echo "Введите день"; 
			echo "<br>";
		}

		else if ($_POST[mount]==2) {
			if ($_POST[day]>29) {
				echo "Не верная дата";
			}
			else if ((!empty($_POST[day]))&&(!empty($_POST[year]))) {
			
			$result2 = mysqli_query($dbc,"SELECT * FROM absence a where id_students_ref='$w'");	
 						while($row2=mysqli_fetch_array($result2)) {
 							if (($_POST[day]==$row2[day])&&($_POST[year]==$row2[year])) {
 								echo "Такая дата уже есть";
 								include 'foother.php';
 								exit();
 							}
 						}
 						for ($i=0; $i < $q; $i++) { 
			
			$a = $_POST[abss][$i];
			
			mysqli_query ($dbc,"INSERT INTO absence (id_students_ref,day,mount,year,cause) VALUES ('".$w[$i]."','".$_POST[day]."','".$_POST[mount]."','".$_POST[year]."','".$a."')");
			
		}
		echo "Данные успешно добавлены";
		}

		}
		else if (($_POST[day]>31)or($_POST[day]<1)) {
			echo "Не корректная дата";
		}
		else if (empty($_POST[year])) {
			
			echo "Введите год";
		}
		else if ((!empty($_POST[day]))&&(!empty($_POST[year]))) {
			
			$result2 = mysqli_query($dbc,"SELECT id_students_ref,day,mount,year,cause FROM absence a where id_students_ref='$w'");	
 						while($row2=mysqli_fetch_array($result2)) {
 							if (($_POST['day']==$row2['day'])&&($_POST['year']==$row2['year'])) {
 								echo "Такая дата уже есть";
 								include 'foother.php';
 								exit();
 							}
 						}
 						for ($i=0; $i < $q; $i++) { 
			
			$a = $_POST[abss][$i];
			
			mysqli_query ($dbc,"INSERT INTO absence (id_students_ref,day,mount,year,cause) VALUES ('".$w[$i]."','".$_POST[day]."','".$_POST[mount]."','".$_POST[year]."','".$a."')");
			
		}
		echo "Данные успешно добавлены";
		}
		
		
	}

		include 'foother.php';
?>