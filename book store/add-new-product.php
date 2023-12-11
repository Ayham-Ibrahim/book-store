<?php
    include "includes/Validation/isLoggedin.php";
    include "includes/DBConnection.php";
    include 'includes/app-entry-point.php';
    // $userInfo = SQLWithData(
    //         "SELECT name, email FROM users WHERE id = :user_id", 
    //         ['user_id' => $_SESSION['user_id']]
    // );
    
    // $name = $userInfo[0]['name'];
    // $email = $userInfo[0]['email'];

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
                    <a class="nav-link active" aria-current="page" href="admin-page.php">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">
                <a href="add-new-category.php" class="add-pro-btn"><ion-icon name="add-outline" style="font-size:25Spx !important;"></ion-icon> Add New Category</a>
                <a href="includes/API/logout.php" class="add-pro-btn">logout</a>
            </ul>
        </div>
    </div>
</nav>
<div class="background" style="width: 100%;height: 100%;position: fixed;top: 0;bottom: 0;background-image: url('siteimg/slider1.jpg');background-size: cover;filter: blur(2px);"></div>

<div class="user container px-4 py-5 px-md-5  text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
        <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">
                 <form action="includes/API/NewProduct.php" method="POST" style="padding: inherit;" enctype="multipart/form-data">
                    <h5 class="fw-bold text-center" style="letter-spacing: 2px;font-size:30px;color: rgb(233, 95, 3);padding-left:10px;padding-bottom:20px;">Add your Product</h5>
                    
                    <div class="newp form-group ">
                        <label for="formGroupExampleInput" class="col-3">Name</label>
                        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="The name of the product">
                    </div>
                    <div class="newp form-group">
                        <label for="formGroupExampleInput2" class="col-3">Price</label>
                        <input type="text" name="price" class="form-control" id="formGroupExampleInput2" placeholder="Product's price">
                    </div> 
                  
                    <?php
                        $query = "SELECT name FROM category";
                        $results = SQLQuery($query);
                      ?>
                    <!----------- category list -------->
                    <div class="newp form-group">    
                        <label for="formGroupExampleInput2" class="col-3" style="font-size: 14px !important;font-weight:500 ;">category</label>
                        <div>
                            <select class="custom-select" name="category" required>
                                <option value="">choose the produt's Category</option>
                                <?php foreach($results as $category) : ?>
                                    <option value="<?php echo $category['name'] ?>"><?php echo $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>    
                    </div>
                    <div class="newp form-outline">
                        <label class="form-label col-3" for="textAreaExample">Details</label>
                        <input type="text" name="details" class="form-control" id="formGroupExampleInput2" placeholder="Details">
                    </div>
                     <!-------------------- choose photo --------------->
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="image" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose Photo...</label>
                    </div>
                    <button class="btn" type="submit" name="upload">Add product</button>
                    <?php
                    if(isset($_GET['error']))
                        echo '</br><p style="color:red;margin-top:10px"><i class="fa fa-warning" style=:color: red;padding: 3px;"></i>This product is already exists</p>'; 
                    ?>
                    <?php
                     if(isset($_GET['success']))
                        echo '<p style="color:green;margin-top:10px">You product has been added successfully<i class="fa fa-check-circle" style="color:green;padding: 3px;"></i></p>'; 
                    ?>

                </form>
            </div>
            </div>  
     
        </div>
    </div>  

<?php echo Footer(); ?>