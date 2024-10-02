<?php
require_once 'models/Book.php';
require_once 'config/database.php';

class BookController {
    private $db;
    private $book;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->book = new Book($this->db);
    }

    // Menampilkan semua buku
    public function index() {
        $result = $this->book->getAllBooks();
        include 'views/book/index.php';
    }

    // Menambahkan buku
    public function create($title, $author, $year) {
        $this->book->title = $title;
        $this->book->author = $author;
        $this->book->year = $year;
        if ($this->book->addBook()) {
            header("Location: index.php");
        } else {
            echo "Error saat menambahkan buku.";
        }
    }

    // Menghapus buku
    public function delete($id) {
        $this->book->id = $id;
        if ($this->book->deleteBook()) {
            header("Location: index.php");
        } else {
            echo "Error saat menghapus buku.";
        }
    }
}
?>
