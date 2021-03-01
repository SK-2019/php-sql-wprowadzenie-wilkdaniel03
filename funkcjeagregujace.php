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
                echo("<h5>Suma zarobków wszystkich pracowników</h5>");
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

                echo("<h5>Suma zarobków wszystkich kobiet</h5>");
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

                echo("<h5>Suma zarobków mężczyzn pracujących w dziale 2 i 3</h5>");
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

                echo("<h5>Średnia zarobków wszystkich mężczyzn</h5>");
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

                echo("<h5>Średnia zarobków pracowników z działu 4</h5>");
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

                echo("<h5>Średnia zarobków mężczyzn z działu 1 i 2</h5>");
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

                echo("<h5>Ilu jest wszystkich pracowników</h5>");
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

                echo("<h5>Ile kobiet pracuje łącznie w działach 1 i 3</h5>");
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

                echo("<h5>Suma zarobków w poszczególnych działach</h5>");
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

                echo("<h5>Ilość pracowników w poszczególnych działach</h5>");
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

                echo("<h5>Średnie zarobków w poszczególnych działach</h5>");
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

                echo("<h5>Suma zarobków kobiet i mężczyzn</h5>");
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

                echo("<h5>Średnia zarobków kobiet i mężczyzn</h5>");
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

                echo("<h5>Średnie zarobków mężczyzn w poszczególnych działach większe od 30</h5>");
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

                echo("<h5>Ilość pracowników w poszczególnych działach większa od 3</h5>");
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
