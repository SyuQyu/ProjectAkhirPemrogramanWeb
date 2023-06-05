<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && $_SESSION['ulevel'] == '2') {
    $login = true;
    require '../../../backend/doktor.php';
    ?>
<?php 
    $data['doktor'] = getDoktor();
    $data['booking'] = getBooking($data['doktor']['id']);
    if (isset($_GET['accept'])) {
        acceptDeclinePatientBooking($_GET['accept'], $_GET['id'], $_GET['decline']);
        
        // Redirect to the same page to reload
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
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
            <nav id="nav-doktor-pc">
                <ul>
                    <li><a class="nav-doktor-font" href="index.php">Dashboard</a></li>
                    <li><a class="nav-doktor-font" href="request_patient.php">Requested Patient</a></li>
                </ul>
            </nav>
            <nav id="nav-doktor-phone">
                <ul>
                    <li><a class="nav-doktor-font" href="index.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                        </svg>
                    </a></li>
                    <li><a class="nav-doktor-font" href="request_patient.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
                    </a></li>
                </ul>
            </nav>
        </div>
        <div class="w-80 p-relative">
            <div style="overflow-y: scroll; height: auto;">
                <?php foreach( $data['booking'] as $booking ) : ?>
                    <?php if( $booking['needAccepted'] == 1) { ?>
                        <div class="box-requested-patient">
                        <div class="box-img-doktor" style="margin: auto;">
                            <p style="text-align: left; padding-left: 10px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                            </p>
                        </div>
                        <div class="box-split-mid" stlye="font-align: center">
                            <div class="box-text-patient">
                                nama : <?= $booking['name'] ?>
                            </div>
                            <div class="box-text-patient">
                                email : <?= $booking['email'] ?>
                            </div>
                            <div class="box-text-patient">
                                nomor telepon : <?= $booking['phone'] ?>
                            </div>
                            <div class="box-text-patient">
                                alamat : <?= $booking['address'] ?>
                            </div>
                            <div class="box-text-patient">
                                complaint: <?= $booking['complaint'] ?>
                            </div>
                        </div>
                        <div class="box-split-last">
                            <div class="accept-button">
                                <a href="request_patient.php?accept=1&id=<?= $booking['id'] ?>" class="accept-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="decline-button">
                                <a href="request_patient.php?accept=0&id=<?= $booking['id'] ?>&decline=1" class="decline-button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php endforeach; ?>
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