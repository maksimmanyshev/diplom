<?php
session_start();

echo "<form  action=''method='post' name='gr'>";

				echo "
	<p>Выберите месяц : <select name='mount'>
 						<option value='1'>Январь</option>
 						<option value='2'>Февраль</option>
 						<option value='3'>Март</option>
 						<option value='4'>Апрель</option>
 						<option value='5'>Май</option>
 						<option value='6'>Июнь</option>
 						<option value='7'>Июль</option>
 						<option value='8'>Август</option>
 						<option value='9'>Сентябрь</option>
 						<option value='10'>Октябрь</option>
 						<option value='11'>Ноябрь</option>
 						<option value='12'>Декабрь</option>

 						
 			 </select></p>
 			 <p> Введите год : <input type='text' size=5 name='year'></p>
 			<input type='submit' name='visible_journal' value='Показать'></form>";
		
	if (isset($_POST[visible_journal]))  {
		if (empty($_POST[year])) {
			echo "Введите год";
		}
		else {
		$ada=$_SESSION[grupp];
		$mnt=$_POST[mount];
		$yar=$_POST[year];
		$_SESSION[grp]=$ada;	
	$rez1 = mysqli_query($dbc, "SELECT id_students, name, surname,id_groups_ref FROM students s WHERE id_groups_ref='$ada' AND id_students='$_SESSION[id]' ");
	$rez2 = mysqli_query($dbc, "SELECT id_students, name, surname,id_groups_ref FROM students s WHERE id_groups_ref='$ada' ");

	if (mysqli_fetch_assoc($rez2)<>0) {
		while ($arr=mysqli_fetch_assoc($rez1)) { 
		$students[]=$arr; 
		$sas=$arr[id_students];

	}
	
	$rez3 = mysqli_query($dbc, "SELECT * FROM absence WHERE mount='$mnt' AND year='$yar' AND id_students_ref='$sas'  order by day ASC");
	$rez4 = mysqli_query($dbc, "SELECT * FROM absence WHERE mount='$mnt' AND year='$yar' AND id_students_ref='$sas'  order by day ASC");
	if (mysqli_fetch_assoc($rez4)<>0) {
		while ($arr2=mysqli_fetch_assoc($rez3)) {
		$absences[]=$arr2;
		# code...
	}

		
		echo "<table border='1' > <tr> <th>№</th><th>Фамилия Имя</th> ";
		foreach ($absences as $absence)
echo "<th>".($absence['day'])."</th>";
echo "</tr>";

		foreach ($students as $student) {
 echo "<tr><td>".$student['id_students']."</td>";
 echo "<td><i>".$student['surname']." ".$student['name']."</i></td>";
						 			foreach ($absences as $absence) {
						$st=$student[id_students];
						$l=$absence[day];
						$td="&nbsp;"; //Предположим, что очередная ячейка пустая...
						$result=mysqli_query($dbc, "SELECT * FROM absence a WHERE id_students_ref='$st' AND day='$l' AND mount='$mnt'");
						//Если в таблице absence есть запись о пропуске -- поменяем значение $td
							while ($roww = mysqli_fetch_array($result)) {

								$td=$roww['cause'];
							}
							
						
						
						//И, наконец, выведем, что у нас накопилось в $td
						echo "<td align='center'>$td</td>";
						$summ=$summ + $td;
						}
						echo "<td>ИТОГО: $summ </td>";	
						echo "</tr>";
						$summ = 0;
		}
	
	
	echo "</table> ";


echo "<form  action='addfilee.php'method='post' name='addfilee'>
	<input type='submit' name='dobavlenie' value='Добавить документ о пропуске'></form>";
			}
			else {echo "ЗАнятий нет";
		echo "<form  action='addfilee.php'method='post' name='addfilee'>
	<input type='submit' name='dobavlenie' value='Добавить документ о пропуске'></form>";}
		}

	else {
	echo "Студенты не добавлены в базу данных. Обратитесь к администратору";
	}
}	
}

?>