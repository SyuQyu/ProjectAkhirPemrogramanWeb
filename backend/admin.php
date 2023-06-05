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

    function getPasien() {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM userdata where id = ?";
        $stmt = $conn->prepare($sql); 
        $stmt->execute([$_GET['id']]);
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function editDataPasien() {
        require "../../../backend/db_conn.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form
            $fname = $_POST['fname'];
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $uLevel = $_POST['uLevel'];
            $data = "fname=".$fname."&uname=".$uname."&email=".$email;
    
            if (empty($fname)) {
                $em = "Full name is required";
                header("Location: ../frontend/view/admin/tambah_data.php';");
                exit;
            }else if(empty($uname)){
                $em = "User name is required";
                header("Location: ../frontend/view/admin/tambah_data.php';");
                exit;
            }else if(empty($pass)){
                $em = "Password is required";
                header("Location: ../frontend/view/admin/tambah_data.php';");
                exit;
            } else if(empty($email)){
                $em = "Password is required";
                header("Location: ../frontend/view/admin/tambah_data.php';");
                exit;
            }else {
        
                // hashing the password
                $pass = password_hash($pass, PASSWORD_DEFAULT);
        
                $sql = "UPDATE userdata SET username = ?, password = ?, fname = ?, email = ?, u_level = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([$uname, $pass, $fname, $email, $uLevel, $_GET['id']]);
        
                if($result) {
                    echo "<script>alert('Data berhasil ditambah.');window.location='../frontend/view/admin/index.php';</script>";
                    exit;
                }
            }
        }
    }

    function tambahDataPasien() {
        require "../../../backend/db_conn.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form
            $fname = $_POST['fname'];
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];
            $uLevel = $_POST['uLevel'];
            $data = "fname=".$fname."&uname=".$uname."&email=".$email;
    
            if (empty($fname)) {
                $em = "Full name is required";
                header("Location: ../frontend/view/admin/tambah_data.php';");
                exit;
            }else if(empty($uname)){
                $em = "User name is required";
                header("Location: ../frontend/view/admin/tambah_data.php';");
                exit;
            }else if(empty($pass)){
                $em = "Password is required";
                header("Location: ../frontend/view/admin/tambah_data.php';");
                exit;
            } else if(empty($email)){
                $em = "Password is required";
                header("Location: ../frontend/view/admin/tambah_data.php';");
                exit;
            }else {
        
                // hashing the password
                $pass = password_hash($pass, PASSWORD_DEFAULT);
        
                $sql = "INSERT INTO userdata(username, password, fname, email, u_level) VALUES(?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([$uname, $pass, $fname, $email, $uLevel]);
        
                if($result) {
                    echo "<script>alert('Data berhasil ditambah.');window.location='../frontend/view/admin/index.php';</script>";
                    exit;
                }
            }
        }
    }



?>