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
                echo("<h5>Pracownicy z nazwą działów</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Pracownicy tylko z działu 1 i 4</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND (dzial = 1 OR dzial = 4)");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Lista kobiet z nazwami działów</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND imie like '%a'");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Lista mężczyzn z nazwami działów</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND imie not like '%a'");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Pracownicy posortowani malejąco wg imienia</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org ORDER BY imie desc");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Pracownicy z działu 3 posortowani rosnąco po imieniu</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND dzial = 3 ORDER BY imie");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Kobiety posortowane rosnąco po imieniu</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND imie like '%a' ORDER BY imie");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Kobiety z działu 1 i 3 posortowane rosnąco po zarobkach</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND imie like '%a' AND (dzial = 1 OR dzial = 3) ORDER BY zarobki");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Zarobki</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['zarobki']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Mężczyźni posortowani rosnąco: po nazwie działu a następnie po wysokości zarobków</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND imie not like '%a' AND (dzial = 1 OR dzial = 3) ORDER BY dzial,zarobki");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Zarobki</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['zarobki']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Dwóch najlepiej zarabiających pracowników z działu 4</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND dzial = 4 ORDER BY zarobki desc LIMIT 2");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Zarobki</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['zarobki']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Trzy najlepiej zarabiające kobiety z działu 4 i 2</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org AND imie like '%a' AND (dzial = 2 OR dzial = 4) ORDER BY zarobki desc LIMIT 3");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Zarobki</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['zarobki']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");

                echo("<br/>");

                echo("<h5>Najstarszy pracownik</h5>");
                $result = $conn->query("SELECT * FROM pracownicy,organizacja WHERE dzial = id_org ORDER BY data_urodzenia LIMIT 1");
                echo("<table border=1>");
                    echo("<th>ID</th>");
                    echo("<th>Imie</th>");
                    echo("<th>Dział</th>");
                    echo("<th>Data urodzenia</th>");
                    echo("<th>Nazwa działu</th>");
                    while($row = $result->fetch_assoc()){
                        echo("<tr>");
                            echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['dzial']."</td><td>".$row['data_urodzenia']."</td><td>".$row['nazwa_dzial']."</td>");
                        echo("</tr>");
                    }
                echo("</table>");
            ?>
        </div>
    </header>
</body>
</html>
