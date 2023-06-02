<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && $_SESSION['ulevel'] == '2') {
    $login = true;
    ?>

<?php    
function getDoktor() {
    require "../../../backend/db_conn.php";
    $sql = "SELECT * FROM doktor where id_user = ?";
    $stmt = $conn->prepare($sql); 
    $stmt->execute([$_SESSION['id']]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
$data['doktor'] = getDoktor();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/doktors.css">
</head>

<body>
    <header id="header-doktor">
        <div class="flex-parent-element">
            <div class="w-20">
                <a href="#" class="logo">weCare</a>
            </div>
            <div class="w-80 pl-10">
                <div class="dropdown">
                    <p class="custom-button-user">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </p>
                    <ul class="dropdown-menu">
                        <li><a href="../../../backend/auth/logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section class="flex-parent-element">
        <div class="w-20">
            <nav id="nav-doktor">
                <ul>
                    <li><a class="nav-doktor-font" href="index.php">Dashboard</a></li>
                    <li><a class="nav-doktor-font" href="request_patient.php">Requested Patient</a></li>
                </ul>
            </nav>
        </div>
        <div class="w-80 p-relative">
            <div class="box-requested-patient">
                    <div class="box-img-doktor">
                        <p style="text-align: left; padding-left: 10px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </p>
                    </div>
                    <div class="box-split-mid" stlye="font-align: center">
                        <div class="box-text-patient">
                            Jumlah Pasien Ditolak
                        </div>
                        <div class="box-text-number">
                            50
                        </div>
                    </div>
                    <div class="box-split-last">
                        <div class="box-text-patient">
                            Jumlah Pasien Ditolak
                        </div>
                        <div class="box-text-number">
                            50
                        </div>
                    </div>
                </div>
                <footer id="footer-doktor">
                    <p>Footer</p>
                </footer>
        </div>
    </section>

</body>

</html>

<?php } else {
    header("Location: ../../../home.php");
    exit;
}?>