<?php

$host = "localhost";
$username ="root";
$password = "";
$database = "userLog";

$conn = mysqli_connect("$host","$username","$password","$database");
if (!$conn){
    return $conn;
}
return "Failed to connect!";

?>