<?php 
    function getAllDoktors() {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM userdata WHERE u_level = 2";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllPasien() {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM userdata WHERE u_level = 1";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

?>