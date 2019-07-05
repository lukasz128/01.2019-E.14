<?php
	$conn = new mysqli('localhost', 'root', '', 'egzamin3');
	
	if($conn->errno != 0) 
		echo "Error".$conn->error;
	$conn->set_charset("UTF8");
	
	$confirmForm = false;
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
		$confirmForm = true;
		$producent = $_POST['producent'];
	}
	
	if($confirmForm) {
		$sql1 = $conn->query("SELECT nazwa, cena FROM `podzespoly` WHERE producenci_id = $producent;");
	}

?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<title> Hurtownia komputerowa </title>
		<link rel="Stylesheet" href="styl2.css">
	</head>
	
	<body>
		<header class="naglowek">
			<section class="lista">
				<ul>
					<li> Porducenci </li>
					<ol>
						<li> Intel </li>
						<li> AMD </li>
						<li> Motorola </li>
						<li> Corsair </li>
						<li> ADATA </li>
						<li> WD </li>
						<li> Kingstone </li>
						<li> Patriot </li>
						<li> Asus </li>
					</ol>
				</ul>
			</section>
			
			<section class="form">
				<h1> Dystrybucja sprzętu komputerowego </h1>
				<form method="POST" action="">
					<label>
						<span> Wybierz producenta </span>
						<input type="number" name="producent">
					</label>
					
					<button> WYŚWIETL </button>
				</form>
			</section>
			
			<section class="logo">
				<img src="sprzet.png" alt="Sprzedajemy komputery">
			</section>
		</header>
		
		<main class="glowna-sekcja">
			<h2> Podzespoły wybranego producenta </h2>
			<?php if(@$sql1->num_rows > 0): ?>
				<?php while($row = $sql1->fetch_assoc()): ?>
					<p>
						<?=$row['nazwa']?>
						CENA:<?=$row['cena']?>
					</p>
				<?php endwhile; ?>
			<?php else: ?>
				<p>Wybierz producenta</p>
			<?php endif; ?>
		</main>
		
		<footer class="stopka">
			<h4> Zapraszamy od poniedziałku do soboty w godzinach 7<sup>30</sup>-16<sup>30</sup> </h4>
			<span> Strona partnerów </span>
			<a href="http://adata.pl" target="_blank">ADATA</a>
			<a href="http://patriot.pl" target="_blank">Patriot</a>
			<a href="mailto:biuro@hurt.pl">Napisz</a>
			<p> Stronę wykonał: mój pesel </p>
		</footer>
	</body>
</html>
<?php
	$conn->close();
?>