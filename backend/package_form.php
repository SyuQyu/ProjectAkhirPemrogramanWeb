<?php 
    include "./db_conn.php";

    if(isset($_POST['send'])) {
        $iduserdata = $_POST['id_user'];
        $iddokter = $_POST['id_dokter'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $complaint = $_POST['complaint'];

        $query = "INSERT INTO booking (id_user, id_dokter, name, email, phone, address, complaint, needAccepted) VALUES(?,?,?,?,?,?,?,?)";
    	$stmt = $conn->prepare($query);
    	$stmt->execute([$iduserdata, $iddokter, $name, $email, $phone, $address, $complaint, 1]);

        header("Location: ../frontend/view/package.php");
	    exit;
    }