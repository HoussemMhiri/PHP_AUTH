<?php

define("HOST", 'localhost');
define("NAME", 'root');
define("PASS", '');
define("DB", 'phpauth');



$conn = new mysqli(HOST, NAME, PASS, DB);
if ($conn->connect_error) {
    die("Connection Faile" . $conn->connect_error);
}
