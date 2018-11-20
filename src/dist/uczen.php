<html>
<head>
<meta charset="UTF-8">
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=iso-8859-2">
<script src="script.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="strona.css">
<title>E-PLUS Uczen</title>
</head>
<body>
<div id="baner">
<a href="uczen.php"><img src="plus.png" id="logo"></img></a>




</div>


<div id="tlo">
<div id="dodajukryj2">
<?php
	echo'<form method="POST" action="nauczyciel.php">
				<table id="dodaj"><tr><td>Podaj swój nick</td><td><input type="text" name="zmienlogin" placeholder="Podaj login konta"></input></td></tr><br>
				
				<tr><td>Podaj swoje nowe hasło</td><td><input type="password" name="zmienhaslo" Placeholder="Nowe haslo"></input></td></tr>
				<tr><td></td><td><input type="submit"></submit></td></tr></table>
		</form>';
		if(isset($_POST['zmienlogin'])&&isset($_POST['zmienhaslo']))
		{
			$pokaz=$polaczenie->prepare('update uzytkownik set haslo="'.sha1($_POST['zmienhaslo']).'" where login="'.$_POST['zmienlogin'].'"');
			$pokaz->execute();
		}
?>
</div>
<button id="buttonhaslo"onclick="pokaz2()">Zmień Haslo</button>

<?php
SESSION_START();
$polaczenie=new PDO('mysql:host=localhost;dbname=uczniowie;port=3306','root','');
$polaczenie->query('SET NAMES UTF8');
$polaczenie->query('SET CHARACTER_SET utf8_polish_ci');


if(isset($_SESSION['sesja_logowanie']))
		{
			$login=$_SESSION['sesja_logowanie']['login'];
			$haslo=$_SESSION['sesja_logowanie']['haslo'];
			$pokaz=$polaczenie->prepare('select * from uzytkownik where login="'.$login.'" and haslo="'.$haslo.'"');
			$pokaz->execute();
			$zapytanie_liczba_wynikow = $pokaz->rowCount();
			
			if($zapytanie_liczba_wynikow==1)
			{
				
				if($_SESSION['sesja_logowanie']['rodzaj']=="uczen")
				{

				}
				else
				{
				header('Location:nauczyciel.php');
				}
			}
			
		}
		else
		{
			header('Location:index.php');
		}
		
		if(isset($_GET['wyloguj']))
			{
				session_unset();
				session_destroy();
				header('Location:index.php');
			}
			
		
		
?>
	<center><h1>Witaj na swoim koncie <?php echo $_SESSION['sesja_logowanie']['imie']?><br>
	<h2>Oto Twoje plusy:</h2></center>


<?php

	$zapytanie = "select imie, nazwisko, przedmiot, klasa.id_klasy, klasa.nazwa_klasy, sum(punkt.ilosc), max(punkt.kiedy) from uzytkownik inner join klasa on klasa.id_klasy=uzytkownik.id_klasy inner join punkt on punkt.id_uzytkownika=uzytkownik.id_uzytkownika where imie=\"".$_SESSION['sesja_logowanie']['imie']."\" and nazwisko=\"".$_SESSION['sesja_logowanie']['nazwisko']."\" ";
	
	$pokaz=$polaczenie->prepare($zapytanie);
	$pokaz->execute();
	
	
		echo '<table id="nauczyciel"><tr><td id="td">Imie</td><td id="td">Nazwisko</td><td id="td">Przedmiot</td><td id="td">Ilość plusów</td><td id="td">Proponowana ocena</td><td id="td">Kiedy</td></tr>';
	
	foreach($pokaz as $row)
	{
	
	$siema=$row['sum(punkt.ilosc)'];
		
		echo '<br><tr>'.' <td id="td">'. $_SESSION['sesja_logowanie']['imie'].'</td> <td id="td">'.$_SESSION['sesja_logowanie']['nazwisko'].'<td id="td">'.$row['przedmiot'].'</td></td> <td id="td">'.$siema.'</td>';
		
		
		if($siema>6)
		{
			echo '<td id="td">6-Celujący</td>';
		}else if($siema>=5)
		{
			echo '<td id="td">5-Bardzo Dobry</td>';
		}
		else if($siema==4)
		{
			echo '<td id="td">4-Dobry</td>';
		}
		else if($siema==3)
			{
			echo '<td id="td">3-Dopuszczający</td>';
		}
		else if($siema==2)
			{
			echo '<td id="td">2-Dostateczny</td>';
		}
		else if($siema<=1)
			{
			echo '<td id="td">1-Niedostateczny</td>';
		}
		
		else 
			{
				echo '<td id="td"><center>-</center></td>';
			}
		
			echo '<td id="td">';
			
			
			
			if($row['max(punkt.kiedy)']==date("Y-m-d"))
			{
				echo '<a class="dymek"><b><font color="red">'.$row['max(punkt.kiedy)'].'</font></b><span> Ostatni plus został dodany dzisiaj! </span> </a>';
			}
			else if($row['max(punkt.kiedy)']==0)
			{
				echo '<center>-</center>';
			}
			else
			{
				echo $row['max(punkt.kiedy)'];
			}
			
			
			'</td></tr></table>';
			
			
	}

	
	

echo '<div id="witaj">';
echo '<div id="witajfont">Witaj!  '.$_SESSION['sesja_logowanie']['imie'].' ';
echo $_SESSION['sesja_logowanie']['nazwisko'].'<br></div>';
echo '<img id="nauczycielobraz" src="uczen.png"></img>';
echo '<div id="wylogujsie">Zalogowany jako <b>'.$_SESSION['sesja_logowanie']['rodzaj'].'</b><br>';
echo 'Uczeń klasy '.$row['nazwa_klasy'];
echo '<br><a href="nauczyciel.php?wyloguj=1"><button>Wyloguj</button></a></div>';
echo '</div>';
?>



</div>


</body>
</html>