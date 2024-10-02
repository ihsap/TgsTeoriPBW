<?php
session_start();
require_once 'controllers/BookController.php';
require_once 'controllers/UserController.php';
require_once 'controllers/BorrowController.php';

// Inisialisasi Controller
$bookController = new BookController();
$userController = new UserController();
$borrowController = new BorrowController();

// Cek jika pengguna sudah login
if (!isset($_SESSION['user_id']) && $_SERVER['REQUEST_URI'] !== '/login.php' && $_SERVER['REQUEST_URI'] !== '/register.php') {
    header('Location: login.php');
    exit;
}

// Routing berdasarkan aksi yang diminta
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'register':
        include 'views/user/register.php';
        break;
    case 'login':
        include 'views/user/login.php';
        break;
    case 'logout':
        session_destroy();
        header("Location: login.php");
        break;
    case 'borrow':
        $books = $bookController->index();
        include 'views/borrow/borrow.php';
        break;
    case 'return':
        $borrow_id = $_GET['borrow_id'];
        $borrowController->returnBook($borrow_id);
        break;
    case 'home':
    default:
        $books = $bookController->index();
        include 'views/book/list.php';
        break;
}
