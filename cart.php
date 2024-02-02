<?php
session_start();

include('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <link rel="shortcut icon" href="/img/gaunkoachar.ico" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <?php
    include('navbar.php');
    ?>

    <!-- Navbar End -->


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 mt-5 pt-5">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-4">
                !!!!!!!
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Serial no.</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) { // Check if $_SESSION['cart'] is set and is an array
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $sr = $key + 1;
                                        if (isset($value['item_name'], $value['price'], $value['quantity'])) { // Check if required keys exist in $value
                                            echo "<tr>
                                        <td>$sr</td>
                                        <td>{$value['item_name']}</td>
                                        <td>{$value['price']}<input type='hidden' class='iprice' value='{$value['price']}'></td>
                                        <td>
                                        <form action='addtocart.php' method='POST'>
                                        {$value['quantity']}<input class='iquantity' name='quantity' id='quantity' onchange='this.form.submit();' type='hidden' value='{$value['quantity']}' min='1' max=''>
                                        <input type='hidden' name='item_name' value='{$value['item_name']}'>
                                        </form></td>
                                        <td class='itotal'></td>
                                        <td>
                                        <form action='addtocart.php' method='POST'>
                                        <button name='Remove_Item' class='bbtn btn-md rounded-circle bg-light border mt-4'><i class='fa fa-times text-danger'></i></button>
                                        <input type='hidden' name='item_name' value='{$value['item_name']}'>
                                        </form></td></tr>";
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                !!!!!!!!
                <?php
                $email = $_SESSION['email'];
                $userDetail = mysqli_query($conn, "SELECT * FROM user  WHERE email = '$email'");

                while ($userinfo = mysqli_fetch_array($userDetail)) { ?>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h4></h4>

                                    <?php
                                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                    ?>
                                </div>
                                <form action="./purchase.php" method="POST" class="my-0" enctype="multipart/form-data">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0 me-4">Name:</h5>
                                        <?php echo $userinfo['first_name']; ?><input type="hidden" name="fname" id="fname" value="<?php echo $userinfo['first_name']; ?>" placeholder="Full Name" required>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0 me-4">Phone:</h5>
                                        <?php echo $userinfo['phone'] ?><input type="hidden" name="phone_no" id="phone_no" value="<?php echo $userinfo['phone'] ?>" placeholder="Phone Number" required>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0 me-4">Address:</h5>
                                        <?php echo $userinfo['address'] ?><input type="hidden" name="address" id="address" value="<?php echo $userinfo['address'] ?>" placeholder="Address" required>
                                    </div>
                                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                        <input class="form-check-input border-success" checked type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
                                        <b><label class="form-check-label" for="flexRadioDefault1">Cash On Delivery
                                            </label></b>
                                    </div>
                                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" name="purchase" type="button">Purchase</button>
                                </form>
                            </div>
                        <?php
                                    } ?>
                        </div>
                    </div>
                <?php
                } ?>
            </div>

        </div>
        <script type="text/javascript">
            var gt = 0; //grand total
            var iprice = document.getElementsByClassName('iprice');
            var iquantity = document.getElementsByClassName('iquantity');
            var itotal = document.getElementsByClassName('itotal');
            var gtotal = document.getElementById('gtotal');

            function subTotal() {
                gt = 0;
                for (i = 0; i < iprice.length; i++) {
                    itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                    gt = gt + (iprice[i].value) * (iquantity[i].value);
                    /* price 650 quantity 1      gt=0+(650*1)
                    price 750 quantity 2          gt= 650+(750*2) === gt = 2150
                    price 850 quantity 1          gt= 2150+(850*1)=== gt = 3000 */
                }
                gtotal.innerText = gt;
            }
            subTotal();
        </script>

        <?php
        include "footer.php";
        ?>

</body>

</html>