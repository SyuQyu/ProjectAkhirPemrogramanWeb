<?php 

if(isset($_POST['fname']) && isset($_POST['uname']) && isset($_POST['pass'])){

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
	$email = $_POST['email'];

    $data = "fname=".$fname."&uname=".$uname."&email=".$email;
    
    if (empty($fname)) {
    	$em = "Full name is required";
    	header("Location: ../../frontend/view/auth/register.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../../frontend/view/auth/register.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../../frontend/view/auth/register.php?error=$em&$data");
	    exit;
    } else if(empty($email)){
    	$em = "Password is required";
    	header("Location: ../../frontend/view/auth/register.php?error=$em&$data");
	    exit;
    }else {

    	// hashing the password
    	$pass = password_hash($pass, PASSWORD_DEFAULT);

    	$sql = "INSERT INTO userdata(username, password, fname, email, u_level) VALUES(?,?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$uname, $pass, $fname, $email, '1']);

    	header("Location: ../../frontend/view/auth/register.php?success=Your account has been created successfully");
	    exit;
    }


}else {
	header("Location: ../../frontend/view/auth/register.php?error=error");
	exit;
}