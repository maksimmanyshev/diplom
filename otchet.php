<?php

	include 'header.php';
?>

	<form action="" method="post">

		<button style="height: 50px; padding: auto;" name="one_mnt"> Месяц </button>
		<button style="height: 50px; padding: auto;" name="two_mnt"> Выборочно по месцам </button>
		<button style="height: 50px; padding: auto;" name="one_year"> Год </button>

	</form>

<?php
		if (isset($_POST[one_mnt])) {
			echo "<form  action=''method='post' name='gr'>
	Выберите группу : <select name='group'>";
 					
 						$result2 = mysqli_query($dbc,"SELECT * FROM groups ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_groups].'>'.$row2[gname].'</option>';
 						}
 					
 			echo "</select>";

				echo "
	Выберите месяц : <select name='mount'>
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

 						
 			 </select>
 			 Введите год : <input type='text' size=5 name='year'>
 			<button name='vis_jr'>Показать</button></form>";



 				





		}

		if (isset($_POST[two_mnt])) {
			echo "string1";


			}








		if (isset($_POST[one_year])) {
				echo "<form  action=''method='post' name='gr'>
	Выберите группу : <select name='group'>";
 					
 						$result2 = mysqli_query($dbc,"SELECT * FROM groups ");	
 						while($row2=mysqli_fetch_array($result2)) {
 							echo '<option value='.$row2[id_groups].'>'.$row2[gname].'</option>';
 						}
 					
 			echo "</select>";
				echo "Введите год : <input type='text' size=5 name='year'>
 			<button name='vis_jr2'>Показать</button></form>";			
		}



		if (isset($_POST[vis_jr2]))  {

					if (empty($_POST[year])) {
			echo "Введите год";
		}	

		}










		if (isset($_POST[vis_jr]))  {
		if (empty($_POST[year])) {
			echo "Введите год";
		}
		else {

		$ada=$_POST[group];
		$mnt=$_POST[mount];
		$yar=$_POST[year];
		$_SESSION[grp]=$ada;	


		switch ($mnt) {
			case '1':
				$mnt2='январь';
				break;
			case '2':
				$mnt2='февраль';
				break;
			case '3':
				$mnt2='март';
				break;
			case '4':
				$mnt2='апрель';
				break;
			case '5':
				$mnt2='май';
				break;
			case '6':
				$mnt2='июнь';
				break;
			case '7':
				$mnt2='июль';
				break;
			case '8':
				$mnt2='август';
				break;
			case '9':
				$mnt2='сентябрь';
				break;
			case '10':
				$mnt2='октябрь';
				break;
			case '11':
				$mnt2='ноябрь';
				break;
			case '12':
				$mnt2='декабрь';
				break;
			
			default:
				# code...
				break;
		}






	$rez1 = mysqli_query($dbc, "SELECT id_students, name, surname,id_groups_ref FROM students s WHERE id_groups_ref='$ada' ");
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
		$rez5 = mysqli_query($dbc, "SELECT gname FROM groups WHERE id_groups='$ada'");
		while ($row1 = mysqli_fetch_array($rez5))
		echo "<H1>Пропуски занятий студентами группы  ".$row1[gname]." за ".$mnt2. "  ".$yar." года    </h1>";
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



	echo "<form action='' name='' method='post'> 
<button name='otchet' OnClick='window.print()'>Печать</button>
			</form>";
			}
			else {echo "ЗАнятий нет";
		

}
		}

	else {
	echo "Студенты не добавлены в базу данных. Обратитесь к администратору";
	}
}	
}

?>









<?php




	include 'foother.php';
?>