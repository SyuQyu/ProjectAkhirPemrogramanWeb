<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && $_SESSION['ulevel'] == '3') {
    $login = true;
    require '../../../backend/admin.php';
    ?>
<?php 
    $data['pasien'] = getAllPasien();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/admin.css">
</head>

<body>
    <header id="header-admin">
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
            <nav id="nav-admin-pc">
                <ul>
                    <li><a class="nav-admin-font" href="index.php">Dashboard</a></li>
                    <li><a class="nav-admin-font" href="data_doktor.php">Table Doktor</a></li>
                    <li><a class="nav-admin-font" href="data_pasien.php">Table Pasien</a></li>
                </ul>
            </nav>
            <nav id="nav-admin-phone">
                <ul>
                    <li><a class="nav-admin-font" href="index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                            </svg>
                        </a></li>
                    <li><a class="nav-admin-font" href="request_patient.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                        </a></li>
                </ul>
            </nav>
        </div>
        <div class="w-80 p-relative">
            <div class="admin-table">
            <a href="tambah_data_pasien.php"><button class="btn-add">Tambah Data</button></a>
                <table>
                    <thead>
                        <tr>
                            <th><label>No</label></th>
                            <th><label>Username</label></th>
                            <th><label>Full Name</label></th>
                            <th><label>Email</label></th>
                            <th><label>Action</label></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach( $data['pasien'] as $pasien ) : ?>
                            <?php if( $pasien['u_level'] == 1) { ?>
                                <tr>
                                    <td data-label="No"><?= $counter++; ?></td>
                                    <td data-label="Username"><?=$pasien['username'] ?></td>
                                    <td data-label="Full Name"><?=$pasien['fname'] ?></td>
                                    <td data-label="Email"><?=$pasien['email'] ?></td>
                                    <td data-label="Action">
                                        <a href="edit_data_pasien.php?id=<?=$pasien['id'] ?>&uLevel=<?=$pasien['u_level'] ?>"><button class="btn-edit">Edit Data </button></a>
                                        <a href="../../../backend/hapus_data_pasien.php?id=<?=$pasien['id'] ?>&uLevel=<?=$pasien['u_level'] ?>"><button class="btn-delete">Hapus Data </button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <footer id="footer-admin">
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