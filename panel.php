<?php include("config.php");
$nick = $_SESSION['nick'];
$haslo = $_SESSION['haslo'];
    if ((empty($nick)) AND (empty($haslo))) {
header("Location: index.php"); 
exit;
}
$user = mysql_fetch_array(mysql_query("SELECT * FROM administratorzy WHERE `nick`='$nick' AND `haslo`='$haslo' LIMIT 1"));
    if (empty($user[id]) OR !isset($user[id])) {
echo '<br>Nieprawidłowe logowanie.<br>';
exit;
}
?>

<!DOCTYPE html>
<html>
<head>
		<title>Panel administracyjny - System porównawczy dealerów aut - Krystian Terejko</title>
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
			<h1>Admin - System porównawczy dealerów aut</h1>
		</div>
		<p>Dobrze Cie widzieć <font color="green"><?php echo ''.$user[nick].'';?></font>!<br/>Poniżej możesz dodać nowe auto do systemu.<br/>
<center>					
<form action="panel.php" method="post"> 
Marka<br />
<input type="text" name="marka" required /><br /> 
Model<br />
<input type="text" name="model" required /><br /> 
URL zdjęcia<br />
<input type="text" name="url" required /><br /> 
Rok produkcji<br />
<input type="text" name="rok" required /><br /> 
Silnik<br />
<input type="text" name="silnik" required /><br /> 
Nadwozie<br />
<input type="text" name="nadwozie" required /><br /> 
Waga<br />
<input type="text" name="waga" required /><br /> 
Wysokość<br />
<input type="text" name="wysokosc" required /><br /> 
Szerokość<br />
<input type="text" name="szerokosc" required /><br /> 
Długość<br />
<input type="text" name="dlugosc" required /><br /> 
Napęd<br />
<input type="text" name="naped" required /><br /> 
Spalanie średnie<br />
<input type="text" name="srednie" required /><br /> 
Spalanie w mieście<br />
<input type="text" name="miasto"required  /><br /> 
Spalanie w trasie<br />
<input type="text" name="trasa" required /><br /> 
Cena<br />
<input type="text" name="cena" required /><br /> 

<input type="submit" value="dodaj" /> 
</form>

<?php 
// odbieramy dane z formularza 
$marka = $_POST['marka']; 
$model = $_POST['model']; 
$url = $_POST['url']; 
$rok = $_POST['rok']; 
$silnik = $_POST['silnik']; 
$nadwozie = $_POST['nadwozie']; 
$waga = $_POST['waga']; 
$wysokosc = $_POST['wysokosc']; 
$szerokosc = $_POST['szerokosc']; 
$dlugosc = $_POST['dlugosc']; 
$naped = $_POST['naped']; 
$srednie = $_POST['srednie']; 
$miasto = $_POST['miasto']; 
$trasa = $_POST['trasa']; 
$cena = $_POST['cena']; 
if($marka and $model and $url and $rok and $silnik and $nadwozie and $waga and $wysokosc and $szerokosc and $dlugosc and $naped and $srednie and $miasto and $trasa and $cena) { 
     
     
    // dodajemy rekord do bazy 
    $ins = @mysql_query("INSERT INTO auta SET marka='$marka', model='$model', zdjecie_url='$url', rokprodukcji='$rok', silnik='$silnik', nadwozie='$nadwozie', waga='$waga', wysokosc='$wysokosc', szerokosc='$szerokosc', dlugosc='$dlugosc', naped='$naped', spalanie_srednie='$srednie', spalanie_miasto='$miasto', spalanie_trasa='$trasa', cena='$cena'"); 
     
    if($ins) echo "Rekord został dodany poprawnie"; 
    else echo "Błąd nie udało się dodać nowego rekordu"; 
     
    mysql_close($connection); 
} 

?>
</center>
		<p>Chcesz się wylogować? <a href="wyloguj.php"><font color="red">Kliknij tutaj</font></a></font></p>

		</div>

	
</body>
</html>