<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking</title>
    <link rel="stylesheet" href="../css/booking.css">
</head>

<body>
    <section class="booking">
        <h1 class="heading-title">book your doctor!</h1>

        <form action="book_form.php" method="post" class="book-form">
            <div class="flex">
                <div class="inputBox">
                    <span>name: </span>
                    <input type="text" placeholder="enter your name" name="name">
                </div>

                <div class="inputBox">
                    <span>email: </span>
                    <input type="email" placeholder="enter your email" name="email">
                </div>

                <div class="inputBox">
                    <span>phone: </span>
                    <input type="number" placeholder="enter your number" name="phone">
                </div>

                <div class="inputBox">
                    <span>address: </span>
                    <input type="text" placeholder="enter your address" name="address">
                </div>

                <div class="inputBox">
                    <span>complaint: </span>
                    <input type="text" placeholder="enter your complaint" name="complaint">
                </div>
            </div>

            <input type="submit" value="submit" class="btn" name="send">
        </form>
    </section>
</body>
</html>