<?php
	$conn = new mysqli('localhost', 'root', '', 'egzamin1');
	
	if($conn->errno != 0)
		echo "Error".$conn->error;
	$conn->set_charset("UTF8");
	
	$confirmForm = false;
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$confirmForm = true;
		
		$gatunek = $_POST['gatunek'];
	}
	
	if($confirmForm) 
		$sql = $conn->query("SELECT tytul, rok, ocena FROM filmy WHERE gatunki_id = $gatunek;");
	$sql2 = $conn->query("SELECT filmy.id, filmy.tytul, rezyserzy.imie, rezyserzy.nazwisko FROM filmy, rezyserzy WHERE filmy.rezyserzy_id = rezyserzy.id;");
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<title> Filmoteka </title>
		<link rel="Stylesheet" href="styl3.css">
	</head>
	<body>
		<header class="naglowek">
			<section class="pierwszy-blok">
				<img src="klaw.png" alt="Nasze Filmy">
			</section>
			
			<section class="drugi-blok">
				<h1> Baza Filmów </h1>
			</section>
			
			<section class="trzeci-blok">
				<form action="" method="POST">
					<select name="gatunek">
						<option value="1"> Sci-Fi </option>
						<option value="2"> animacja </option>
						<option value="3"> dramat </option>
						<option value="4"> horror </option>
						<option value="5"> komedia </option>
					</select>
					
					<button> Filmy </button>
				</form>
			</section>
			
			<section class="czwarty-blok">
				<img src="gwiezdneWojny.png" alt="szturmowcy">
			</section>
		</header>
		
		<main class="glowny-blok">
			<section class="lewy-blok">
				<h2> Wybrano filmy </h2>
				<?php if(@$sql->num_rows > 0): ?>
					<?php while($row = $sql->fetch_assoc()): ?>
						<p> 
							Tytuł:<?=$row['tytul']?>, 
							Rok produkcji:<?=$row['rok']?>,
							Ocena:<?=$row['ocena']?>
						</p>
					<?php endwhile; ?>
				<?php endif; ?>
			</section>
			
			<section class="prawy-blok">
				<h2> Wszystkie filmy </h2>
				<?php while($row = $sql2->fetch_assoc()): ?>
					<p>
						<?=$row['id']?>, 
						<?=$row['tytul']?>,
						<?=$row['imie']?>,
						<?=$row['nazwisko']?>
					</p>
				<?php endwhile; ?>
			</section>
		</main>
		
		<footer class="stopka">
			<p> Autor: mój pesel </p>
			<a href="#"> Zapytania do bazy </a>
			<a href="filmy.pl" target="_blank"> Przejdź do filmy.pl </a>
		</footer>
	</body>
</html>