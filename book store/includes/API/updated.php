<?php
    
if ($_SERVER['REQUEST_METHOD'] != "POST") {
    header("location: ../../update-product.php");
    return;
}

if (!isset($_POST['name']) || !isset($_POST['price'])) {
    header("location: ../../update-product.php");
    return;
}

include "../DBConnection.php";
$id = $_POST['id'];

// Check if the product with the same name and price already exists
$query = "SELECT id FROM `product` WHERE name = :name AND price = :price AND id != :id";
$data = [
    ':name' => $_POST['name'],
    ':price' => $_POST['price'],
    ':id' => $id,
];
$product = SQLWithData($query, $data);

if (count($product) > 0) {
    header("location: ../../update-product.php?error=1");
} else {
    if (isset($_POST['upload'])) {
        // Get image name
        $image = $_FILES['image']['name'];

        // Image file directory
        $target = "imgs/" . basename($image);

        // Update product
        $query = "UPDATE product SET `name`=:name, `price`=:price, `details`=:details, `image`=:image, `category_name`=:category WHERE id = :id";
        $data = [
            ':name' => $_POST['name'],
            ':price' => $_POST['price'],
            ':details' => $_POST['details'],
            ':image' => $_FILES['image']['name'],
            ':category' => $_POST['category'],
            ':id' => $id,  // Add this line
        ];

        // Execute the query
        SQLWithData($query, $data);

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "Failed to upload image";
        }

        // Redirect to the update-product.php with a success parameter
        header("location: ../../update-product.php?success=1");
    }
}
?>

