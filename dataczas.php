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
                require_once("assets/connect.php");
                echo("<h5>Wiek poszczególnych pracowników (w latach)</h5>");
                $result = $conn->query("SELECT *, YEAR(CURDATE()) - YEAR(data_urodzenia) as wiek FROM pracownicy");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Wiek</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['wiek']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Wiek poszczególnych pracowników (w latach)</h5>");
                $result = $conn->query("SELECT *, YEAR(CURDATE()) - YEAR(data_urodzenia) as wiek FROM pracownicy, organizacja WHERE dzial = id_org AND nazwa_dzial = 'serwis'");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Nazwa działu</th>");
                    echo("<th>Wiek</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['nazwa_dzial']."</td><td>".$row['wiek']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Suma lat wszystkich pracowników</h5>");
                $result = $conn->query("SELECT sum(YEAR(CURDATE())-YEAR(data_urodzenia)) as suma_lat FROM pracownicy");
                echo("<table border=1>");
                    echo("<th>Suma lat</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['suma_lat']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");
                echo("<h5>Suma lat pracowników z działu handel</h5>");
                $result = $conn->query("SELECT *,sum(YEAR(CURDATE())-YEAR(data_urodzenia)) as suma_lat FROM pracownicy,organizacja WHERE dzial = id_org AND nazwa_dzial = 'handel'");
                echo("<table border=1>");
                    echo("<th>Suma lat</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['suma_lat']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Suma lat kobiet</h5>");
                $result = $conn->query("SELECT *,sum(YEAR(CURDATE())-YEAR(data_urodzenia)) as suma_lat FROM pracownicy,organizacja WHERE dzial = id_org AND imie LIKE '%a'");
                echo("<table border=1>");
                    echo("<th>Suma lat</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['suma_lat']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Suma lat mężczyzn</h5>");
                $result = $conn->query("SELECT *,sum(YEAR(CURDATE())-YEAR(data_urodzenia)) as suma_lat FROM pracownicy,organizacja WHERE dzial = id_org AND imie NOT LIKE '%a'");
                echo("<table border=1>");
                    echo("<th>Suma lat</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['suma_lat']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Średnia lat pracowników w poszczególnych działach</h5>");
                $result = $conn->query("SELECT *,avg(YEAR(CURDATE())-YEAR(data_urodzenia)) as srednia_lat FROM pracownicy,organizacja WHERE dzial = id_org GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Średnia lat</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['srednia_lat']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Suma lat pracowników w poszczególnych działach</h5>");
                $result = $conn->query("SELECT SUM(YEAR(CURDATE()) - YEAR(data_urodzenia)) as suma_lat, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Średnia lat</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['suma_lat']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Najstarsi pracownicy w każdym dziale</h5>");
                $result = $conn->query("SELECT MAX(YEAR(CURDATE()) - YEAR(data_urodzenia)) as wiek, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Średnia lat</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['wiek']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Najmłodsi pracownicy z działu: handel i serwis</h5>");
                $result = $conn->query("SELECT MIN(YEAR(CURDATE()) - YEAR(data_urodzenia)) as min, nazwa_dzial from pracownicy,organizacja WHERE id_org=dzial and (nazwa_dzial='handel' OR nazwa_dzial='serwis') GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Średnia lat</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['min']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Długość życia pracowników w dniach</h5>");
                $result = $conn->query("SELECT imie,DATEDIFF(CURDATE(),data_urodzenia) AS dni_zycia FROM pracownicy");
                echo("<table border=1>");
                    echo("<th>Ilość dni</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['dni_zycia']."</td><td>".$row['imie']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Najstarszy mężczyzna</h5>");
                $result = $conn->query("SELECT * FROM pracownicy WHERE imie NOT LIKE '%a' ORDER BY data_urodzenia ASC LIMIT 1");
                echo("<table border=1>");
                    echo("<th>Imie</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['imie']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");
                ?>
    </header>
</body>
</html>
