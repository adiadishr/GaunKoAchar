<?php
    include "dbconnect.php";
    ?>
    <?php
    $fname_err = $lname_err = $username_err = $email_err = $address_err = $email_err1 = $phone_err = $phone_err1 = $pass_err = $pass_err1 =$success = null;
    if(isset($_POST['submit'])){
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $username = $_POST['username'];
        $existsSql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $existsSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            echo "Email already Exists";
        }
        else if(empty($fname)){
            $fname_err = "First name cannot be empty";
        }
        else if(empty($lname)){
            $lname_err = "Last name cannot be empty";
        }
        else if(empty($email)){
            $email_err = "Email Field is mandatory";
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_err1 = "Invalid Email";
        }
        else if(empty($phone)){
            $phone_err = "Phone field is empty";
        }
        else if(empty($username)){
            $username_err = "Username field is empty";
        }
        else if(empty($address)){
            $address_err = "Address field is empty";
        }
        else if(!preg_match('/^[0-9]{10}+$/', $phone)){
            $phone_err1 = "Invalid phone number";
        }
        else if(strlen($pass)<8){
            $pass_err = "Atleast 8 characters needed";
        }
        else if($pass !== $cpass){
            $pass_err1 = "Passwords do not match";
        }
        else{
            $sql = "INSERT INTO `user` (`username`,`fname`, `lname`, `email`,`address`, `phone`, `password`) VALUES ('$username','$fname', '$lname', '$email','$address', '$phone', '$pass')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $success = "Signed Up successfully";
                header("Location: login.php");
            }
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Gaun Ko Achar</title>
    <link rel="shortcut icon" href="/img/gaunkoachar.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">
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
    <?php
    if($fname_err!=null){
        ?><style>.fname-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($lname_err!=null){
        ?><style>.lname-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($email_err!=null){
        ?><style>.email-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($username_err!=null){
        ?><style>.username-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($address_err!=null){
        ?><style>.address-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($email_err1!=null){
        ?><style>.email-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($phone_err!=null){
        ?><style>.phone-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($phone_err1!=null){
        ?><style>.phone-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($pass_err!=null){
        ?><style>.pass-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($pass_err1!=null){
        ?><style>.pass-err{display: block;}</style><?php
    }
    ?>
    <?php
    if($success!=null){
        ?><style>.success{display: block;}</style><?php
    }
    ?>
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <a href="index.html"><img src="/img/gaunkoachar.png" style="width: 185px;"
                                                alt="logo"></a>
                                        <h4 class="mt-1 mb-5 pb-1">Register</h4>
                                    </div>
                                    <form>
                                        <p class="mb-5">Sign Up for a New Account</p>
                                        <div class="form-outline mb-4">
                                            <label class="form-label ps-1" for="form2Example11">Username</label>
                                            <input type="text" id="form2Example11" class="form-control mb-2"
                                                placeholder="Enter a valid username" />
                                        </div>
                                        <div>
                                            <label for="fullName" class="col-form-label ps-1">Full Name:</label>
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="firstName"
                                                        placeholder="First Name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="lastName"
                                                        placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label ps-1" for="form2Example11">Email</label>
                                            <input type="email" id="form2Example11" class="form-control mb-2"
                                                placeholder="Enter a valid e-mail" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label ps-1" for="form2Example11">Address</label>
                                            <input type="text" id="form2Example11" class="form-control mb-2"
                                                placeholder="Enter a valid address" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label ps-1" for="form2Example11">Phone Number</label>
                                            <input type="number" id="form2Example11" class="form-control mb-2"
                                                placeholder="Enter a valid phone number" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label ps-1" for="form2Example22">Password</label>
                                            <input type="password" id="form2Example22" class="form-control mb-2"
                                                placeholder="Enter a secure password" />
                                            <input type="password" id="form2Example22" class="form-control mb-2"
                                                placeholder="Repeat Password" />
                                        </div>
                                        <div class="text-center pt-1 mb-1 pb-1">
                                        <input type="submit" name="submit" value="Sign Up"class="btn btn-secondary  btn-block fa-lg me-3 mb-3 w-100">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center login-right">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->
    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="index.html"><i class="fas fa-copyright text-light me-2"></i>Gaun
                            Ko
                            Achar</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed and Maintained By <a class="border-bottom" href="https://project0rbit.com">Antarikshya</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->
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
</html>