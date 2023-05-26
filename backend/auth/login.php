<?php 
session_start();

if(isset($_POST['uname']) && isset($_POST['pass'])){

    include "../db_conn.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=".$uname;

    if(empty($uname)){
        $em = "User name is required";
        header("Location: ../../frontend/view/auth/login.php?error=$em&$data");
        exit;
    }else if(empty($pass)){
        $em = "Password is required";
        header("Location: ../../frontend/view/auth/login.php?error=$em&$data");
        exit;
    }else {

        $sql = "SELECT * FROM userdata WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if($stmt->rowCount() == 1){
            $user = $stmt->fetch();

            $username =  $user['username'];
            $password =  $user['password'];
            $fname =  $user['fname'];
            $id =  $user['id'];
            $ulevel =  $user['u_level'];

            if($username === $uname){
                // Hash password sebelum memeriksa
                if(password_verify($pass, $password)){
                    $_SESSION['id'] = $id;
                    $_SESSION['fname'] = $fname;
                    $_SESSION['ulevel'] = $ulevel;
                    if($ulevel == '1') {
                        header("Location: ../../home.php");
                    } else if($ulevel == '2') {
                        header("Location: ../../frontend/view/dokter");
                    }
                    exit;
                }else {
                    $em = "Incorrect User name or password";
                    header("Location: ../../frontend/view/auth/login.php?error=$em&$data&id=$username");
                    exit;
                }

            }else {
                $em = "Incorrect User name or password";
                header("Location: ../../frontend/view/auth/login.php?error=$em&$data&id=$id");
                exit;
            }

        }else {
            $em = "Incorrect User name or password";
            header("Location: ../../frontend/view/auth/login.php?error=$em&$data");
            exit;
        }
    }

}else {
    header("Location: ../../frontend/view/auth/login.php?error=error");
    exit;
}