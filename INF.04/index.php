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
            <div>
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
            <div>

            </div>
            <div></div>
        </main>
        <footer>
            <p>&copy 67899076889</p>
        </footer>
    </body>
</html>
