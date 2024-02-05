<?php
session_start();
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

	<!-- Navbar start -->
	<div class="fixed-top">
		<div class="topbar bg-primary">
			<div class="d-flex justify-content-between">
				<div class="top-info ps-2">
					<small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">Kathmandu, Nepal</a></small>
					<small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">gaunkoachar@gmail.com</a></small>
				</div>
				<div class="top-link pe-2">
					<small class="me-3"><i class="fas fa-phone-alt me-2 text-secondary"></i> <a href="#" class="text-white">+977 9843011770</a></small>
				</div>
			</div>
		</div>
		<div class="container px-0">
			<nav class="navbar navbar-light navbar-expand-xl">
				<a href="index.php" class="navbar-brand">
					<h1 class="display-6"><img src="./img/gaunkoachar.png" class="main-logo" /></h1>
				</a>
				<button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
					<span class="fa fa-bars text-primary"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav mx-auto">
						<a href="index.php" class="nav-item nav-link active">Home</a>
						<a href="shop.php" class="nav-item nav-link">Shop</a>
						<a href="ourstory.php" class="nav-item nav-link">Our Story</a>
						<!-- <div class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
							<div class="dropdown-menu m-0 bg-secondary rounded-0">
								<a href="cart.html" class="dropdown-item">Cart</a>
								<a href="cart.html" class="dropdown-item">Chackout</a>
								<a href="testimonial.html" class="dropdown-item">Testimonial</a>
								<a href="404.html" class="dropdown-item">404 Page</a>
							</div>
						</div> -->
						<a href="contact.php" class="nav-item nav-link">Contact</a>
						<a href="cart.php" class="nav-item nav-link">Checkout</a>
					</div>
					<div class="d-flex p-3 me-0">
						<button class="btn-search btn btn-md-square rounded-circle me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-2x fa-search text-primary"></i></button>
						<a href="cart.php" class="position-relative me-4 my-auto">
							<i class="fa fa-shopping-bag fa-2x"></i>
							<span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
						</a>
						<?php
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
							$loggedin = true;
						} else {
							$loggedin = false;
						}
						if (!$loggedin) {
							echo "<a href='login.php' class='my-auto'><button type='button' class='btn btn-primary'>Log In</button></a>";
						} else {
							echo "<a href='logout.php' class='position-relative ms-3 my-auto'>
							<i class='fas fa-solid fa-right-from-bracket fa-2x'></i></a>";
						}
						?>
						<a>
							<?php if (isset($_SESSION['email'])) {
								echo
								'<a class="nav-link px-4">
						<b class="hov"><i class="bi bi-person"></i>' . " " . $_SESSION['email'];
								'</b></a>';
							}
							?>
						</a>
					</div>
				</div>
			</nav>
		</div>
	</div>
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


	<!-- Hero Start -->
	<div class="container-fluid py-5 mb-5 hero-header">
		<div class="container py-5">
			<div class="row g-5 align-items-center">

				<div class="col col-lg-7">
					<h4 class="mb-3 text-secondary">गाउँको अचार</h4>
					<h1 class="mb-5 display-3 text-primary">Authentic, and Handcrafted to Perfection</h1>
					<div class="position-relative mx-auto">
						<?php if (isset($_SESSION['email'])) {
							echo '<a href="./shop.php" class="btn btn-primary border-2 border-secondary position-absolute rounded-pill text-white py-3 px-5">Shop Now</a>';
						} else {
							echo '<a href="./login.php" class="btn btn-primary border-2 border-secondary position-absolute rounded-pill text-white py-3 px-5">Shop Now</a>';
						} ?>
					</div>
				</div>
				<!-- <div class="col-md-12 col-lg-5">
					<div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active rounded">
								<img src="img/hero-img-1.png" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
								<a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
							</div>
							<div class="carousel-item rounded">
								<img src="img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
								<a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
							</div>
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<!-- Hero End -->


	<!-- Featurs Section Start -->
	<div class="container-fluid featurs py-5">
		<div class="container py-5">
			<div class="row g-4">
				<div class="col-md-6 col-lg-3">
					<div class="featurs-item text-center rounded bg-light p-4">
						<div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
							<i class="fas fa-motorcycle fa-3x text-white"></i>
						</div>
						<div class="featurs-content text-center">
							<h5>Free Shipping</h5>
							<p class="mb-0">Free on order over Rs.5000</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="featurs-item text-center rounded bg-light p-4">
						<div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
							<i class="fas fa-user-shield fa-3x text-white"></i>
						</div>
						<div class="featurs-content text-center">
							<h5>Secure Payment</h5>
							<p class="mb-0">100% secure payment</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="featurs-item text-center rounded bg-light p-4">
						<div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
							<i class="fas fa-leaf fa-3x text-white"></i>
						</div>
						<div class="featurs-content text-center">
							<h5>100% organic </h5>
							<p class="mb-0">No preservatives used</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="featurs-item text-center rounded bg-light p-4">
						<div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
							<i class="fa fa-phone-alt fa-3x text-white"></i>
						</div>
						<div class="featurs-content text-center">
							<h5>24/7 Support</h5>
							<p class="mb-0">Support every time fast</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Featurs Section End -->

	<!-- Vesitable Shop Start-->
	<div class="container-fluid vesitable py-5">
		<div class="container py-5">
			<h1 class="mb-0">Fresh Organic Vegetables</h1>
			<div class="owl-carousel vegetable-carousel justify-content-center">
				<div class="border border-primary rounded position-relative vesitable-item">
					<div class="vesitable-img">
						<img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
					</div>
					<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
					<div class="p-4 rounded-bottom">
						<h4>Parsely</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
						<div class="d-flex justify-content-between flex-lg-wrap">
							<p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
							<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
						</div>
					</div>
				</div>
				<div class="border border-primary rounded position-relative vesitable-item">
					<div class="vesitable-img">
						<img src="img/vegetable-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
					</div>
					<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
					<div class="p-4 rounded-bottom">
						<h4>Parsely</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
						<div class="d-flex justify-content-between flex-lg-wrap">
							<p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
							<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
						</div>
					</div>
				</div>
				<div class="border border-primary rounded position-relative vesitable-item">
					<div class="vesitable-img">
						<img src="img/vegetable-item-3.png" class="img-fluid w-100 rounded-top bg-light" alt="">
					</div>
					<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
					<div class="p-4 rounded-bottom">
						<h4>Banana</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
						<div class="d-flex justify-content-between flex-lg-wrap">
							<p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
							<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
						</div>
					</div>
				</div>
				<div class="border border-primary rounded position-relative vesitable-item">
					<div class="vesitable-img">
						<img src="img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
					</div>
					<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
					<div class="p-4 rounded-bottom">
						<h4>Bell Papper</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
						<div class="d-flex justify-content-between flex-lg-wrap">
							<p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
							<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
						</div>
					</div>
				</div>
				<div class="border border-primary rounded position-relative vesitable-item">
					<div class="vesitable-img">
						<img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
					</div>
					<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
					<div class="p-4 rounded-bottom">
						<h4>Potatoes</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
						<div class="d-flex justify-content-between flex-lg-wrap">
							<p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
							<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
						</div>
					</div>
				</div>
				<div class="border border-primary rounded position-relative vesitable-item">
					<div class="vesitable-img">
						<img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
					</div>
					<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
					<div class="p-4 rounded-bottom">
						<h4>Parsely</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
						<div class="d-flex justify-content-between flex-lg-wrap">
							<p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
							<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
						</div>
					</div>
				</div>
				<div class="border border-primary rounded position-relative vesitable-item">
					<div class="vesitable-img">
						<img src="img/vegetable-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
					</div>
					<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
					<div class="p-4 rounded-bottom">
						<h4>Potatoes</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
						<div class="d-flex justify-content-between flex-lg-wrap">
							<p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
							<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
						</div>
					</div>
				</div>
				<div class="border border-primary rounded position-relative vesitable-item">
					<div class="vesitable-img">
						<img src="img/vegetable-item-6.jpg" class="img-fluid w-100 rounded-top" alt="">
					</div>
					<div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
					<div class="p-4 rounded-bottom">
						<h4>Parsely</h4>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
						<div class="d-flex justify-content-between flex-lg-wrap">
							<p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
							<a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Vesitable Shop End -->


	<!-- Banner Section Start-->
	<div class="container-fluid banner bg-secondary my-5">
		<div class="container py-5">
			<div class="row g-4 align-items-center">
				<div class="col-lg-6">
					<div class="py-4">
						<h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
						<p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
						<p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition
							injected humour, or non-characteristic words etc.</p>
						<a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">Shop Now</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="position-relative">
						<img src="img/baner-1.png" class="img-fluid w-100 rounded" alt="">
						<div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
							<h1 style="font-size: 100px;">1</h1>
							<div class="d-flex flex-column">
								<span class="h2 mb-0">50$</span>
								<span class="h4 text-muted mb-0">kg</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Banner Section End -->

	<!-- Tastimonial Start -->
	<div class="container-fluid testimonial py-5">
		<div class="container py-5">
			<div class="testimonial-header text-center">
				<h4 class="text-primary">Our Testimonial</h4>
				<h1 class="display-5 mb-5 text-dark">Our Client Saying!</h1>
			</div>
			<div class="owl-carousel testimonial-carousel">
				<div class="testimonial-item img-border-radius bg-light rounded p-4">
					<div class="position-relative">
						<i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
						<div class="mb-4 pb-4 border-bottom border-secondary">
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
								industry's standard dummy text ever since the 1500s,
							</p>
						</div>
						<div class="d-flex align-items-center flex-nowrap">
							<div class="bg-secondary rounded">
								<img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
							</div>
							<div class="ms-4 d-block">
								<h4 class="text-dark">Client Name</h4>
								<p class="m-0 pb-3">Profession</p>
								<div class="d-flex pe-5">
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="testimonial-item img-border-radius bg-light rounded p-4">
					<div class="position-relative">
						<i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
						<div class="mb-4 pb-4 border-bottom border-secondary">
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
								industry's standard dummy text ever since the 1500s,
							</p>
						</div>
						<div class="d-flex align-items-center flex-nowrap">
							<div class="bg-secondary rounded">
								<img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
							</div>
							<div class="ms-4 d-block">
								<h4 class="text-dark">Client Name</h4>
								<p class="m-0 pb-3">Profession</p>
								<div class="d-flex pe-5">
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="testimonial-item img-border-radius bg-light rounded p-4">
					<div class="position-relative">
						<i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
						<div class="mb-4 pb-4 border-bottom border-secondary">
							<p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
								industry's standard dummy text ever since the 1500s,
							</p>
						</div>
						<div class="d-flex align-items-center flex-nowrap">
							<div class="bg-secondary rounded">
								<img src="img/testimonial-1.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
							</div>
							<div class="ms-4 d-block">
								<h4 class="text-dark">Client Name</h4>
								<p class="m-0 pb-3">Profession</p>
								<div class="d-flex pe-5">
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
									<i class="fas fa-star text-primary"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Tastimonial End -->

	<!-- FAQ Section Start -->

	<div class="container-xl mx-auto mb-5">
		<h1 class="display-5 mb-3 text-primary text-center">FAQ</h1>
		<p class="text-center mb-5">
			Find the answers for the most frequently asked questions below
		</p>

		<div class="row px-5">
			<div class="col-md-6 mb-4">
				<h6 class="mb-3 text-primary"><i class="far fa-plus fw-bolder text-primary pe-2"></i>Are pickles good for your health?
				</h6>
				<p>
					<strong><u>Absolutely!</u></strong> Pickles can be a healthy snack in moderation. They are low in calories and a source of probiotics, which can be beneficial for gut health.
				</p>
			</div>

			<div class="col-md-6 mb-4">
				<h6 class="mb-3 text-primary"><i class="fas fa-pen-alt text-primary pe-2"></i> So, how are they made?</h6>
				<p>
					<strong>Pickles are made through a process called pickling,</strong> , where vegetables are soaked in a brine solution of mustard oil and loaded full of flavour and spices!
				</p>
			</div>

			<div class="col-md-6 mb-4">
				<h6 class="mb-3 text-primary"><i class="fas fa-user text-primary pe-2"></i> Are they available in stores?
				</h6>
				<p>
					<strong>Of Course!</strong>
				</p>
			</div>

			<div class="col-md-6 mb-4">
				<h6 class="mb-3 text-primary"><i class="fas fa-rocket text-primary pe-2"></i> Any added preservatives / chemicals?
				</h6>
				<p>
					<strong>Not at all!</strong> Our commitment to authenticity and traditional methods means that we take pride in offering preservative-free pickles.
				</p>
			</div>

			<!-- <div class="col-md-6 col-lg-4 mb-4">
				<h6 class="mb-3 text-primary"><i class="fas fa-home text-primary pe-2"></i> A simple
					question?
				</h6>
				<p><strong><u>Unfortunately no</u>.</strong> We do not issue full or partial refunds for any
					reason.</p>
			</div>

			<div class="col-md-6 col-lg-4 mb-4">
				<h6 class="mb-3 text-primary"><i class="fas fa-book-open text-primary pe-2"></i> Another
					question that is longer than usual</h6>
				<p>
					Of course! We’re happy to offer a free plan to anyone who wants to try our service.
				</p>
			</div> -->
		</div>
	</div>

	<!-- FAQ Section End -->

	<?php
	include "footer.php";
	?>

</body>

</html>