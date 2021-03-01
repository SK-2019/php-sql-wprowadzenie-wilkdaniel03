<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Daniel Wilk</title>
    <link rel="stylesheet" href="/assets/style.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous"/>
</head>
<body>
    <header>
        <input type="checkbox" id="check"/>
        <label for="check">
            <i class="fas fa-bars" id="button"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header id="sidebar-name">SideBar</header>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i>Strona Główna</a></li>
                <li><a href="pracownicy.php"><i class="fas fa-briefcase"></i>Pracownicy</a></li>
                <li><a href="pracownicyorganizacja.php"><i class="fas fa-building"></i>Pracownicy i Organizacja</a></li>
                <li><a href="funkcjeagregujace.php"><i class="fas fa-calculator"></i>Funkcje Agregujące</a></li>
                <li><a href="dataczas.php"><i class="fas fa-calendar-week"></i>Data i Czas</a></li>
                <li><a href="biblioteka.php"><i class="fas fa-book"></i>Biblioteka</a></li>
                <li><a href="dane.php"><i class="fas fa-database"></i>Dane</a></li>
                <li><a href="https://github.com/SK-2019/php-sql-wprowadzenie-wilkdaniel03"><i class="fab fa-github"></i>Mój Github</a></li>
            </ul>
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
