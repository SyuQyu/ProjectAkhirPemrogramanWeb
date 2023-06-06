<?php 
    function getAllDoktors() {
        require "../../../backend/db_conn.php";
        $sql = "SELECT doktor.id , doktor.id_user, doktor.name, userdata.username, userdata.email from doktor
        inner join userdata on doktor.id_user = userdata.id";
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

    function getDoktor() {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM userdata where id = ?";
        $stmt = $conn->prepare($sql); 
        $stmt->execute([$_GET['id']]);
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function getDoktorId($id) {
        require "../../../backend/db_conn.php";
        $sql = "SELECT * FROM userdata where id = ?";
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    
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

    function tambahDataDoktor() {
        require "../../../backend/db_conn.php";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $harga = $_POST['harga'];
            $spesialis = $_POST['spesialis'];
            $pengalaman = $_POST['experience'];
            $review = $_POST['review'];
            $data = "username=".$username."&password=".$password."&fullname=".$fullname."&email=".$email."&harga=".$harga."&spesialis=".$spesialis."&pengalaman=".$pengalaman."&review=".$review;
    
            if (empty($username)) {
                $em = "Username is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($password)) {
                $em = "Password is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($fullname)) {
                $em = "Full Name is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($email)) {
                $em = "Email is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($harga)) {
                $em = "Price is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($spesialis)) {
                $em = "Spesialis is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($pengalaman)) {
                $em = "Experience is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($review)) {
                $em = "Review is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else {
                // Hashing the password
                $password = password_hash($password, PASSWORD_DEFAULT);
    
                $sql = "INSERT INTO userdata(username, password, fname, email, u_level) VALUES(?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $result = $stmt->execute([$username, $password, $fullname, $email, 2]);
                if ($result) {
                    $lastInsertedId = $conn->lastInsertId();
                    $sqldoktor = "INSERT INTO doktor (id_user, name, review, harga, spesialis, pengalaman) VALUES(?,?,?,?,?,?)";
                    $stmtdoktor = $conn->prepare($sqldoktor);
                    $resultdoktor = $stmtdoktor->execute([$lastInsertedId, $fullname, $review, $harga, $spesialis, $pengalaman]);
                }
            }
        }
    }

    function editDataDoktor() {
        require "../../../backend/db_conn.php";
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mengambil data dari form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $harga = $_POST['harga'];
            $spesialis = $_POST['spesialis'];
            $pengalaman = $_POST['experience'];
            $review = $_POST['review'];
            $data = "username=".$username."&password=".$password."&fullname=".$fullname."&email=".$email."&harga=".$harga."&spesialis=".$spesialis."&pengalaman=".$pengalaman."&review=".$review;
    
            if (empty($username)) {
                $em = "Username is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($password)) {
                $em = "Password is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($fullname)) {
                $em = "Full Name is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($email)) {
                $em = "Email is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($harga)) {
                $em = "Price is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($spesialis)) {
                $em = "Spesialis is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($pengalaman)) {
                $em = "Experience is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else if (empty($review)) {
                $em = "Review is required";
                // header("Location: ./tambah_data_doktor.php");
                exit;
            } else {
                // Hashing the password
                $password = password_hash($password, PASSWORD_DEFAULT);
    
                $sql = "UPDATE userdata SET username = ?, password = ?, fname = ?, email = ? WHERE id = ?";
                $result = $stmt->execute([$username, $password, $fullname, $email, $_GET['id']]);
                $stmt = $conn->prepare($sql);
                if ($result) {
                    $lastInsertedId = $conn->lastInsertId();
                    $sqldoktor = "INSERT INTO doktor (id_user, name, review, harga, spesialis, pengalaman) VALUES(?,?,?,?,?,?)";
                    $stmtdoktor = $conn->prepare($sqldoktor);
                    $resultdoktor = $stmtdoktor->execute([$lastInsertedId, $fullname, $review, $harga, $spesialis, $pengalaman]);
                }
            }
        }
    }
    
    

?>