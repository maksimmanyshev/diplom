<?php
	session_start();
	include 'header.php';


	echo "<form action='' name='add'> 
			<p>День <input type='text' size=3 name='day'>
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

	 Год:<input type='text' size=5 name='year'></p>
	 <input type='file' name='filename'>
	 <p><input type='submit' value='Загрузить'></p>
	 ";

	 if (is_uploaded_file($_FILES[filename])) {

	 	move_uploaded_file($_FILES[filename], "files/".$_FILES[filename]);
	 }
		



	include 'foother.php';
?>