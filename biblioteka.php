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
                <br/>
                <h3>Dodaj książke</h3>
                <form action="biblioteka/dodaj_autora.php" method="post">
                    <input type="text" name="book" placeholder="Tytuł"/>
                    <br/>
                    <input type="text" name="author" placeholder="Autor"/>
                    <br/>
                    <input type="submit" value="Dodaj"/>
                    <input type="reset" value="resetuj"/>
                </form>
                <br/>
                <?php
                    require_once("biblioteka/connect.php");

                    $result = $conn->query("SELECT * FROM biblioteka");

                    echo("<table border=1>");
                        echo("<th>ID</th>");
                        echo("<th>Tytuł</th>");
                        echo("<th>Autor</th>");
                        while($row = $result->fetch_assoc()){
                            echo("<tr>");
                                echo("<td>".$row['id']."</td><td>".$row['tytul']."</td><td>".$row['autor']."</td>");
                            echo("</tr>");
                        }
                    echo("</table>");
                ?>
                <br/>
                <h3>Usuń książkę</h3>
                <?php
                    require_once("biblioteka/connect.php");

                    $result = $conn->query("SELECT * FROM biblioteka");
                    echo("<form action='biblioteka/usun_autora.php' method='post'>");
                        echo("<select name='title'>");
                            while($row = $result->fetch_assoc()){
                                echo("<option value=".$row['id'].">".$row['tytul']." ".$row['autor']."</option>");
                            }
                        echo("</select>");
                        echo("<br/><input type='submit' value='Usuń'/>");
                    echo("</form>");
                ?>
            </div>
        </div>
    </header>
</body>
</html>