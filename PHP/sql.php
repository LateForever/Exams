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
