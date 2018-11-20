<html>
<head>
<meta charset="UTF-8">
<script src="script.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="strona.css">
<title>E-PLUS Nauczyciel</title>
</head>
<body>



<div id="baner">
<a href="index.php"><img src="plus.png" id="logo"></img></a>




</div>
<div id="tlo">
<div id="grupa">
<h1>Wybierz grupę</h1>
<button id="buttondodaj"onclick="pokaz()">Dodaj ucznia</button>
<button id="buttonhaslo"onclick="pokaz2()">Zmien Haslo</button>

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
				
				if($_SESSION['sesja_logowanie']['rodzaj']=="nauczyciel")
				{

				}
				else
				{
				header('Location:uczen.php');
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

$pokaz=$polaczenie->prepare('SELECT * from klasa group by nazwa_klasy');
$pokaz->execute();
echo '<form  method="POST" action="nauczyciel.php">';

echo '<select name="klasa">';

foreach($pokaz as $row)
{
	echo '<option value="'.$row['nazwa_klasy'].'">'.$row['nazwa_klasy'].'</option>';
}
echo '</select>';
$pokaz=$polaczenie->prepare('SELECT * from klasa group by przedmiot');
$pokaz->execute();
echo '<select name="przedmiot">';

foreach($pokaz as $row)
{
	echo '<option value="'.$row['przedmiot'].'">'.$row['przedmiot'].'</option>';
	
}
echo '</select>';

echo '<input type="submit" value="Pokaz klasę"></input>';
echo '</form>';



if(isset($_POST['klasa']) && isset($_POST['przedmiot']))
{
	$zapytanie = "select imie, nazwisko, klasa.id_klasy, klasa.nazwa_klasy, sum(punkt.ilosc), max(punkt.kiedy) from uzytkownik inner join klasa on klasa.id_klasy=uzytkownik.id_klasy left join punkt on punkt.id_uzytkownika=uzytkownik.id_uzytkownika where nazwa_klasy=\"".$_POST['klasa']."\" and przedmiot=\"".$_POST['przedmiot']."\" group by uzytkownik.id_uzytkownika order by nazwisko asc";
	
	$pokaz=$polaczenie->prepare($zapytanie);
	$pokaz->execute();
	$i=0;
	echo '<div id="klasapol">';
	echo '<div id="klasapol">';
	echo $_POST['klasa']. ' ';
	echo $_POST['przedmiot'];
	echo '</div>';
	
	echo '<table id="nauczyciel"><tr><td id="td">LP.</td><td id="td">Imie</td><td id="td">Nazwisko</td><td id="td">Ilość plusów</td><td id="td">ocena</td><td id="td">Kiedy</td></tr>';
	foreach ($pokaz as $row)
	
	{
	$siema=$row['sum(punkt.ilosc)'];
		$i++;
		$siema = (empty($siema)) ? "0" : $siema;
		echo '<br><tr><td id="td">'.$i.'</td>'.' <td id="td">'. $row['imie'].'</td> <td id="td">'.$row['nazwisko'].'</td> <td id="td">'.$siema.'</td>';
		if($siema>6)
		{
			echo '<td id="td">6</td>';
		}else if($siema>=5)
		{
			echo '<td id="td">5</td>';
		}
		else if($siema==4)
		{
			echo '<td id="td">4</td>';
		}
		else if($siema==3)
			{
			echo '<td id="td">3</td>';
		}
		else if($siema==2)
			{
			echo '<td id="td">2</td>';
		}
		else if($siema<=1)
			{
			echo '<td id="td">1</td>';
		}
		else if(empty($siema))
		{
			echo '<td id="td">1</td>';
		}
			echo '<td id="td">';
			
			
			if($row['max(punkt.kiedy)']==date("Y-m-d"))
			{
				echo '<a class="dymek"><b><font color="red">'.$row['max(punkt.kiedy)'].'</font></b><span> Ocena została dodana dzisiaj! </span> </a>';
			}
			else
			{
				echo $row['max(punkt.kiedy)'];
			}
			
			
			'</td></tr>';
			
	}
	echo '</table>';
	

}
echo '<div id="witaj">';
echo '<div id="witajfont">Witaj!  '.$_SESSION['sesja_logowanie']['imie'].' ';
echo $_SESSION['sesja_logowanie']['nazwisko'].'<br></div>';
echo '<img id="nauczycielobraz" src="nauczyciel.png"></img>';
echo '<div id="wylogujsie">Zalogowany jako <b>'.$_SESSION['sesja_logowanie']['rodzaj'].'</b>';
echo '<br><a href="nauczyciel.php?wyloguj=1"><button>Wyloguj</button></a></div>';
echo '</div>';
?>


</div>
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



<div id="dodajukryj">

<?php
	
		if(isset($_POST['login'])&&isset($_POST['haslo']))
		{
			
				
					$zapytanie_rejestracja=$polaczenie->prepare('SELECT * FROM uzytkownik WHERE login="'.$_POST['login'].'"');
					$zapytanie_rejestracja->execute();
					$ile_emailow=$zapytanie_rejestracja->rowCount();
					if($ile_emailow==0)
					{
						$dodanie_uzytkownika=$polaczenie->prepare('INSERT INTO uzytkownik (rodzaj, login, haslo, imie, nazwisko, id_klasy) VALUES ("uczen","'.$_POST['login'].'","'.sha1($_POST['haslo']).'","'.$_POST['imie'].'","'.$_POST['nazwisko'].'","'.$_POST['id'].'")');
						$dodanie_uzytkownika->execute();
						echo '
						  <script type="text/javascript">
						  alert("Zarejestrowano pomyślnie");
						  </script>
					';
					}
					else
					{
						echo '
						  <script type="text/javascript">
						  alert("Podany login jest już zajęty");
						  </script>
					';
					}
				
		}
				$klasa=$polaczenie->prepare('SELECT * FROM klasa order by nazwa_klasy asc');
				$klasa->execute();
				echo '<table id="dodaj">';
				echo '<form method="POST" action="nauczyciel.php"><br>';
				echo'<tr><td>Podaj login:</td><td><input placeholder="LOGIN" type="text" name="login" required></input></td></tr><br>';
				echo'<tr><td>Podaj Haslo</td><td><input placeholder="haslo" type="password" name="haslo" required></input></td></tr><br>';
				echo'<tr><td>Podaj klasę</td><td><select name="id" required>';
				foreach($klasa as $row){
					echo'<option value="'.$row['id_klasy'].'">'.$row['nazwa_klasy'].' '.$row['przedmiot'].'</option>';
				}
				echo '</select></td></tr><br>';
				echo'<tr><td>Podaj Imię </td><td><input placeholder="imie" type="text" name="imie" required></input></td></tr><br>';
				echo'<tr><td>Podaj Nazwisko </td><td><input placeholder="nazwisko" type="text" name="nazwisko" required></input></td></tr><br>';
				echo '<tr><td><input type="submit" Value="Dodaj ucznia"></input></td></tr>';
				echo '</form>';
				echo '</table>';
		
?>





</div>
</div>


</body>
</html>