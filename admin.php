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
			<h1>System porównawczy dealerów aut</h1>
		</div>
		<p>Witamy w panelu administracyjnym systemu do porównywania aut</p>
			
				
			<form method="post" action="admin.php">
				<ul class="right-form">
					<h3>Zaloguj się:</h3>
					<div>
						<li><input type="text"  placeholder="Nazwa użytkownika" name="login" required/></li>
						<li> <input type="password"  placeholder="Hasło" name="haslo" required/></li>
					</div>
						<input type="submit" onclick="myFunction()" value="Zaloguj się" >
					
					<div class="clear"> </div>
				</ul>
				<div class="clear"> </div>
					
			</form>
			<div style="padding: 0 30px;">
			

<?php include("config.php"); ?>
<?php
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$haslo = addslashes($haslo);
$login = addslashes($login);
$login = htmlspecialchars($login);

if ($_GET['login'] != '') { //proba wlamania poprzez link
exit;
}
if ($_GET['haslo'] != '') { //proba wlamania poprzez link
exit;
}

$haslo = md5($haslo); //szyfrowanie hasla
    if (!$login OR empty($login)) {
echo '<p class="alert"> </p>';
exit;
}
    if (!$haslo OR empty($haslo)) {
echo '<p class="alert">Hasło nie może być puste!</p>';
exit;
}
$istnick = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `administratorzy` WHERE `nick` = '$login' AND `haslo` = '$haslo'")); // sprawdzamy login oraz haslo
    if ($istnick[0] == 0) {
echo 'Logowanie nieudane. Sprawdź pisownię nicku oraz hasła.';
    } else {

$_SESSION['nick'] = $login;
$_SESSION['haslo'] = $haslo;

header("Location: panel.php");
}
?>
	</div>
		</div>

	
</body>
</html>