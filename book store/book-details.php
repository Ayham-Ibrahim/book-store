<?php
include "includes/Validation/isLoggedin.php";
include "includes/DBConnection.php";
include 'includes/app-entry-point.php';

$ID = $_GET['id'];
$books = SQLQuery("SELECT * FROM product WHERE id=$ID");

?>

<?php echo Head('User-Page'); ?>
<nav class="UserNav navbar navbar-expand-lg fixed-top" id="scroll-navbar" style="transition: all 0.3s ease-in-out;">
    <div class="container-fluid">
        <h1 style="color:black; font-size: 36px;font-weight: 600;font-family: initial;margin-left:20px;margin-top: 5px;">BookStore</h1>
        <!-- ------------------------------- -->
        <button class="navbar-toggler" type="button" onclick="myFunction()" data-mdb-toggle="collapse" data-mdb-target="#mytoggler" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="margin-top: -16px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="31" fill="currentColor" class="bi bi-justify" viewBox="1 1 10 10">
                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <div class="collapse navbar-collapse" id="mytoggler">
            <ul class="navbar-nav home-link me-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home.php">Home</a>
                </li>
                <?php
                $query = "SELECT name FROM category";
                $results = SQLQuery($query);
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <button class="dropdown-item" id="all-product">All</button>
                        <?php foreach ($results as $category) : ?>
                            <button class="dropdown-item" id="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></button>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">About-us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">
                <a href="favourite.php" class="add-pro-btn"><i class='fa fa-heart-o' style="font-size:20px !important;"></i> My Favourite</a>
                <a href="includes/API/logout.php" class="add-pro-btn">logout</a>
            </ul>
        </div>
    </div>  
</nav>
<!-- book detail  -->
<?php foreach ($books as $book) : ?>
<div class="container">
<div class="row row-sm" style="margin-top: 100px;">
        <div class="col-xl-10" style="width: fit-content;margin: auto;">
            <div class="card">
                <div class="card-body h-100">
                    <div class="row row-sm ">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="preview-pic tab-content"  style="width: fit-content;margin: auto;" >
                                <div class="tab-pane active" id="pic-1"><img src="includes\API\imgs\<?php echo $book['image']; ?>" style="max-width: 350px;" alt="image"/></div>
                            </div>
                        </div>
                        <div class="details col-xl-7 col-lg-7 col-md-6 mt-4 mt-xl-0" style="  width: fit-content;margin: auto;">
                            <h4 class="product-title mb-1 font-italic"><?php echo $book['name']; ?></h4>
                            <p class="text-muted tx-13 mb-1"><?php echo $book['category_name']; ?></p>
                            <div class="rating mb-1">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star text-muted"></span>
                                    <span class="fa fa-star text-muted"></span>
                                </div>
                                <span class="review-no">41 reviews</span>
                            </div>
                            <h6 class="price">current price: <span class="h3 ml-2">$<?php echo $book['price']; ?></span></h6>
                            <h5 class="font-weight-bold">Description:</h5>
                            <p class="product-description"><?php echo $book['details']; ?></p>
                            <div class="action mt-3">
                                <form action="includes/API/addToFavorites.php" method="post">
                                    <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                                    <button type="submit" name="upload" class="card-btn"><i class='fa fa-plus-circle' style='color:#ffffff'>Add to Favorites</i></button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-sm m-3">
                        <div class="details col-xl-12 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h5 class="font-weight-bold">book content:</h5>
                            <p class="product-description">
                                Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.
                                Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.
                                Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.
                                Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.
                                </p>
                            </div>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<!-- end bookdetail  -->
<?php echo Footer(); ?>