<?php  
    session_start();
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        header("location: ../../user-page.php");
        return;
    }
    
    include "../DBConnection.php";

    // Check if the user is logged in   
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'User not logged in']);
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $book_id = $_POST['book_id'];

    if (isset($_POST['upload'])) {
            $query = "INSERT INTO `favorites` (`user_id`, `book_id`) VALUES (:user_id, :book_id)";

            $data = [
                ':user_id'     => $_SESSION['user_id'],
                ':book_id'    => $_POST['book_id'],
            ];
            try {
                $results = SQLWithData($query, $data);
        
                // Set success flag in the session
                $_SESSION['add_to_favorites_success'] = true;
        
                header("location: ../../user-page.php");
                exit();
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'message' => 'Error adding to favorites: ' . $e->getMessage()]);
            }
     
        
    }