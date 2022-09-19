<?php

$DATABASE_HOST = "localhost";
$DATABASE_USER = "root";
$DATABASE_PASS = "matrix0101";
$DATABASE_NAME = "my_hero_academia";

$conn = mysqli_connect("$DATABASE_HOST", "$DATABASE_USER", "$DATABASE_PASS", "$DATABASE_NAME");

//mysqli_set_charset($conn, "utf-8");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQl: " . mysqli_connect_error();
} else {
    //echo "Connection successfully";
}
