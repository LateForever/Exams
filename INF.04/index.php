<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <link href="./style.css" rel="stylesheet"/>
        <title>Obiekty sportowe</title>
    </head>
    <body>
        <haeder>
            <nav>
                <ul>
                    <li>
                        <a href="./index.php">Strona główna</a>
                    </li>
                    <li>
                        <a href="./index.php">O nas</a>
                    </li>
                    <li>
                        <a href="./index.php">Kontakt</a>
                    </li>
                </ul>
            </nav>
        </haeder>
        <div class="main">
            <div class="main-left">
                <ul>
                <?php
                    $con = new mysqli("localhost", "root", "", "Sport");

                    if($con->connect_error) {
                        die("Database connection error" . $con->connect_error);
                    }

                    $sql = "SELECT id, nazwa FROM ObiektSportowy;";

                    $result = $con->query($sql);
                    if($result->num_rows > 0) {
                        
                        while($res = $result->fetch_assoc()) {

                            $id = $res["id"];
                            $name = $res["nazwa"];

                            echo "<li><a href='./index.php?=$id' target='_self'>$name</a></li>";
                        }
                    }

                    $con->close();
                ?>
                </ul>
            </div>
            <div class="main-middle">
                <?php

                    if(isset($_GET["id"])) {

                        $id = $_GET["id"];

                        $con = new mysqli("localhost", "root", "", "sport");

                        if($con->connect_error) {
                            die("Database connect error" . $con->connect_error);
                        }

                        $sql = "SELECT os.nazwa, os.adres, os.godzinyOtwarcia, os.obrazek, ro.nazwa AS obiekt FROM ObiektSportowy AS os
                        INNER JOIN RodzajObiektu AS ro ON ro.id = os.rodzajObiektu
                        WHERE os.id =$id";

                        $result = $con->query($sql);

                        if($result->num_rows > 0) {



                        } else {
                            
                            $sql1 = "SELECT os.nazwa, os.adres, os.godzinyOtwarcia, os.obrazek, ro.nazwa AS obiekt FROM ObiektSportowy AS os
                            INNER JOIN RodzajObiektu AS ro ON ro.id = os.rodzajObiektu";

                            $result1 = $con->query($sql1); 

                            while($res1 = $result1->fetch_assoc()) {

                                $name = $res1["nazwa"];
                                $adres = $res1["adres"];
                                $godzinyOtwarcia = $res1["godzinyOtwarcia"];
                                $obrazek = $res1["obrazek"];
                                $obiekt = $res1["obiekt"];

                                echo "<h2>$name</h2><h3>$obiekt</h3><p>$adres</p><img src='/img/$obrazek'/><p>$godzinyOtwarcia</p>";
                            }
                        }
                    }

                ?>
            </div>
            <div class="main-right">
                <h2>Dodaj nowy obiekt</h2>
                <form method="POST">
                    <label for="nazwa">
                        nazwa obiektu
                    </label>
                    <input type="text" name="nazwa" id="nazwa" />
                    <label for="adres">
                        adres obiektu
                    </label>
                    <input type="text" name="adres" id="adres" />
                    <label for="rodzaj">
                        rodzaj obiektu
                    </label>
                    <select name="rodzaj" id="rodzaj">
                        <?php
                            $con = new mysqli("localhost", "root", "", "Sport");

                            if($con->connect_error) {
                                die("Mysql connection error" . $con->connect_error);
                            }

                            $sql = "SELECT id, nazwa FROM RodzajObiektu;";

                            $res = $con->query($sql);
                            if($res->num_rows > 0) {
                                while($row = $res->fetch_assoc()) {

                                    $id = $row["id"];
                                    $name = $row["nazwa"];

                                    echo "<option value='$name'>$name</option>";
                                }
                            }
                        ?>
                    </select>
                </form>
                <?php

                    if($_SERVER["REQUEST_METHOD"] == "POST") {

                        $object_name = $_POST["nazwa"];
                        $object_address = $_POST["adres"];
                        $object_type = $_POST["rodzaj"];
                        $object_hours = $_POST["godziny"];
                        $_object_image = "default.jpeg";
                        
                        $con = new mysqli("localhost", "root", "", "Sport");

                        if($con->connect_error) {
                            die("Mysql connection error" . $con->connect_error);
                        }

                        $sql = "INSERT INTO ObiektSportowy(nazwa, adres, rodzajObiektu, godzinyOtwarcia, obrazek)
                        VALUES ('$object_name', '$object_address', $object_type, '$object_hours', '$_object_image');";

                        if($con->query($sql) === FALSE) {
                            echo "Insert query error" . $con->error;
                        }

                        $con->close(); 
                    
                    }

                ?>
            </div>
        </div>
        <footer>
            <p>&copy 67899076889</p>
        </footer>
    </body>
</html>
