<?php
class Book {
    private $conn;
    private $table_name = 'books';

    public $id;
    public $title;
    public $author;
    public $year;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Mendapatkan semua buku
    public function getAllBooks() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Menambahkan buku baru
    public function addBook() {
        $query = "INSERT INTO " . $this->table_name . " (title, author, year) VALUES (:title, :author, :year)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':year', $this->year);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Menghapus buku
    public function deleteBook() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
