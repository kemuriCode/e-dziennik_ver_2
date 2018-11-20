<html>
<head>
<meta charset="UTF-8">
<script src="script.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="strona.css">
<title>LOGOWANIE</title>
</head>
<body>
<div id="calosc">

	<div id="zaloguj">
		<center><h1>Witaj w panelu logowania do e-dziennika</h1></center><br>
		<center><h2>Podaj dane dostępowe do swojego konta</h2></center>
			<form  method="POST" action="index.php">
					<table>
					<tr style="color:white"><td>Podaj swój login </td><td><input type="text" placeholder="podaj nick" style="font-size:25" name="login" ></input></td></tr><br>
					
					<tr style="color:white"> <td>Podaj swoje hasło</td><td><input type="password" placeholder="podaj haslo"  style="font-size:25" name="haslo" ></input></td></tr><br>
					<tr style="color:white"><td>Wybierz typ konta </td><td><select style="font-size:25" name="typ">
						  <option value="uczen">uczen</option>
						  <option value="nauczyciel">nauczyciel</option>
					</select>
					<input type="submit" style="font-size:23" value="zaloguj się"></input></td></tr>
			
					</table>
			</form>
	</div>

	<?php
	
	SESSION_START();
	$poloczenie=new PDO('mysql:host=localhost;dbname=uczniowie; port=3306','root','');
	$poloczenie->query('SET NAMES UTF8');
	$poloczenie->query('SET CHATACTER_SET utf_polish_ci');
		if(isset($_SESSION['sesja_logowanie']))
		{
			$login=$_SESSION['sesja_logowanie']['login'];
			$haslo=$_SESSION['sesja_logowanie']['haslo'];
			$pokaz=$poloczenie->prepare('select * from uzytkownik where login="'.$login.'" and haslo="'.$haslo.'"');
			$pokaz->execute();
			$zapytanie_liczba_wynikow=$pokaz->rowCount();
			
			if($zapytanie_liczba_wynikow==1)
			{

				if($_SESSION['sesja_logowanie']['typ']=="nauczyciel")
				header('Location:nauczyciel.php');
				else
				header('Location:uczen.php');
			}
			
		}
	
	?>






<?php

	
	
	
	
	
	if(isset($_POST['login']) && isset($_POST['haslo']) && isset($_POST['typ']))
	{
	$pokaz=$poloczenie->prepare('select * from uzytkownik where login="'.$_POST['login'].'" && haslo=sha1("'.$_POST['haslo'].'") && rodzaj="'.$_POST['typ'].'"');
	$pokaz->execute();
	
	
			$login=$_POST['login'];
			$haslo=$_POST['haslo'];
			
			
			$zapytanie_liczba_wynikow=$pokaz->rowCount();
			
			if($zapytanie_liczba_wynikow==1 && $_POST['typ']=="nauczyciel")
			{

				$wynik=$pokaz->fetch(PDO::FETCH_ASSOC);
				$_SESSION['sesja_logowanie']=$wynik;
				header('Location:nauczyciel.php');
			}
			else 
			if($zapytanie_liczba_wynikow==1 && $_POST['typ']=="uczen")
			{

				$wynik=$pokaz->fetch(PDO::FETCH_ASSOC);
				$_SESSION['sesja_logowanie']=$wynik;
				header('Location:uczen.php');
			}			
			else
			{
				echo '<script type="text/javascript">
					alert("Wprowadzono niepoprawny login lub/i hasło lub/i typ konta...");
				
					</script>';
			}
	
	}
	
		
	

?> 
	

</div>


</body>
</html>