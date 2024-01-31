<?php
session_start();
include '../dbconnect.php';

$product_name = '';
$product_image = 'no-image.jpg';
$product_description = '';

// Edit Products
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_name = $_POST['product_name'];
  $product_image = $_FILES['product_image']['name'];
  $product_price = $_POST['product_price'];
  $product_description = $_POST['product_description'];
  $product_stock = $_POST['product_stock'];

  try {

    // Code to Upload FIles
    $target_path =  "uploads/products/";
    $target_path = $target_path . basename($_FILES['product_image']['name']);

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_path)) {
      '<script>console.log("File uploaded successfully!");</script>';
    } else {
      '<script>console.log("Sorry, file not uploaded, please try again!");</script>';
    }
    // Code to Upload Files

    $query = mysqli_query($conn, "INSERT INTO products (`product_name`, `product_image`, `product_description`, `product_price`, `product_stock`) values ('$product_name', '$product_image', '$product_description', '$product_price', '$product_stock' )");
  } catch (Exception $e) {
    $message = 'Unable to add new product.' . $e;
    throw new Exception('Unable to save details. Please try again later.', 0, $e);
  }

  if ($mysqli->affected_rows == 0) {
    echo '<script>alert("Cannot Add Product");</script>';
    header("Location:../admin/add-product.php");
  } else {
    echo '<script>alert("Product Added Succesfully");window.location.href="./dashboard.php";</script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>GaunKoAchar | Add new product</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../assets/css/bootstrap.css" />
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  

  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css" />

  <link rel="icon" type="image/x-icon" href="../img/gaunkoachar.png"/>

</head>

<body>
  <?php
  include '../includes/aside.php';
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container d-flex justify-content-center">
        <b class="font">
          <h1>Add New Product</h1>
        </b>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">

        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body font">
        <form method="POST" id="ProductDetails" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6 col-lg-6">
              <label>Product Name</label>
              <input type="text" name="product_name" id="product_name" class="form-control border-1 border-secondary" value="" required placeholder="Product_name">
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label>image URL</label>
              <input type="file" name="product_image" id="image" class="form-control border-1 border-secondary" required placeholder="image URL">
            </div>

            <div class="form-group col-sm-4">
              <label>Price</label>
              <input type="number" name="product_price" id="price" required placeholder="Price" class="form-control border-1 border-secondary">
              </div>

            <div class="form-group col-md-8 col-lg-12">
              <label>Description:</label>
              <textarea name="product_description" id="description" cols="10" rows="5" class="form-control border-1 border-secondary" required placeholder="Product Description"></textarea>
            </div>

            <!-- <div class="form-group col-sm-4">
              <label>Is Active</label>
              <select name="isActive" required autocomplete="off" class="form-control border-1 border-secondary combobox" id="isActive">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div> -->

           <!--  <div class="form-group col-sm-4">
              <label>Is Featured</label>
              <select name="isFeatured" required autocomplete="off" class="form-control border-1 border-secondary combobox" id="isFeatured">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
              </select>
            </div> -->

            <div class="form-group col-sm-4">
              <label>Stock</label>
              <input type="number" name="product_stock" id="stock" required placeholder="Stock" class="form-control border-1 border-secondary">
            </div>

            <div class="form-group col-md-12">
              <input type="submit" value="ADD" name="submit_prod" id="submit" class="btn bg-dark text-white" />
              <input type="reset" value="RESET" name="" id="submit" class="btn bg-purple" />
            </div>
          </div>
        </form>
      </div>
    </section>
  </div>
  <?php
  require '../footer.php'; ?>
</body>

</html>