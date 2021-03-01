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
                <br/>
                <center><h3>Dodaj książke</h3>
                <form action="biblioteka/dodaj_autora.php" method="post">
                    <input type="text" name="book" placeholder="Tytuł"/>
                    <br/>
                    <input type="text" name="author" placeholder="Autor"/>
                    <br/>
                    <input type="submit" value="Dodaj"/>
                    <input type="reset" value="resetuj"/>
                </form></center>
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
                <center><h3>Usuń książkę</h3>
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
                ?></center>
            </div>
        </div>
    </header>
</body>
</html>