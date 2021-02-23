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
            <h3><a href="https://github.com/wilkdaniel03/PHP-SQL-Wprowadzenie">Github</a></h3>
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
                require_once("assets/connect.php");
                echo("Wiek poszczególnych pracowników (w latach)");
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

                echo("Wiek poszczególnych pracowników (w latach)");
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

                echo("Suma lat wszystkich pracowników");
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
                echo("Suma lat pracowników z działu handel");
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

                echo("Suma lat kobiet");
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

                echo("Suma lat mężczyzn");
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

                echo("Średnia lat pracowników w poszczególnych działach");
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

                echo("Suma lat pracowników w poszczególnych działach");
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

                echo("Najstarsi pracownicy w każdym dziale");
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

                echo("Najmłodsi pracownicy z działu: handel i serwis");
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

                echo("Długość życia pracowników w dniach");
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

                echo("Najstarszy mężczyzna");
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