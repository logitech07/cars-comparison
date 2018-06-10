<?php include("config.php");
$nick = $_SESSION['nick'];
$haslo = $_SESSION['haslo'];
    if ((empty($nick)) AND (empty($haslo))) {
header("Location: index.php"); 
exit;
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM uzytkownicy WHERE `nick`='$nick' AND `haslo`='$haslo' LIMIT 1"));
    if (empty($user[id]) OR !isset($user[id])) {
echo '<br>Nieprawidłowe logowanie.<br>';
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
		<title>System porównawczy dealerów aut - Krystian Terejko</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
		<!--//webfonts-->
</head>
<body>

	<div class="main">
		<div class="header" >
			<h1>System porównawczy dealerów aut</h1>
		</div>
		<p>Witaj ponownie <font color="green"><?php echo ''.$user[nick].'';?></font><br/>Poniżej znajdziesz listę samochodów, które możesz obecnie porównać.<br/>
		<center>

	
	<br/><br/>
	
	
	
	<?php 

/* zapytanie do bazy i tabeli auta i uzytkownicy*/ 
$carid = mysql_query("SELECT wybrane_auto FROM uzytkownicy WHERE nick='$user[nick]'");
$carid = mysql_fetch_row($carid);
$wynik = mysql_query("SELECT * FROM auta WHERE id='$carid[0]'")
or die('Błąd zapytania'); 

/* 
wyswietlamy wyniki w formie tabelki, jezeli wynik jest wiekszy od zera
*/ 
if(mysql_num_rows($wynik) > 0) { 
    /* jezeli jest, wyswietlamy dane */ 
    echo "<table cellpadding=\"100\" cellspacing=\"100\" border=1>"; 
    while($r = mysql_fetch_assoc($wynik)) { 
        echo "<tr>"; 		
		echo "<th><b>Marka</b></th>";
		echo "<th><b>Model</b></th>";
		echo "<th><b>Rok</b></th>";
		echo "<th><b>Silnik</b></th>";
		echo "<th><b>Nadwozie</b></th>";
		echo "<th><b>Waga</b></th>";
		echo "<th><b>Wysokość</b></th>";
		echo "<th><b>Szerokość</b></th>";
		echo "<th><b>Długość</b></th>";
		echo "<th><b>Napęd</b></th>";
		echo "<th><b>Średnie spalanie</b></th>";
		echo "<th><b>Spalanie miasto</b></th>";
		echo "<th><b>Spalanie trasa</b></th>";
		echo "<th><b>Cena</b></th>";
		
        echo "</tr>"; 
        echo "<tr>"; 
        echo "<td>".$r['marka']."</td>"; 
        echo "<td>".$r['model']."</td>"; 		
        echo "<td>".$r['rokprodukcji']."</td>"; 	
        echo "<td>".$r['silnik']."</td>"; 					
        echo "<td>".$r['nadwozie']."</td>"; 					
        echo "<td>".$r['waga']."</td>"; 					
        echo "<td>".$r['wysokosc']."</td>"; 					
        echo "<td>".$r['szerokosc']."</td>"; 					
        echo "<td>".$r['dlugosc']."</td>"; 					
        echo "<td>".$r['naped']."</td>"; 					
        echo "<td>".$r['spalanie_srednie']."</td>"; 					
        echo "<td>".$r['spalanie_miasto']."</td>"; 					
        echo "<td>".$r['spalanie_trasa']."</td>"; 					
        echo "<td>".$r['cena']."</td>"; 					
		
		
        echo "</tr>"; 		
    } 
    echo "</table>"; 
	

} 

?>

	<?php 

/* zapytanie do konkretnej tabeli */ 
$carid = mysql_query("SELECT wybrane_auto2 FROM uzytkownicy WHERE nick='$user[nick]'");
$carid = mysql_fetch_row($carid);
$wynik = mysql_query("SELECT * FROM auta WHERE id='$carid[0]'")
or die('Błąd zapytania'); 

/* 
wyświetlamy wyniki, sprawdzamy, 
czy zapytanie zwróciło wartość większą od 0 
*/ 
if(mysql_num_rows($wynik) > 0) { 
    /* jeżeli wynik jest pozytywny, to wyświetlamy dane */ 
    echo "<table cellpadding=\"100\" cellspacing=\"100\" border=1>"; 
    while($r = mysql_fetch_assoc($wynik)) { 
        echo "<tr>"; 		
		echo "<th><b>Marka</b></th>";
		echo "<th><b>Model</b></th>";
		echo "<th><b>Rok</b></th>";
		echo "<th><b>Silnik</b></th>";
		echo "<th><b>Nadwozie</b></th>";
		echo "<th><b>Waga</b></th>";
		echo "<th><b>Wysokość</b></th>";
		echo "<th><b>Szerokość</b></th>";
		echo "<th><b>Długość</b></th>";
		echo "<th><b>Napęd</b></th>";
		echo "<th><b>Średnie spalanie</b></th>";
		echo "<th><b>Spalanie miasto</b></th>";
		echo "<th><b>Spalanie trasa</b></th>";
		echo "<th><b>Cena</b></th>";
		
        echo "</tr>"; 
        echo "<tr>"; 
        echo "<td>".$r['marka']."</td>"; 
        echo "<td>".$r['model']."</td>"; 		
        echo "<td>".$r['rokprodukcji']."</td>"; 	
        echo "<td>".$r['silnik']."</td>"; 					
        echo "<td>".$r['nadwozie']."</td>"; 					
        echo "<td>".$r['waga']."</td>"; 					
        echo "<td>".$r['wysokosc']."</td>"; 					
        echo "<td>".$r['szerokosc']."</td>"; 					
        echo "<td>".$r['dlugosc']."</td>"; 					
        echo "<td>".$r['naped']."</td>"; 					
        echo "<td>".$r['spalanie_srednie']."</td>"; 					
        echo "<td>".$r['spalanie_miasto']."</td>"; 					
        echo "<td>".$r['spalanie_trasa']."</td>"; 					
        echo "<td>".$r['cena']."</td>"; 					
		
		
        echo "</tr>"; 		
    } 
    echo "</table>"; 
	

} 

?>
	<p>
	<a href="system.php"><b><font color="black">>> Porównaj inne samochody <<</font></b></a>
	</p>
</center>
		

		<p>Chcesz się wylogować? <a href="wyloguj.php"><font color="red">Kliknij tutaj</font></a></font></p>

		</div>

	
</body>
</html>