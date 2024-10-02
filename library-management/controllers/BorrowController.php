<?php
require_once 'models/Borrow.php';
require_once 'config/database.php';

class BorrowController {
    private $db;
    private $borrow;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->borrow = new Borrow($this->db);
    }

    // Meminjam buku
    public function borrowBook($user_id, $book_id) {
        $this->borrow->user_id = $user_id;
        $this->borrow->book_id = $book_id;
        $this->borrow->borrow_date = date('Y-m-d');
        if ($this->borrow->borrowBook()) {
            header("Location: index.php");
        } else {
            echo "Error saat meminjam buku.";
        }
    }

    // Mengembalikan buku
    public function returnBook($borrow_id) {
        $this->borrow->id = $borrow_id;
        $this->borrow->return_date = date('Y-m-d');
        if ($this->borrow->returnBook()) {
            header("Location: index.php");
        } else {
            echo "Error saat mengembalikan buku.";
        }
    }
}
?>
