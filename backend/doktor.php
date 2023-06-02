<?php 

    function getAllDoktor() {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM doktor";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();

        return $stmt->rowCount();
    }

    function getDoktor() {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM doktor where id_user = ?";
        $stmt = $conn->prepare($sql); 
        $stmt->execute([$_SESSION['id']]);
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getBooking($id) {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM booking where id_dokter = :id";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getAllBookings() {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM booking";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

?>