<?php
session_start();
include "dbconnect.php";
$product_id = $_GET['product_id'];
$pdetails = mysqli_query($conn, "SELECT * FROM products where product_id = '$product_id'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Shop-Detail</title>
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




    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 mt-5 pt-5">Shop Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop Detail</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Single Product Start -->
    <?php
    // $pdetails = mysqli_query($conn, "SELECT * FROM products where pid = '$pid'");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_name = $_POST["product_name"];
        $product_description = $_POST["product_description"];
        $product_price = $_POST["product_price"];
        $product_image = $_POST["product_image"];
        header("Location:shop.php?product_id=" . $product_id);
    }
    ?>
    <div class="container-fluid py-5 mt-5">
        <?php
        $product_id = $_GET['product_id'];
        $pdetails = mysqli_query($conn, "SELECT * FROM products where product_id = '$product_id'");
        while ($product = mysqli_fetch_assoc($pdetails)) { ?>
            <form class="" method="POST" action="addtocart.php">
                <div class="container py-5">
                    <div class="row g-4 mb-5">
                        <div class="col">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="border rounded">
                                        <a href="#">
                                            <img src="uploads/<?php echo $product['product_image']; ?>" class="img-fluid rounded" alt="Image">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="fw-bold mb-3"><?php echo $product['product_name'] ?></h4>
                                    <h5 class="fw-bold mb-3">Rs. <?php echo $product['product_price']; ?></h5>
                                    <p class="mb-4"><?php echo $product['product_description'] ?></p>
            </form>
            <form method="POST" action="addtocart.php">
                <input type="hidden" name="item_name" value="<?php echo $product['product_name']; ?>">
                <input type="hidden" name="price" value="<?php echo $product['product_price']; ?>">
                <button type="submit" name="Add_To_cart" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                    <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>
            </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<?php } ?>



<!-- Single Product End -->

<?php
include "footer.php";
?>

</body>

</html>