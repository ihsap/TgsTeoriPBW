<?php
require_once 'controllers/BorrowController.php';

$borrowController = new BorrowController();

if (isset($_GET['borrow_id'])) {
    $borrow_id = $_GET['borrow_id'];
    $borrowController->returnBook($borrow_id);
}
