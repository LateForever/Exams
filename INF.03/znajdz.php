<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <link href="./style.css" rel="stylesheet" />
        <title>Kwiaty</title>
    </head>
    <body>
        <header>
            <h1>Grupa Polskich Kwiaciarni</h1>
        </header>
        <main>
            <div class="main-left">
                <h2>Menu</h2>
                <ol>
                    <li>
                        <a href="./index.html">Strona główna</a>
                    </li>
                    <li>
                        <a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a>
                    </li>
                    <li>
                        <a href="./znajdz.php">Znajdź kwiaciarnię</a>
                    </li>
                    <ul>
                        <li>w Warszawie</li>
                        <li>w Malborku</li>
                        <li>w Poznaniu</li>
                    </ul>
                </ol>
            </div>
            <div class="main-right-php">
                <div>
                    <h2>Znajdź kwiaciarnię</h2>
                    <form method="POST" action="./znajdz.php">
                        <label for="city">
                            Podaj nazwę miasta: 
                        </label>
                        <input name="city" id="city"/>
                        <input type="submit" value="SPRAWDŹ"/>
                    </form>
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST") {

                            $city = $_POST["city"];
                            
                            $con = new mysqli("localhost", "root", "", "kwiaty");

                            if($con->connect_error) {
                                die("Database connection error " . $con->connect_error);
                            }
    
                            $sql = "SELECT nazwa, ulica FROM kwiaciarnie WHERE miasto = '$city'";

                            $result = $con->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {

                                    $nazwa = $row["nazwa"];
                                    $ulica = $row["ulica"];

                                    echo "<h3> . $nazwa . "," . $ulica . </h3>";

                                }
                            }

                            $con->close();
                        }
                    ?>
                </div>
            </div>
        </main>
        <footer>
            <p>Stronę opracował: 07892089765</p>
        </footer>
    </body>
</html>
