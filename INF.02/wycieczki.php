<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <link href="./styl4.css" rel="stylesheet"/>
        <title>Wycieczki po Europie</title>
    </head>
    <body>
        <header>
            <h1>BIURO TURYSTYCZNE</h1>
        </header>
        <div class="data">
            <h3>
                Wycieczki, na które są wolne miejsca
            </h3>
            <ul>
                <?php
                    $conn = new mysqli("localhost", "root", "", "wycieczki");

                    $sql = "SELECT id, dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1";

                    if($conn->connect_error) {
                        die("Database connect error" . $conn->connect_error);
                    }

                    $res = $conn->query($sql);

                    if($res->num_rows > 0) {
                        while($row = $res->fetch_assoc()) {
                            $id = $row["id"];
                            $dataWyjazdu = $row["dataWyjazdu"];
                            $cel = $row["cel"];
                            $cena = $row["cena"];

                            echo "<li> . $id . $dataWyjazdu . $cel . $cena . </li>";
                        }
                    }

                    $conn->close();
                ?>
            </ul>
        </div>
        <main>
            <div class="main-left">
                <h2>Bestselery</h2>
                <table>
                    <tr>
                        <th>Kolumna 1</th>
                        <th>Kolumna 2</th>
                    </tr>
                    <tr>
                        <td>Wiersz 1, Kolumna 1</td>
                        <td>Wiersz 1, Kolumna 2</td>
                    </tr>
                    <tr>
                        <td>Wiersz 2, kolumna 1</td>
                        <td>Wiersz 2, kolumna 2</td>
                    </tr>
                    <tr>
                        <td>Wiersz 3, kolumna 1</td>
                        <td>Wiersz 3, kolumna 2</td>
                    </tr>
                </table>
            </div>
            <div class="main-middle">
                <h2>Nasz zdjęcia</h2>
                    <?php
                        $conn = new mysqli("localhost", "root", "", "wycieczki");

                        $sql = "SELECT nazwaPliku, podpis FROM zdjecia ORDER BY podpis DESC;";

                        if($conn->connect_error) {
                            die("Database connection error" . $conn->connect_error);
                        } 

                        $res = $conn->query($sql);

                        if($res->$num_rows > 0) {
                            while($row = $res->fetch_assoc()) {
                                $nazwaPliku = $row["nazwaPliku"];
                                $podpis = $row["podpis"];

                                echo "<img src='$nazwaPliku' alt='$podpis'/>";
                            }
                        }

                        $conn->close();
                    ?>
            </div>
            <div class="main-right">
                <h2>Skontaktuj się</h2>
                <a href="turysta@wycieczki.pl">napisz do nas</a>
                <p>telefon: 111222333</p>
            </div>
        </main>
        <footer>
                <p>Stronę wykonał: 03252010119</p>
        </footer>
    </body>
</html>
