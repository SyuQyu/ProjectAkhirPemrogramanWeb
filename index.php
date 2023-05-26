<?php require 'backend/constants.php';?>
<?php require_once 'frontend/view/template/header.php';?>
    <!-- Hero starts-->
    <div class="hero">
        <div class="overlay"></div>
        <div class="hero-section">

            <p class="p-hero-selection">We Care About Your Health</p>
            <h1 class="h1-hero-selection">Bersama Menuju Kesehatan</h1>
            <button class="p-hero-selection">Discover Tour</button>
        </div>
    </div>

    <!-- Hero ends-->

    <!-- Services starts-->
    <div id="services">
        <h1 class="heading-title">Our Services</h1>
        <div class="box-container">
            <div class="box">
                <img src="./frontend/assets/images/icons8-general-60.png" alt="">
                <h4>General</h4>
            </div>
            <div class="box">
                <img src="./frontend/assets/images/icons8-dog-60.png" alt="">
                <h4>Veterinarian</h4>
            </div>
            <div class="box">
                <img src="./frontend/assets/images/icons8-dermatology-60.png" alt="">
                <h4>Dermatologist</h4>
            </div>
            <div class="box">
                <img src="./frontend/assets/images/icons8-counselor-60.png" alt="">
                <h4>Psychiatrist</h4>
            </div>
            <div class="box">
                <img src="./frontend/assets/images/icons8-dots-60.png" alt="">
                <h4>And More</h4>
            </div>
        </div>
    </div>
	<?php require_once 'frontend/view/homeAbout.php';?>
	<?php require_once 'frontend/view/homePackage.php';?>
    <!-- Services Ends-->
    <!-- Offer Starts-->
    <div class="offer">
        <div class="content">
            <h1>Special Offer!</h1>
            <h3>Up to 20% Off</h3>
            <p>Enter your email to receive a 20% discount coupon to use on your first purchase</p>
            <button>More Info</button>
        </div>
    </div>
    <!-- Offer Ends -->
    <!-- Review Starts -->
    <?php require_once 'frontend/view/reviews.php';?>
    <!-- Review Ends -->
<?php require_once 'frontend/view/template/footer.php';?>
