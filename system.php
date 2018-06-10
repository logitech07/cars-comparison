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
		<p>Witaj ponownie <font color="green"><?php echo ''.$user[nick].'';?></font><br/>Poniżej znajdziesz listę samochodów, które możesz obecnie sprzedać.<br/>
			<a href="auta.php"><b><font color="black">>> Zobacz ostatnio porównywane auta <<</font></b></a></br></p>
		
		<?php 

/* zapytanie do bazy i tabeli auta */ 
$wynik = mysql_query("SELECT * FROM auta") 
or die('Błąd zapytania'); 

/* 
wyswietlamy wyniki w formie tabelki, jezeli wynik jest wiekszy od zera
*/ 
if(mysql_num_rows($wynik) > 0) { 
    /* jeżeli jest, wyswietlamy dane */ 
    echo "<table cellpadding=\"100\" cellspacing=\"100\" border=1>"; 
    while($r = mysql_fetch_assoc($wynik)) { 
        echo "<tr>"; 		
		echo "<th><b>Zdjęcie</b></th>";
		echo "<th><b>Marka</b></th>";
		echo "<th><b>Model</b></th>";
		echo "<th><b>Silnik</b></th>";
		
        echo "</tr>"; 
        echo "<tr>"; 
        echo "<td><img width=\"326\" src=\"".$r['zdjecie_url']."\"></td>"; 		
        echo "<td>".$r['marka']."</td>"; 
        echo "<td>".$r['model']."</td>"; 		
        echo "<td>".$r['silnik']."</td>"; 					
        echo "<td><a href=\"dodajauto.php?carid=".$r['id']."\">Dodaj jako 1 auto</a></td>"; 			
        echo "<td><a href=\"dodajauto2.php?carid=".$r['id']."\">Dodaj jako 2 auto</a></td>"; 				
		
        echo "</tr>"; 
    } 
    echo "</table>"; 
} 

?>

		<p>Chcesz się wylogować? <a href="wyloguj.php"><font color="red">Kliknij tutaj</font></a></font></p>

		</div>

	
</body>
</html>