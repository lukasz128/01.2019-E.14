<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Podróże dalekie i bliskie</title>
	<link rel="Stylesheet" href="styl6.css">
</head>
<body>
	<header class="baner">
		<h1> Biuro podróży: WESOŁA EKIPA </h1>
	</header>

	<section class="ciasteczka">
		<?php
			if(isset($_COOKIE['ciastko'])) {
				echo "Witaj ponownie na naszej stronie";
			}
			else {
				setcookie("ciastko", 1, time()+60*60);
				echo "Witaj! Nasza strona używa ciasteczek";
			}
		?>
	</section>

	<main class="glowna-sekcja">
		<section class="lewy">
			<table>
				<tr>
					<td>
						<img src="polska.jpg" alt="zwiedzanie Krakowa">
					</td>

					<td>
						<img src="wlochy.jpg" alt="Wenecja i nie tylko">
					</td>
				</tr>

				<tr>
					<td>
						<img src="grecja.jpg" alt="gorące Greckie wyspy">
					</td>

					<td>
						<img src="hiszpania.jpg" alt="Słoneczna Barcelona">
					</td>
				</tr>
			</table>
		</section>
		
		<section class="prawy">
			<h3> Proponujemy wycieczki </h3>

			<ul>
				<li> autokarowe </li>
				<ol>
					<li> po Polsce z przeodnikiem </li>
					<li> do Niemiec i Czech </li>
				</ol>
				<li> samolotem </li>
				<ol>
					<li> wczasy w Grecji </li>
					<li> zwiedzanie Barcelony </li>
					<li> zwiedzanie Wenecji </li>
				</ol>
			</ul>

			<h3> Pobierz dokumenty </h3>

			<p>
				<a href="regulamin.txt"> Regulamin korzysta z usługi biura podrózy </a>
			</p>
			<p>
				<a href="http://galeria.pl/" target="_blank"> Tu znajdziesz zdjęcia z naszej wycieczki </a>
			</p>
		</section>
	</main>

	<footer class="stopka">
		<span> Stronę przygotował: mój pesel </span>
	</footer>
</body>
</html>
