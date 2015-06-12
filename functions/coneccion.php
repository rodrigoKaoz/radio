<?php
$servername = "basededatos.kaoztv.com";
$username = "malditacustion";
$password = "chupalo123.-.";
$dbname = "sitio2kaoztv";
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sitio2kaoztv";*/
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} ?>