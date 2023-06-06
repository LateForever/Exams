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
