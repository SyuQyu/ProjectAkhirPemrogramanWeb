<?php
$conn = new mysqli('localhost','root','','wecare');

if ($conn->connect_error) {
   die("Error: There is something error".$conn->connect_error);
} else {
    echo "Database connect successfuly";
}
?>