<?php
session_start();
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white flex-column border-0">
        <div class="container-fluid">
            <div class="container px-4 w-75">
                <div class="navbar-brand">
                    <a href="./index.php"><img class="img-fluid" width="18%" src="./assets/images/logos/strumo.png" href="./index.php" alt="Strumo" /></a>
                    <a class="navbar-brand text-dark a" style="font-family:'Trebuchet MS'; font-size:37px;" href="./index.php"><strong class="hov">STRUMO</strong></a>
                </div>
            </div>
            <div class="container w-75" style="font-family:'Lora', serif; font-size:14px;">
                <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Menu-->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-3 mb-lg-0 ms-lg-4 text-dark">
                        <li class="nav-item dropdown dropdown position-static">
                            <a class="nav-link " href="./index.php">
                                <h6>Home</h6>
                            </a>
                            <!-- / Menswear dropdown menu-->
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <h6>Categories</h6>
                            </a>
                            <ul class="dropdown-menu border-1 border-dark p-2 bg-white">
                                <li>
                                    <a class="dropdown-item" href="./acoustic.php">Acoustic</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./bass.php">Bass</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./electric.php">Electric</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./ukulele.php">Ukulele</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./classical.php">Classical</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="./semi.php">Semi-Acoustic</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="./products.php">
                                <h6>Products</h6>
                            </a>
                        </li>

                        <li class="d-none d-sm-block">
                            <span class="nav-link search-trigger cursor-pointer">
                                <h6><i class="ri-search-line ri-lg"></i></h6>
                            </span>
                            <!-- Search navbar overlay-->
                            <div class="navbar-search d-none">
                                <form method="GET" action="./psearch.php">
                                    <div class="input-group mb-3 h-100">
                                        <span class="input-group-text mt-5 px-4 bg-transparent border-0"><i class="ri-search-line ri-lg"></i></span>
                                        <input type="text" value="<?php if (isset($_GET['search'])) {
                                                                        echo $_GET['search'];
                                                                    } ?>" name="search" class=" mt-5 form-control text-body bg-transparent border-0" placeholder="Enter your search terms..." />
                                        <span class="input-group-text mt-5 cursor-pointer disable-child-pointer close-search bg-transparent border-0"><i class="ri-close-circle-line ri-lg"></i></span>
                                    </div>
                                </form>
                            </div>
                            <div class="search-overlay"></div>
                            <!-- / Search navbar overlay-->
                        </li>
                        <!-- /Navbar Search-->

                        <!-- Navbar Login-->
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<a class="nav-link"><h6>' . $_SESSION['username'];
                                '</h6></a>';
                            } else {
                                echo '<a class="nav-link" href="./login.php">
                                <h6>Login</h6>
                            </a>';
                            }
                            ?>
                            </h6></a>
                        </li>
                        <!-- /Navbar Login-->
                        <li class="nav-item">
                            <!-- <a class="nav-link a text-light px-4" href="./logout.php"><b class=" hov"> -->
                            <?php if (isset($_SESSION['username'])) {
                                echo '<div class="dropdown">
                                <a class="nav-link " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <h6><i class="bi bi-gear text-dark"></i>

                                </h6></a>
                                <div class="dropdown-menu border-secondary" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="./useredit.php">Edit Profile</a>
                                    <a class="dropdown-item" href="./logout.php">Logout</a>
                                </div>
                            </div>';
                            }
                            ?>
                            </h6></a>
                        </li>

                        <!-- Navbar Cart Icon-->
                        <li class="nav-item">
                            <div class="dropdown-toggle text-white">
                                <?php
                                $count = 0;
                                if (isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                }
                                if (isset($_SESSION['username'])) {
                                    echo '<a class="nav-link" href="./mycart.php" id="addtocartbtn"><h6><i class="bi-cart"></i>' . '<sup>' . $count . '</sup>';
                                    '</h6></a>';
                                }
                                ?></h6></a>
                            </div>
                        </li>
                    </ul>
                    <!-- / Menu-->
                </div>
                <!-- / Main Navigation-->
            </div>
        </div>

    </nav>
</header>