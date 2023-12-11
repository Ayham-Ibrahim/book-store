<?php

    if($_SERVER['REQUEST_METHOD'] != "POST"){
        header("location: ../../admin-page.php");
        return;
    }

    if(!isset($_POST['name'])){
        header("location: ../../admin-page.php");
        return;
    }

    include "../DBConnection.php";

    $query = "SELECT id FROM `category` WHERE name = :name";
    $data = [
        ':name'    => $_POST['name'],
    ];
    $category = SQLWithData($query, $data);

    if(count($category) > 0){
        header("location: add-new-category.php?error=1");
    }
    else{
        if (isset($_POST['upload'])) {
            // Get image name
            $image = $_FILES['image']['name'];
            // Get text
      
            // image file directory
            $target = "catimg/".basename($image);
      
           
            $query = "INSERT INTO `category`(`name`,`image`) VALUES (:name,:image)";
            $data = [
                ':name'     => $_POST['name'],
                'image'     => $_FILES['image']['name'],    
            ]; 
            $category = SQLWithData($query, $data);
            header("location: ../../add-new-category.php?success=1");
      
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";    
            }
        }
        
      
     
    }


?>