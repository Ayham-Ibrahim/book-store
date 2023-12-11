<?php
include "includes/Validation/isLoggedin.php";
include "includes/DBConnection.php";
include 'includes/app-entry-point.php';

$userInfo = SQLWithData(
    "SELECT name, email FROM users WHERE id = :user_id",
    ['user_id' => $_SESSION['user_id']]
);

$name = $userInfo[0]['name'];
$email = $userInfo[0]['email'];
// Get user ID
$user_id = $_SESSION['user_id'];

// Fetch favorite books for the logged-in user
$query = 'SELECT p.* FROM favorites f
          JOIN product p ON f.book_id = p.id
          WHERE f.user_id = :user_id';
$data = ['user_id' => $user_id];

try {
    // Assuming your DBconnection.php contains a $connect variable representing your database connection
    require_once 'includes/DBconnection.php';

    $favoriteBooks = SQLWithData($query, $data);
} catch (Exception $e) {
    // Handle the exception, e.g., log the error or display a user-friendly message
    die('Error fetching favorite books: ' . $e->getMessage());
}
// Check for the success flag
$delete_from_favorites_success = isset($_SESSION['delete_from_favorites_success']) && $_SESSION['delete_from_favorites_success'];

// Unset the session variable to avoid displaying the message on subsequent visits
unset($_SESSION['delete_from_favorites_success']);
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
                <a href="user-page.php" class="add-pro-btn">Our Books</a>   
                <a href="includes/API/logout.php" class="add-pro-btn">logout</a>
            </ul>
        </div>
    </div>
</nav>

<main class="user_product">
    <div class="container text-center">
        <?php if ($delete_from_favorites_success): ?>
            <div class="alert alert-success" role="alert">
                Book removed from favorites list successfully!
            </div>
        <?php endif; ?>     
        <div class="row gy-5">
            <h3 class="mine fw-bold pb-3" style="letter-spacing: 2px;color: rgb(233, 95, 3);">Our Books</h3>
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input class="search form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search">
            </form>
            <?php foreach ($favoriteBooks as $favoriteBook) : ?>
                <div class="ProCol col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-img-box">
                                <div class="d-flex product-sale">
                                    <i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
                                </div>
                                <img class="w-100" src="includes\API\imgs\<?php echo $favoriteBook['image']; ?>" style="height: 300px;" alt="product-image">
                            </div>
                            <h5 class="card-title"><?php echo $favoriteBook['name']; ?></h5>
                            <small style="color:red;">
                                <p><?php echo $favoriteBook['price']; ?>s.p</p>
                            </small>
                            <div>
                                <a href="book-details.php?id=<?php echo $favoriteBook['id']; ?>" class="card-btn">Show details</a>
                                <a href="includes\API\delete-from-favorites.php?book_id=<?php echo $favoriteBook['id']; ?>" class="delete-pro-btn"><i class='fa fa-remove'></i>  remove</a>
                            </div>
                        </div>
                    </div>
                </div>  
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php echo Footer(); ?>


