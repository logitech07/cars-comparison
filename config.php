<?php session_start();
mysql_connect("localhost","noons_cardealers","3b1IdReRJG") or die(mysql_error()."Nie mozna polaczyc sie z baza danych. Prosze chwile odczekac i sprobowac ponownie.");
mysql_select_db("noons_cardealers") or die(mysql_error()."Nie mozna wybrac bazy danych.");
?>
