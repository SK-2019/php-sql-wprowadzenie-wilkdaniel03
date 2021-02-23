<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Daniel Wilk</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header>
        <div class="github">
            <h3><a href="https://github.com/SK-2019/php-sql-wprowadzenie-wilkdaniel03">Github</a></h3>
        </div>
        <div class="menu">
            <nav>
                <b><ol>
                    <li><a class="link" href="index.php">Strona Główna</a></li>
                    <li><a class="link" href="pracownicy.php">Pracownicy</a></li>
                    <li><a class="link" href="pracownicyorganizacja.php">Pracownicy i Organizacja</a></li>
                    <li><a class="link" href="funkcjeagregujace.php">Funkcje Agregujące</a></li>
                    <li><a class="link" href="dataczas.php">Data i Czas</a></li>
                    <li><a class="link" href="biblioteka.php">Biblioteka</a></li>
                    <li><a class="link" href="dane.php">Dane</a></li>
                </ol></b>
            </nav>
        </div>
        <div class="name">
                <h2>Daniel Wilk gr 2 nr 29<h2>
        </div>
        <div class="tabela">
            <?php
                echo("<h5>Wszyscy Pracownicy</h5>");
                require_once("assets/connect.php");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Zarobki</th>");
                    echo("<th>Data Urodzenia</th>");
                    echo("<th>Nazwa Działu</th>");
                        while($row=$result->fetch_assoc()){
                            echo("<tr>");
                                echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['zarobki']."</td><td>".$row['data_urodzenia']."</td><td>".$row['nazwa_dzial']."</td>");
                            echo("</tr>");
                        }
                echo("</table>");

                echo("<h5>Funkcje Agregujące</h5>");
                $result = $conn->query('SELECT dzial, sum(zarobki) as suma, avg(zarobki) as srednia, min(zarobki) as min, max(zarobki) as max, nazwa_dzial FROM `pracownicy`, `organizacja` WHERE dzial = id_org group by dzial');
                    echo("<table border=1>");
                    echo("<th>Dział</th>");
                    echo("<th>Suma</th>");
                    echo("<th>Średnia</th>");
                    echo("<th>Min</th>");
                    echo("<th>Max</th>");
                    echo("<th>Nazwa Działu</th>");
                    while($row = $result->fetch_assoc()) {
                        echo("<tr>");
                            echo("<td>".$row['dzial']."</td><td>".$row['suma']."</td><td>".$row['srednia']."</td><td>".$row['min']."</td><td>".$row['max']."</td><td>".$row["nazwa_dzial"]."</td>");
                        echo("</tr>");
                    }
                echo("</table>");
            ?>
        </div>
    </header>
</body>
</html>                
