<?php

    $con = new mysqli("localhost", "root", "", "baza");

    if ($con->connect_error) {
        die("Database connection error" . $con->connect_error);
    }

    $name = "Janusz";
    $age = 15;

    $sql = "INSERT INTO OSOBA(name, age) VALUES ($name, $age)";

    $res = $con->query($sql);

    $con->close();
?>

<?php

    $con = new mysqli("localhost", "root", "", "baza");

    if ($con->connect_error) {
        die("Databse connect error" . $con->connect_error);
    }

    $sql = "SELECT * FROM OSOBA";

    $res = $con->query($sql);

    if($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {

            $name = $row["name"];
            $age = $row["age"];

            echo"Użytkownik o imieniu $name ma $age lat";

        }
    }

    $con->close();

?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $age = $_POST["age"];
        $hobby = $_POST["hobby"];

        $con = new mysqli("loaclhost", "root", "", "baza");

        if($con->connect_error) {
            die("Connect error" . $con->connect_error);
        }

        $sql = "INSERT INTO OSOBA(name, surname, age, hobby) VALUES ('$name', '$surname', $age, '$hobby')";

        if( $con->query($sql) === FALSE) {
            echo"insert query error" . $con->error;
        }

        $con->close();
    }    
?>

<?php 
    // @Check if parameter 
    if(isset($_GET["id"])) {

        $id = $_GET["id"];

        $con  = new mysqli("localhost", "root", "", "baza");

        if ($con->connect_error) {
            die("Database coonection error" . $con->connect_error);
        }

        $sql = "SELECT * FROM OSOBA WHERE id = $id";
        $res = $con->query($sql);

        if($res->num_rows > 0) {
            while($row = $res->fetch_assoc()) {

                $id = $row["id"];
                $name = $row["name"];
                $surname = $row["surname"];
                $age = $row["age"];

                echo"<ul>
                <li>
                    <p>User id: $id</p>
                </li>
                <li>
                    <p>Name is: $name</p>
                </li>
                <li>
                    <p>Surname is: $surname</p>
                </li>
                <li>
                    <p>Age is: $age</p>
                </li>
                </ul>";

            }
        }

        $con->close();
    }
?>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST["id"];
        $color = $_POST["color"];
        $wheels = $_POST["wheels"];
        $production_year = $_POST["production_year"];

        $con = new mysqli("localhost", "root", "", "baza");

        if($con->connect_error) {
            die("Database connection error" . $con->connect_error);
        }

        $sql = "INSERT INTO CARS(id, color, wheels, production_year) VALUES ($id, '$color', '$wheels', '$production_year')";

        if($con->query($sql) === FALSE) {
            echo"Database insert sql error $con->error";
        }

        $con->close();
    }

?>

<?php

    $con = new mysqli("localhost", "root", "", "baza");

    if($con->connect_error) {
        die("Database connect error" . $con->connect_error);
    }

    $sql = "SELECT * FROM CARS WHERE color = 'red' AND wheels = 4";

    $res = $con->query($sql);

    if($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {

            $id = $row["id"];
            $name = $row["name"];
            $dealer = $row["dealer"];
            $color = $row["color"];

            echo"<ul>
            <li>
                <p>$id</p>
            </li>
            <li>
                <p>$name</p>
            </li>
            <li>
                <p>$dealer</p>
            </li>
            <li>
                <p>$color</p>
            </li>
            </ul>";

        }
    }

    $con->close();
?>
