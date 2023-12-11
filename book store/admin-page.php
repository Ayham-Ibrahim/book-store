<?php
include "includes/Validation/isLoggedin.php";
include "includes/DBConnection.php";
include 'includes/app-entry-point.php';

?>
<?php echo Head('User-Page'); ?>

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: white;height:55px;opacity: 0.9;">
    <div class="container-fluid">
        <a class="navbar-brand me-2" href="">
            <h1 class="logo" style="font-size: 36px;font-weight: 600;font-family: initial;margin-left:20px;margin-top: 5px;color:black;">BookStore</h1>
        </a>
        <!-- ------------------------------- -->
        <button class="navbar-toggler" type="button" onclick="myFunction()" data-mdb-toggle="collapse" data-mdb-target="#mytoggler" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -16px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="31" fill="currentColor" class="bi bi-justify" viewBox="1 1 10 10">
                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <div class="collapse navbar-collapse" id="mytoggler">
            <ul class="home-link navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">
                <a href="add-new-product.php" class="add-pro-btn"><ion-icon name="add-outline" style="font-size:25Spx !important;"></ion-icon> Add New Product</a>
                <a href="add-new-category.php" class="add-pro-btn"><ion-icon name="add-outline" style="font-size:25Spx !important;"></ion-icon> Add New category</a>
                <a href="includes/API/logout.php" class="add-pro-btn">logout</a>
            </ul>
        </div>
    </div>
</nav>
<main class="user_product">
    <div class="container text-center">
        <div class="row gy-5">
            <h3 class="mine fw-bold pb-3" style="letter-spacing: 2px;color: rgb(233, 95, 3);">Our Books</h3>
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input class="search form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
            </form>
            <?php
            $row = SQLQuery("SELECT * FROM `product` ORDER BY `product`.`created_at` DESC");
            ?>

            <?php foreach ($row as $prod) : ?>
                <div class="ProCol col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-img-box">
                                <div class="d-flex product-sale">
                                    <i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
                                </div>
                                <img class="w-100" src="includes\API\imgs\<?php echo $prod['image']; ?>" style="height: 300px;" alt="product-image">
                            </div>
                            <h5 class="card-title" style="margin-top:10px;"><?php echo $prod['name']; ?></h5>
                            <small style="color:red;">
                                <p><?php echo $prod['price']; ?>s.p</p>
                            </small>
                            <div>
                                <a href='includes\API\delete-product.php?id=<?php echo $prod['id']; ?>' class="delete-pro-btn"><i class='fa fa-remove'></i>  remove</a>
                                <a href='update-product.php?id=<?php echo $prod['id']; ?>' class="card-btn">update</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php echo Footer(); ?>