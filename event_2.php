<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }

    $sql = "SELECT `title`, `description`, `image` FROM `news`";
    $result = $conn->query($sql);

    $carouselItems = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $carouselItems[] = $row;
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($carouselItems);
?>