<?php

$confirmForm = false;

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
	$confirmForm = true;
	
	$tytul = $_POST['tytul'];
	$gatunekFilmu = $_POST['gatunek-filmu'];
	$rokPordukcji = $_POST['rok-produkcji'];
	$ocena = $_POST['ocena'];
}


if($confirmForm) {
	$conn = new mysqli('localhost', 'root', '', 'egzamin1');
	
	if($conn->errno != 0) 
		echo "Error".$conn->error;
	
	$conn->set_charset("UTF8");
	
	$conn->query("INSERT INTO `filmy`(tytul, rok, gatunki_id, ocena) VALUES('$tytul', $rokPordukcji, $gatunekFilmu, $ocena);");
	
	if($conn->errno == 0)
		echo "Film $tytul został dodany do bazy";
	
	$conn->close();
}