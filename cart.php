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
<<<<<<< HEAD
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">
=======
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">
>>>>>>> be4ced13bda61f8b83377e0d31f89ad0b4a5d9ce

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
<<<<<<< HEAD
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
=======
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
>>>>>>> be4ced13bda61f8b83377e0d31f89ad0b4a5d9ce
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


<<<<<<< HEAD
=======
    <!-- Navbar start -->
    <?php
    include "navbar.php";
    ?>
    <!-- Navbar End -->


>>>>>>> be4ced13bda61f8b83377e0d31f89ad0b4a5d9ce
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
<<<<<<< HEAD
                        <input type="search" class="form-control p-3" placeholder="keywords"
                            aria-describedby="search-icon-1">
=======
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
>>>>>>> be4ced13bda61f8b83377e0d31f89ad0b4a5d9ce
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
                            </tbody></table></div></div>
                            
                !!!!!!!!
                <?php
                $email = $_SESSION['email'];
                $userDetail = mysqli_query($conn, "SELECT * FROM user  WHERE email = '$email'");

            while ($userinfo = mysqli_fetch_array($userDetail)) { ?>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4"><h4></h4>
                                
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
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                        name="purchase" type="button">Purchase</button>
                        </form>
                    </div>
                     <?php
            } ?>
                </div>
            </div>
=======
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="img/vegetable-item-3.png" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">Big Banana</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="img/vegetable-item-5.jpg" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">Potatoes</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="img/vegetable-item-2.jpg" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">Awesome Brocoli</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">2.99 $</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                $total = 0;
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) { // Check if $_SESSION['cart'] is set and is an array
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $sr = $key + 1;
                        if (isset($value['Item_name'], $value['price'], $value['Quantity'])) { // Check if required keys exist in $value
                            echo "<tr>
    <td>$sr</td>
    <td>{$value['Item_name']}</td>
    <td>{$value['price']}<input type='hidden' class='iprice' value='{$value['price']}'></td>
    <td>
        <form action='./addtocart.php' method='POST'>
            {$value['Quantity']}<input class='text-center iquantity' name='Mod_Quantity' id='Mod_Quantity' onchange='this.form.submit();' type='hidden' value='{$value['Quantity']}' min='1' max=''>
            <input type='hidden' name='Item_name' value='{$value['Item_name']}'>
        </form>
    </td>
    <td class='itotal'></td>
    <td>
        <form action='./addtocart.php' method='POST'>
            <button name='Remove_Item' class='btn btn-sm btn-danger'>REMOVE</button>
            <input type='hidden' name='Item_name' value='{$value['Item_name']}'>
        </form>
    </td>
</tr>";
                        }
                    }
                }
                ?>
            </div>
            <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0">$96.00</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">Flat rate: $3.00</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Shipping to Ukraine.</p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">$99.00</p>
                        </div>
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">Fruitables</h1>
                            <p class="text-secondary mb-0">Fresh products</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                            <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                        <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link" href="">About Us</a>
                        <a class="btn-link" href="">Contact Us</a>
                        <a class="btn-link" href="">Privacy Policy</a>
                        <a class="btn-link" href="">Terms & Condition</a>
                        <a class="btn-link" href="">Return Policy</a>
                        <a class="btn-link" href="">FAQs & Help</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="btn-link" href="">My Account</a>
                        <a class="btn-link" href="">Shop details</a>
                        <a class="btn-link" href="">Shopping Cart</a>
                        <a class="btn-link" href="">Wishlist</a>
                        <a class="btn-link" href="">Order History</a>
                        <a class="btn-link" href="">International Orders</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>


</tbody>
</table>
</div>

<?php
$email = $_SESSION['email'];
$userDetail = mysqli_query($conn, "SELECT * FROM register  WHERE email = '$email'");

while ($userinfo = mysqli_fetch_array($userDetail)) { ?>
    <div class="col-lg-3 font">
        <div class="border border-success mb-5 border-2 bg-light rounded p-4">
            <h4>Grand Total:</h4>
            <h5 class="text-right" id="gtotal"></h5>
            <?php
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            ?>
                <!--customer details for payment -->

                <form action="./purchase.php" method="POST" class="my-0" enctype="multipart/form-data">
                    <div class="form-group mt-3 mb-3">
                        <b><label>Name: </label></b>
                        <?php echo $userinfo['fname']; ?><input type="hidden" name="fname" id="fname" value="<?php echo $userinfo['fname']; ?>" placeholder="Full Name" class="form-control border-success" required>
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <b><label>Phone: </label></b>
                        <?php echo $userinfo['phone'] ?><input type="hidden" name="phone_no" id="phone_no" value="<?php echo $userinfo['phone'] ?>" placeholder="Phone Number" class="form-control border-success" required>
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <b><label>Address: </label></b>
                        <?php echo $userinfo['address'] ?><input type="hidden" name="address" id="address" value="<?php echo $userinfo['address'] ?>" placeholder="Address" class="form-control border-success" required>
                    </div>
                    <div class="form-group mt-3 mb-3">
                        <input class="form-check-input border-success" checked type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
                        <b><label class="form-check-label" for="flexRadioDefault1">Cash On Delivery
                            </label></b>
                    </div>
                    <button class="btn btn-outline-dark m-auto d-flex justify-content-center" name="purchase">Purchase</button>
                </form>

>>>>>>> be4ced13bda61f8b83377e0d31f89ad0b4a5d9ce
            <?php
            } ?>
        </div>

    </div>
<<<<<<< HEAD
    <script type="text/javascript">
        var gt = 0; //grand total
=======
<?php
} ?>
</div>
</div>

<!-- Add this script at the end of your HTML body -->
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        // Call the subTotal function when the page loads
        subTotal();

        // Add event listeners for quantity input changes
        var quantityInputs = document.getElementsByClassName('iquantity');
        for (var i = 0; i < quantityInputs.length; i++) {
            quantityInputs[i].addEventListener('change', function() {
                subTotal();
            });
        }
    });

    function subTotal() {
        var gt = 0;
>>>>>>> be4ced13bda61f8b83377e0d31f89ad0b4a5d9ce
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

<<<<<<< HEAD
<?php
    include "footer.php";
    ?>
    
=======
        gtotal.innerText = gt.toFixed(2); // Display the total with two decimal places
    }
</script>
<?php
require './footer.php';
?>

>>>>>>> be4ced13bda61f8b83377e0d31f89ad0b4a5d9ce
</body>

</html>