<?php
	$conn = new mysqli('localhost', 'root', '', 'egzamin4');
	
	if($conn->errno != 0)
		echo "Error".$conn->error;
	$conn->set_charset("UTF8");
	
	$confirForm = false;
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
		$confirForm = true;
		$gromada = $_POST['gromada'];
		$gromada_ = ['RYBY', 'PŁAZY', 'GADY', 'PTAKI', 'SSAKI'];
	}
	
	if($confirForm) 
		$sql1 = $conn->query("SELECT gatunek, wystepowanie FROM zwierzeta WHERE Gromady_id = $gromada;");
	$sql2 = $conn->query("SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa FROM zwierzeta, gromady WHERE zwierzeta.Gromady_id = gromady.id;");
?>
<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<title> Dane o zwierzętach </title>
		<link rel="Stylesheet" href="styl3.css">
	</head>
	
	<body>
		<header class="baner">
			<h1> ATLAS ZWIERZĄT </h1>
		</header>
		<section class="form">
			<h2> Gromady </h2>
			
			<ol>
				<li> Ryby </li>
				<li> Płazy </li>
				<li> Gady </li>
				<li> Ptaki </li>
				<li> Ssaki </li>
			</ol>
			
			<form action="" method="POST">
				<label>
					<span> Wybierz gromadę </span>
					<input type="number" name="gromada">
				</label>
				
				<button> Wyświetl </button>
			</form>
			</form>
		</section>
		
		<main class="glowny-blok">
			<section class="lewy">
				<img src="zwierzeta.jpg" alt="dzikie zwierzęta">
			</section>
			
			<section class="srodek">
				<h2><?=@$gromada_[$gromada-1]?></h2>
				<?php if(@$sql1->num_rows > 0): ?>
					<?php while($row = $sql1->fetch_assoc()): ?>
						<p>
							<?=$row['gatunek']?>,
							<?=$row['wystepowanie']?>
						</p>
					<?php endwhile; ?>
				<?php endif; ?>
			</section>
			
			<section class="prawy">
				<h2> Wszystkie zwirzęta w bazie </h2>
				<?php while($row = $sql2->fetch_assoc()): ?>
					<span style="display:block;"> 
						<?=$row['id']?>,
						<?=$row['gatunek']?>,
						<?=$row['nazwa']?>
					</span>
				<?php endwhile; ?>
			</section>
		</main>
		
		<footer class="stopka">
			<a href="atlas-zwierzat.pl" target="_target"> Poznaj inne strony o zwierzętach </a>
			<span> autor Atlasu zwierząt: mój pesel </span>
		</footer>
	</body>
</html>
<?php
	$conn->close();
?>