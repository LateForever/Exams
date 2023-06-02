<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <link href="./style.css" rel="stylesheet" />
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
        <main>
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

                            echo "<li><a href='/index.php?=$id' target='_self'>$name</a></li>";
                        }
                    }

                    $con->close();
                ?>
                </ul>
            </div>
            <div class="main-middle">
            </div>
            <div class="main-right">
                <h2>Dodaj nowy obiekt</h2>
                <form method="POST">
                    
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

                        if($con->query($sql) === TRUE) {
                            
                        }  else {
                            echo "Insert query error" . $con->error;
                        }

                        $con->close();
                    
                    }

                ?>
            </div>
        </main>
        <footer>
            <p>&copy 67899076889</p>
        </footer>
    </body>
</html>
