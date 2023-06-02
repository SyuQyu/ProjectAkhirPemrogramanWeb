<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && $_SESSION['ulevel'] == '2') {
    $login = true;
    require '../../../backend/doktor.php';
    ?>

<?php    

$data['doktor'] = getDoktor();
$data['booking'] = getBooking($data['doktor']['id']);

function getAccepted($id, $bookingData) {
    $accepted = 0;
    $declined = 0;
    if($id == 1) {
        foreach ($bookingData as $booking) {
            if ($booking['accepted'] == 1) {
                $accepted++;
            }
        }
        return $accepted;
    } else {
        foreach ($bookingData as $booking) {
            if ($booking['accepted'] == 0) {
                $declined++;
            }
        }
        return $declined;
    }
}
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
            <article id="article-doktor">
                <div class="custom-boxshadow">
                    <h1>Selamat Datang, <?= $data['doktor']['name']; $_SESSION['id'];?></h1>
                </div>
            </article>
            <div class="box-container-doktor">
                <div class="box-doktor">
                    <div class="box-img-doktor">
                        <p style="text-align: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                            class="bi bi-person-hearts" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M11.5 1.246c.832-.855 2.913.642 0 2.566-2.913-1.924-.832-3.421 0-2.566ZM9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276ZM15 2.165c.555-.57 1.942.428 0 1.711-1.942-1.283-.555-2.281 0-1.71Z" />
                        </svg>
                        </p>
                    </div>
                    <div class="box-text-doktor">
                        <div class="box-text-patient">
                            Jumlah Pasien Memesan
                        </div>
                        <div class="box-text-number">
                            <?= count($data['booking']); ?>
                        </div>
                    </div>
                </div>
                <div class="box-doktor">
                    <div class="box-img-doktor">
                        <p style="text-align: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                            </svg>
                        </p>
                    </div>
                    <div class="box-text-doktor">
                        <div class="box-text-patient">
                            Total Pendapatan
                        </div>
                        <div class="box-text-number">
                            50
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-container-doktor">
                <div class="box-doktor">
                    <div class="box-img-doktor">
                        <p style="text-align: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </p>
                    </div>
                    <div class="box-text-doktor">
                        <div class="box-text-patient">
                            Jumlah Pasien Diterima
                        </div>
                        <div class="box-text-number">
                            <?= getAccepted(1, $data['booking']) ?>
                        </div>
                    </div>
                </div>
                <div class="box-doktor">
                    <div class="box-img-doktor">
                        <p style="text-align: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z"/>
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </p>
                    </div>
                    <div class="box-text-doktor">
                        <div class="box-text-patient">
                            Jumlah Pasien Ditolak
                        </div>
                        <div class="box-text-number">
                            <?= getAccepted(0, $data['booking']) ?>
                        </div>
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