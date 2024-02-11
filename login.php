<?php
include "dbconnect.php";

$login = FALSE;
$email_err = $pass_err = '';
$email = ''; // Initialize email variable to prevent clearing email field on form

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Client-side validation
    if (empty($email) || empty($password)) {
        $email_err = "Email is required";
        $pass_err = "Password is required";
    } else {
        // Server-side validation
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "SELECT password FROM user WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                $hashed_password = $user['password'];

                // Comparing hashed entered password with the hashed password from the database
                if (password_verify($password, $hashed_password)) {
                    $login = TRUE;
                    session_start();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['email'] = $email;

                    header("Location: shop.php");
                    exit();
                } else {
                    $pass_err = "Invalid password";
                }
            } elseif ($result->num_rows == 0) {
                $email_err = "User not found";
            } else {
                // Handle unexpected scenario where multiple users are found with the same email
                $email_err = "Unexpected error occurred. Please try again later.";
            }
        } else {
            $email_err = "Invalid email format";
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
    <link rel="icon" href="./img/gaunkoachar.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
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

    <script>
        function validateLoginForm() {
            var email = document.forms["loginForm"]["email"].value;
            var password = document.forms["loginForm"]["password"].value;

            var isError = false;

            if (email == "") {
                document.getElementById("email-err").innerText = "Email is required";
                isError = true;
            }
            if (password == "") {
                document.getElementById("pass-err").innerText = "Password is required";
                isError = true;
            }

            return !isError;
        }
    </script>
</head>

<body>
    <?php if ($login) {
        echo "Logged in Successfully";
    } ?>

    <section class="h-100 gradient-form bg-gray" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <a href="index.php"><img src="./img/gaunkoachar.png" style="width: 150px;" alt="logo"></a>
                                        <h4 class="mt-1 mb-5 pb-1">Login</h4>
                                    </div>

                                    <form id="loginForm" action="login.php" method="POST" onsubmit="return validateLoginForm()">
                                        <p class="mb-5">Please login to your account</p>

                                        <div class="form-outline mb-4">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control mb-2"
                                                placeholder="Enter your email please"
                                                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                                            <p class="error" id="email-err"><?php echo $email_err; ?></p>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control mb-2"
                                                placeholder="Enter your password please" />
                                            <p class="error" id="pass-err"><?php echo $pass_err; ?></p>
                                        </div>
                                            
                                        <div class="text-center pt-1 mb-1 pb-1">
                                        <p><a href="forgot_password.php">Forgot Password?</a></p>
                                    </div>


                                        <div class="text-center pt-1 mb-1 pb-1">
                                            <button id="loginButton" class="btn btn-primary btn-block fa-lg me-3 mb-3 w-100" type="submit" name="login">Login</button>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="register.php"><button type="button"
                                                    class="btn btn-outline-secondary">Create new</button></a>
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

    <!-- Footer and JavaScript libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>