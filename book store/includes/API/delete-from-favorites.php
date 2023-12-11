<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

include "../DBConnection.php";

$user_id = $_SESSION['user_id'];

// Check if the book_id is provided in the URL
if (!isset($_GET['book_id'])) {
    echo json_encode(['success' => false, 'message' => 'Book ID not provided']);
    exit();
}

$book_id = $_GET['book_id'];

$query = "DELETE FROM `favorites` WHERE `user_id` = :user_id AND `book_id` = :book_id";
$data = [
    ':user_id' => $user_id,
    ':book_id' => $book_id,
];

try {
    $results = SQLWithData($query, $data);

    // Set success flag in the session
    $_SESSION['delete_from_favorites_success'] = true;

    header("location: ../../favorites.php");
    exit();
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error adding to favorites: ' . $e->getMessage()]);
}
?>
