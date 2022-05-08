<?php
//* Creating COnnection
try {
    $conn = mysqli_connect("localhost", "root", "", "bg-process");
    if (mysqli_connect_errno()) {
        throw new Exception("db connection failed");
    }
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
