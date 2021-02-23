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
                require_once("assets/connect.php");
                echo("Suma zarobków wszystkich pracowników");
                $result = $conn->query("SELECT sum(zarobki) as suma FROM pracownicy");
                echo("<table border=1>");
                    echo("<th>Suma zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['suma']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Suma zarobków wszystkich kobiet");
                $result = $conn->query("SELECT sum(zarobki) as suma FROM pracownicy WHERE imie like '%a'");
                echo("<table border=1>");
                    echo("<th>Suma zarobków kobiet</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['suma']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Suma zarobków mężczyzn pracujących w dziale 2 i 3");
                $result = $conn->query("SELECT dzial,sum(zarobki) as suma FROM pracownicy WHERE imie not like '%a' AND (dzial = 2 OR dzial = 3) GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Dział</th>");
                    echo("<th>Suma zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['dzial']."</td><td>".$row['suma']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Średnia zarobków wszystkich mężczyzn");
                $result = $conn->query("SELECT avg(zarobki) as srednia FROM pracownicy WHERE imie not like '%a'");
                echo("<table border=1>");
                    echo("<th>Średnia zarobków mężczyzn</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['srednia']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Średnia zarobków pracowników z działu 4");
                $result = $conn->query("SELECT dzial,avg(zarobki) as srednia FROM pracownicy WHERE dzial = 4 GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Dział</th>");
                    echo("<th>Średnia zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['dzial']."</td><td>".$row['srednia']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Średnia zarobków mężczyzn z działu 1 i 2");
                $result = $conn->query("SELECT dzial,avg(zarobki) as srednia FROM pracownicy WHERE imie not like '%a' AND (dzial = 1 OR dzial = 2) GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Dział</th>");
                    echo("<th>Średnia zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['dzial']."</td><td>".$row['srednia']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Ilu jest wszystkich pracowników");
                $result = $conn->query("SELECT count(id_pracownicy) as ilosc FROM pracownicy");
                echo("<table border=1>");
                    echo("<th>Ilość pracowników</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['ilosc']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Ile kobiet pracuje łącznie w działach 1 i 3");
                $result = $conn->query("SELECT dzial,count(id_pracownicy) as ilosc FROM pracownicy WHERE imie like '%a' AND (dzial =1 OR dzial = 3) GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Dział</th>");
                    echo("<th>Ilość pracowników</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['dzial']."</td><td>".$row['ilosc']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Suma zarobków w poszczególnych działach");
                $result = $conn->query("SELECT nazwa_dzial,sum(zarobki) as suma FROM pracownicy,organizacja WHERE dzial = id_org GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Nazwa działu</th>");
                    echo("<th>Suma zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['nazwa_dzial']."</td><td>".$row['suma']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Ilość pracowników w poszczególnych działach");
                $result = $conn->query("SELECT nazwa_dzial,count(id_pracownicy) as ilosc FROM pracownicy,organizacja WHERE dzial = id_org GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Nazwa działu</th>");
                    echo("<th>Ilość pracowników</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['nazwa_dzial']."</td><td>".$row['ilosc']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Średnie zarobków w poszczególnych działach");
                $result = $conn->query("SELECT nazwa_dzial,avg(zarobki) as srednia FROM pracownicy,organizacja WHERE dzial = id_org GROUP BY dzial");
                echo("<table border=1>");
                    echo("<th>Nazwa działu</th>");
                    echo("<th>Średnia zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['nazwa_dzial']."</td><td>".$row['srednia']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Suma zarobków kobiet i mężczyzn");
                $result = $conn->query("SELECT sum(zarobki) as suma, if((imie like '%a'),'Kobiety','Mężczyźni') as 'plec' FROM pracownicy GROUP BY plec");
                echo("<table border=1>");
                    echo("<th>Płeć</th>");
                    echo("<th>Suma zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['plec']."</td><td>".$row['suma']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Średnia zarobków kobiet i mężczyzn");
                $result = $conn->query("SELECT avg(zarobki) as srednia, if((imie like '%a'),'Kobiety','Mężczyźni') as 'plec' FROM pracownicy GROUP BY plec");
                echo("<table border=1>");
                    echo("<th>Płeć</th>");
                    echo("<th>Średnia zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['plec']."</td><td>".$row['srednia']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Średnie zarobków mężczyzn w poszczególnych działach większe od 30");
                $result = $conn->query("SELECT avg(zarobki) as srednia,nazwa_dzial from pracownicy, organizacja WHERE dzial = id_org GROUP BY dzial HAVING avg(zarobki) > 30");
                echo("<table border=1>");
                    echo("<th>Nazwa działu</th>");
                    echo("<th>Suma zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['nazwa_dzial']."</td><td>".$row['srednia']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("Ilość pracowników w poszczególnych działach większa od 3");
                $result = $conn->query("SELECT count(id_pracownicy) as ilosc,nazwa_dzial from pracownicy, organizacja WHERE dzial = id_org GROUP BY dzial HAVING count(id_pracownicy) > 3");
                echo("<table border=1>");
                    echo("<th>Nazwa działu</th>");
                    echo("<th>Suma zarobków</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['nazwa_dzial']."</td><td>".$row['ilosc']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");
            ?>
        </div>
    </header>
</body>
</html>
