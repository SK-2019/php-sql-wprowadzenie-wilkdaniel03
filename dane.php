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
        </div>

        <br/>
        <h3>Dodaj pracownika</h3>
        <form action="/pracownicy/dodaj.php" method="post">
            <input name="imie" type="text" placeholder="Imię"/><br/>
            <input name="dzial" type="text" placeholder="Dział"/><br/>
            <input name="zarobki" type="text" placeholder="Zarobki"/><br/>
            <input name="data_urodzenia" type="date"/><br/>
            <input type="submit" value="Dodaj"/>
            <input type="reset" value="resetuj"/>
        </form>
        <br/><br/>
        <h3>Usuń pracownika</h3><br/>
        <?php
            require_once("assets/connect.php");

            $result = $conn->query("SELECT * FROM pracownicy, organizacja WHERE dzial = id_org");
            echo("<table border=1>");
                echo("<th>ID</th>");
                echo("<th>Imię</th>");
                echo("<th>Nazwa działu</th>");
                echo("<th>Zarobki</th>");
                echo("<th>Data urodzenia</th>");
                echo("<th>Usuń</th>");
                while($row = $result->fetch_assoc()){
                    echo("<tr>");
                        echo("<td>".$row['id_pracownicy']."</td><td>".$row['imie']."</td><td>".$row['nazwa_dzial']."</td><td>".$row['zarobki']."</td><td>".$row['data_urodzenia']."</td><td>
                        <form action='pracownicy/usun.php' method='post'>
                            <input type='text' name='id' value=".$row["id_pracownicy"]." hidden/>
                            <input type='submit' value='Usuń'/>
                        </form>
                        ");
                    echo("</tr>");
                }
            echo("</table>")
        ?>
        </form>
    </header>
</body>
</html>