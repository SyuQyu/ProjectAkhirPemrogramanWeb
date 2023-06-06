<?php
    require "../../../backend/db_conn.php";
    if (isset($_GET['id'])){
        $kode = $_GET['id'];
        $sql1 = "delete from doktor where id_user = '$kode'";
        $sql2 = "delete from userdata where id = '$kode'";
        if ($sql1 && $sql2) {
            $stmt1 = $conn->prepare($sql1); 
            $stmt1->execute();

            $stmt2 = $conn->prepare($sql2); 
            $stmt2->execute();
    
            $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            echo "Deleted Succesfully";
            header("Location: data_doktor.php");
        }
    }
?>