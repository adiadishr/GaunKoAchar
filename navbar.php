	<div class="fixed-top bg-white">
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
				<a href="index.html" class="navbar-brand">
					<h1 class="display-6"><img src="./img/gaunkoachar.png" class="main-logo" /></h1>
				</a>
				<button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
					<span class="fa fa-bars text-primary"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav mx-auto">
						<a href="index.php" class="nav-item nav-link">Home</a>
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
							echo "<a href='login.php' class='my-auto'><i class='fas fa-user fa-2x'></i></a>";
						} else {
							echo "<a href='logout.php' class='position-relative ms-4 my-auto'>
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