<?php 
    if(isset($_GET['id']) && isset($_GET['uLevel'])) {
            require "./db_conn.php";
            
            // Retrieve the values from the URL parameters
            $id = $_GET['id'];
            $level = $_GET['uLevel'];
            $sql = "";
            // Log the values of id and level in the JavaScript console
            echo "<script>console.log('id:', " . json_encode($id) . ");</script>";
            echo "<script>console.log('level:', " . json_encode($level) . ");</script>";

            if($level == 1) {
                $sql = "DELETE FROM userdata WHERE id = $id AND u_level = $level";
            } else if($level == 2) {
                $sql = "DELETE FROM userdata WHERE id = $id AND u_level = $level ";
            }
            
            // Log the query for debugging purposes
            error_log("SQL Query: " . $sql);

            $stmt = $conn->prepare($sql); 
            $result = $stmt->execute();

            if ($result) {
                echo "<script>alert('Data berhasil dihapus.');window.location='../frontend/view/admin/index.php';</script>";
            } else {
                echo "<script>alert('Gagal menghapus data.');window.location='../frontend/view/admin/index.php';</script>";
            }
    }
?>
