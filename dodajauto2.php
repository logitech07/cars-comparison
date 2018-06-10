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
		<p>Witaj ponownie <font color="green"><?php echo ''.$user[nick].'';?></font>
		<center>
		<?php 
$car = $_GET['carid']; 

$ins = @mysql_query("UPDATE uzytkownicy SET wybrane_auto2='$car' WHERE nick='$nick'"); 
     
    if($ins) echo "Auto #2 dodane poprawnie. Dziękujemy za korzystanie z naszego systemu."; 
?>
	


	
	<br/><br/>
	<p>
	<a href="auta.php"><b><font color="black">>> Przejdź do porównywania aut <<</font></b></a></br>
	<a href="system.php"><b><font color="black">>> Zobacz inne auta <<</font></b></a>
	</p>
</center>
		

		<p>Chcesz się wylogować? <a href="wyloguj.php"><font color="red">Kliknij tutaj</font></a></font></p>

		</div>

	
</body>
</html>