<section class="">
    <div class="container px-4 px-lg-5 mt-0">
        <div class="row gx-4 gx-lg-5 mt-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <!-- Products -->
            <?php while ($featuredProd = mysqli_fetch_array($featuredProducts)) { ?>
                <div class="col mb-5 zoom">
                    <div class="border-1 border-secondary card h-100 rounded-3">
                        <form action="" method="POST">
                            <!-- Product image-->

                            <img class="card-img-top mb-2" src="admin/uploads/products/<?php echo $featuredProd['photo']; ?>" alt="" />
                            <span class="d-flex m-auto justify-content-center fw-bold text-muted"><?php echo $featuredProd['brand']; ?></span>

                            <!-- Product details-->
                            <div class="card-body p-0">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="font fw-bold">
                                        <?php echo $featuredProd['name']; ?>
                                    </h5>
                                    <!-- Product price-->
                                    Rs. <?php echo $featuredProd['price']; ?>

                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center card-footer border-top-0 bg-transparent">
                                <div class="btn-group-sm mb-1">
                                    <a href="p_details.php?pid=<?php echo $featuredProd["productid"]; ?>" class="btn btn-dark btn-group-sm text-light font">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>