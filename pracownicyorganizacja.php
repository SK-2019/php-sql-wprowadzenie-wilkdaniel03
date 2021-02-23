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
                echo("Pracownicy z nazwą działów");
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

                echo("Pracownicy tylko z działu 1 i 4");
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

                echo("Lista kobiet z nazwami działów");
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

                echo("Lista mężczyzn z nazwami działów");
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

                echo("Pracownicy posortowani malejąco wg imienia");
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

                echo("Pracownicy z działu 3 posortowani rosnąco po imieniu");
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

                echo("Kobiety posortowane rosnąco po imieniu");
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

                echo("Kobiety z działu 1 i 3 posortowane rosnąco po zarobkach");
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

                echo("Mężczyźni posortowani rosnąco: po nazwie działu a następnie po wysokości zarobków");
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

                echo("Dwóch najlepiej zarabiających pracowników z działu 4");
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

                echo("Trzy najlepiej zarabiające kobiety z działu 4 i 2");
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

                echo("Najstarszy pracownik");
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