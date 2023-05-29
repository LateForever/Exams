<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $lowisko = $_POST["lowisko"];
        $data = $_POST["data"];
        $sedzia = $_POST["sedzia"];

        $karty_wedkarskie = 0;

        $con = new mysqli("localhost", "root", "", "wedkarstwo");

        if ($con->connect_error) {
            die("Nieudane połączenie z bazą danych: " . $con->connect_error);
        }

        $sql = "INSERT INTO Zawody_wedkarskie(Karty_wedkarskie_id, Lowisko_id, data_zawodow, sedzia) VALUES ('$karty_wedkarskie', '$lowisko', '$data', '$sedzia')";

        if ($conn->query($sql) === FALSE) {
            echo "Błąd: " . $sql . $conn->error;
        }

        $conn->close();
    }

?>