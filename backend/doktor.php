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

    function acceptDeclinePatientBooking($data, $id, $decline) {
        require "../../../backend/db_conn.php";
        $accepted = ($data == 1) ? 1 : 0;
        if(isset($decline)) {
            $needAccepted = 0;
        } else if ($data == 1) {
            $needAccepted = 0;
        } else {
            $needAccepted = 1;
        }
        
        $query = "UPDATE booking SET accepted = $accepted, needAccepted = $needAccepted WHERE id = $id";        
        $stmt = $conn->prepare($query); 
        $stmt->execute();
        return true;
    }
    

?>