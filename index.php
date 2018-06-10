<!DOCTYPE html>
<html>
<head>
		<title>Logowanie - System porównawczy dealerów aut - Krystian Terejko</title>
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
		<p>Witamy w systemie porównawczym dealerów aut. Zarejestruj się jeśli nie masz konta lub zaloguj się.</p>
			<form method="post" action="index.php?akcja=wykonaj">
				<ul class="left-form">
					<h2>Nowe konto:</h2>
					<li>
						<input type="text"   name="nick" placeholder="Nazwa użytkownika" required/>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text"   name="email" placeholder="Email" required/>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="text"   name="vemail" placeholder="Powtórz Email" required/>
						<div class="clear"> </div>
					</li> 					
					<li>
						<input type="password"   name="haslo" placeholder="Hasło" required/>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password"   name="vhaslo" placeholder="Powtórz hasło" required/>
						<div class="clear"> </div>
					</li> 
					<input type="submit" name="rejestruj" value="Zarejestruj się">
						<div class="clear"> </div>
				</ul>
			</form>
				
			<form method="post" action="index.php">
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
			<?php include("config.php");

$ip = $_SERVER['REMOTE_ADDR'];

$akcja = $_GET['akcja'];
    if ($akcja == wykonaj) {
//
$nick = substr(addslashes(htmlspecialchars($_POST['nick'])),0,32);
$haslo = substr(addslashes($_POST['haslo']),0,32);
$vhaslo = substr($_POST['vhaslo'],0,32);
$email = substr($_POST['email'],0,32);
$vemail = substr($_POST['vemail'],0,32);
$nick = trim($nick);
//kilka sprawdzen co do nicku i maila
$spr1 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uzytkownicy WHERE nick='$nick' LIMIT 1")); // sprawdzamy czy taki login istenieje
$spr2 = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uzytkownicy WHERE email='$email' LIMIT 1")); // sprawdzamy czy taki email istnieje
$pos = strpos($email, "@");
$pos2 = strpos($email, ".");
$emailx = explode("@", $email);
$komunikaty = '';
$spr4 = strlen($nick);
$spr5 = strlen($haslo);
//sprawdzenie co uzytkownik zle zrobil
if (!$nick || !$email || !$haslo || !$vhaslo || !$vemail ) {
$komunikaty .= "Musisz wypełnić wszystkie pola!<br>"; }
if ($spr4 < 4) {
$komunikaty .= "Login musi mieć przynajmniej 4 znaki<br>"; }
if ($spr5 < 4) {
$komunikaty .= "Hasło musi mieć przynajmniej 4 znaki<br>"; }
if ($spr1[0] >= 1) {
$komunikaty .= "Ten login jest zajęty!<br>"; }
if ($spr2[0] >= 1) {
$komunikaty .= "Ten e-mail jest już używany!<br>"; }
if ($email != $vemail) {
$komunikaty .= "E-maile się nie zgadzają ...<br>";}
if ($haslo != $vhaslo) {
$komunikaty .= "Hasła się nie zgadzają ...<br>";}
if ($pos == false OR $pos2 == false) {
$komunikaty .= "Nieprawidłowy adres e-mail<br>"; }

//jezeli wystepuja bledy, wyswietlamy komunikaty
if ($komunikaty) {
echo '
<b>Rejestracja nie powiodła się, popraw następujące błędy:</b><br>
'.$komunikaty.'<br>';
} else {
//jesli wszystko w porzadku
$nick = str_replace ( ' ','', $nick );
$haslo = md5($haslo); //szyfrowanie hasla

mysql_query("INSERT INTO `uzytkownicy` (nick, email, haslo, ip) VALUES('$nick','$email','$haslo','$ip')") or die("Nastąpił błąd podczas rejestracji.!");

echo '<br><span style="color: green; font-weight: bold;">Zostałeś zarejestrowany '.$nick.'. Teraz możesz się zalogować.</span><br>';
}
}
?>

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
echo '<p class="alert">Uzupełnij hasło!</p>';
exit;
}
$istnick = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `uzytkownicy` WHERE `nick` = '$login' AND `haslo` = '$haslo'")); // sprawdzamy login oraz haslo
    if ($istnick[0] == 0) {
echo 'Logowanie nieudane. Sprawdź pisownię nicku oraz hasła.';
    } else {

$_SESSION['nick'] = $login;
$_SESSION['haslo'] = $haslo;

header("Location: system.php");
}
?>
	</div>
		</div>

	
</body>
</html>