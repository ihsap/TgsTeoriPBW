<?php
require_once 'controllers/BorrowController.php';

$borrowController = new BorrowController();
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $borrowController->borrowBook($user_id, $book_id);
}

$books = $bookController->index();
include 'views/borrow/borrow.php';
