<?php
$conn = new mysqli('localhost', 'root', '', 'egzamin2');

if($conn->errno != 0)
    echo "Błąd".$conn->error;
$conn->set_charset("UTF8");

$sql1 = $conn->query("SELECT nazwa_pliku, potoczna FROM grzyby;");
$sql2 = $conn->query("SELECT nazwa, potoczna FROM grzyby WHERE jadalny = 1;");
$sql3 = $conn->query("SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa AS 'nazwa_rodziny' FROM grzyby, rodzina WHERE grzyby.rodzina_id = rodzina.id AND potrawy_id = 1;");
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Grzybobranie</title>
        <link rel="Stylesheet" href="styl5.css">
    </head>
    <body>
        <header class="naglowek">
            <section class="miniatura">
                <a href="borowik.jpg">
                    <img src="borowik-miniatura.jpg" alt="Grzybobranie">
                </a>
            </section>
            
            <section class="tytul">
                <h1>Idziemy na grzyby</h1>
            </section>
        </header>
        
        <main class="glowna-sekcja">
            <section class="lewy">
                <?php while($row = $sql1->fetch_assoc()): ?>
                    <img src="<?=$row['nazwa_pliku']?>" title="<?=$row['potoczna']?>">
                <?php endwhile; ?>
            </section>
            
            <section class="prawy">
                <h2> Grzyby jadalne </h2>
                <?php while($row = $sql2->fetch_assoc()): ?>
                    <p>
                        <?=$row['nazwa']?> 
                        (<?=$row['potoczna']?>)
                    </p>
                <?php endwhile; ?>
                <h2> Polecamy do sosów</h2>
                    <ol>
                    <?php while($row = $sql3->fetch_assoc()): ?>
                        <li>
                            <?=$row['nazwa']?>
                            (<?=$row['potoczna']?>)
                            rodzina: <?=$row['nazwa_rodziny']?>
                        </li>
                    <?php endwhile; ?>
                    </ol>
            </section>
        </main>
        
        <footer class="stopka">
            <p>Autor: mój pesel</p>
        </footer>
    </body>
</html>
<?php
$conn->close();
?>