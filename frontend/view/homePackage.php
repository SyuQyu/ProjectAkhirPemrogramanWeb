<?php
function getAllDoktor() {
    require "./backend/db_conn.php";
    $sql = "SELECT * FROM doktor";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
$data['doktor'] = getAllDoktor();
?>
?>

<section class="home-packages">
    <h1 class="heading-title">top destinations</h1>
    <div class="box-container w-100">
        <?php
                $counter = 0;
                foreach ($data['doktor'] as $doktor) {
                    if ($counter >= 4) {
                        break;
                    }
                    ?>
                    <div class="box">
                        <div class="image">
                            <img src="./frontend/assets/images/img-1.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3><?= $doktor['name'] ?></h3>
                            <p><?= $doktor['review'] ?></p>
                            <p><?= $doktor['harga'] ?></p>
                            <p><?= $doktor['spesialis'] ?></p>
                            <p><?= $doktor['pengalaman'] ?></p>
                            <a href="./frontend/view/booking.php?idDoktor=<?= $doktor['id'] ?>" class="btn">book now</a>
                        </div>
                    </div>
                <?php
            $counter++;
            }
        ?>
    </div>
    <div class="load-more w-100"><a href="./frontend/view/package.php" class="btn">load more</a></div>
</section>
<script src="frontend\js\script.js"></script>