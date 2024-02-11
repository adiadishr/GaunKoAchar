<?php
include "dbconnect.php";

$fname_err = $lname_err = $username_err = $email_err = $address_err = $email_err1 = $phone_err = $phone_err1 = $pass_err = $pass_err1 = $success = null;

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpass'];

    // SQL Injection Prevention
    $existsSql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($existsSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Password Hashing
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    if ($result->num_rows > 0) {
        $email_err = "Email already exists";
    } elseif (empty($fname)) {
        $fname_err = "First name cannot be empty";
    } elseif (empty($lname)) {
        $lname_err = "Last name cannot be empty";
    } elseif (empty($email)) {
        $email_err = "Email Field is mandatory";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err1 = "Invalid Email";
    } elseif (empty($phone)) {
        $phone_err = "Phone field is empty";
    } elseif (empty($username)) {
        $username_err = "Username field is empty";
    } elseif (empty($address)) {
        $address_err = "Address field is empty";
    } elseif (!preg_match('/^[0-9]{10}+$/', $phone)) {
        $phone_err1 = "Invalid phone number";
    } elseif (strlen($pass) < 8) {
        $pass_err = "At least 8 characters needed";
    } elseif ($pass !== $cpass) {
        $pass_err1 = "Passwords do not match";
    } else {
        $sql = "INSERT INTO `user` (`username`,`first_name`, `last_name`, `email`,`address`, `phone`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $username, $fname, $lname, $email, $address, $phone, $hashed_password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $success = "Signed Up successfully";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gaun Ko Achar</title>
    <style>
        .error {
            color: red;
        }
    </style>
    <link rel="shortcut icon" href="/img/gaunkoachar.png" type="image/x-icon">
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

    <script>
        function validateForm() {
            var fname = document.forms["signupForm"]["first_name"].value;
            var lname = document.forms["signupForm"]["last_name"].value;
            var email = document.forms["signupForm"]["email"].value;
            var address = document.forms["signupForm"]["address"].value;
            var phone = document.forms["signupForm"]["phone"].value;
            var username = document.forms["signupForm"]["username"].value;
            var pass = document.forms["signupForm"]["password"].value;
            var cpass = document.forms["signupForm"]["cpass"].value;

            var isError = false;

            if (fname == "") {
                document.getElementById("fname-err").innerText = "First name cannot be empty";
                isError = true;
            }
            if (lname == "") {
                document.getElementById("lname-err").innerText = "Last name cannot be empty";
                isError = true;
            }
            if (email == "") {
                document.getElementById("email-err").innerText = "Email Field is mandatory";
                isError = true;
            } else if (!validateEmail(email)) {
                document.getElementById("email-err1").innerText = "Invalid Email";
                isError = true;
            }
            if (phone == "") {
                document.getElementById("phone-err").innerText = "Phone field is empty";
                isError = true;
            } else if (!validatePhone(phone)) {
                document.getElementById("phone-err1").innerText = "Invalid phone number";
                isError = true;
            }
            if (username == "") {
                document.getElementById("username-err").innerText = "Username field is empty";
                isError = true;
            }
            if (address == "") {
                document.getElementById("address-err").innerText = "Address field is empty";
                isError = true;
            }
            if (pass == "") {
                document.getElementById("pass-err").innerText = "Password field is empty";
                isError = true;
            }
            if (pass.length < 8) {
                document.getElementById("pass-err").innerText = "At least 8 characters needed";
                isError = true;
            }
            if (cpass == "") {
                document.getElementById("cpass-err").innerText = "Confirm Password field is empty";
                isError = true;
            }
            if (pass != cpass) {
                document.getElementById("cpass-err").innerText = "Passwords do not match";
                isError = true;
            }

            if (isError) {
                return false;
            }
        }

        function validateEmail(email) {
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        function validatePhone(phone) {
            var re = /^[0-9]{10}$/;
            return re.test(phone);
        }
    </script>

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
                                        <a href="index.php"><img src="./img/gaunkoachar.png" style="width: 150px;" alt="logo"></a>
                                        <h4 class="mt-1 mb-5 pb-1">Register</h4>
                                    </div>

                                    <form name="signupForm" id="signupForm" action="register.php" method="POST" onsubmit="return validateForm()">
                                        <p class="mb-5">Sign Up for a New Account</p>
                                        <div class="success">
                                            <p class="success"><?php echo $success?></p>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control mb-2" placeholder="Enter a valid username" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>"/>
                                            <p class="error" id="username-err"><?php echo $username_err ?></p>
                                        </div>

                                        <div>
                                            <label for="fullName">Full Name:</label>
                                            <div class="row mb-4">
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="first_name" id="first_name"
                                                        placeholder="First Name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name'];?>">
                                                    <p class="error" id="fname-err"><?php echo $fname_err ?></p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name'];?>">
                                                    <p class="error" id="lname-err"><?php echo $lname_err ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email"  aria-describedby="emailHelp" class="form-control mb-2"
                                                placeholder="Enter a valid e-mail" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" />
                                            <p class="error" id="email-err"><?php echo $email_err ?></p>
                                            <p class="error" id="email-err1"><?php echo $email_err1 ?></p>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address" class="form-control mb-2" placeholder="Enter a valid address" value="<?php if(isset($_POST['address'])) echo $_POST['address'];?>"/>
                                            <p class="error" id="address-err"><?php echo $address_err ?></p>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" name="phone" id="phone" class="form-control mb-2"
                                                placeholder="Enter a valid phone number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" />
                                            <p class="error" id="phone-err"><?php echo $phone_err ?></p>
                                            <p class="error" id="phone-err1"><?php echo $phone_err1 ?></p>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control mb-2"
                                                placeholder="Enter a secure password" value="<?php if(isset($_POST['password'])) echo $_POST['password'];?>"/>
                                            <p class="error" id="pass-err"><?php echo $pass_err ?></p>
                                            <input type="password" name="cpass" id="cpass" class="form-control mb-2"
                                                placeholder="Repeat Password" />
                                            <p class="error" id="cpass-err"><?php echo $pass_err1 ?></p>
                                        </div>

                                        <div class="text-center pt-1 mb-1 pb-1">
                                            <input type="submit" name="submit" value="Sign Up" class="btn btn-secondary  btn-block fa-lg me-3 mb-3 w-100">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Already member?</p>
                                            <a href="login.php"><button type="button"
                                                    class="btn btn-outline-secondary">Login Here</button></a>
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
                    <span class="text-light"><a href="index.php"><i class="fas fa-copyright text-light me-2"></i>Gaun
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