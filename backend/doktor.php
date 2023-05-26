<?php 
    include "./db_conn.php";

    function getAllDoktor() {
        $sql = "SELECT * FROM doktor";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();

        return $stmt->rowCount();
    }

?>