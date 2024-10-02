<?php
class Borrow {
    private $conn;
    private $table_name = 'borrows';

    public $id;
    public $user_id;
    public $book_id;
    public $borrow_date;
    public $return_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Peminjaman buku baru
    public function borrowBook() {
        $query = "INSERT INTO " . $this->table_name . " (user_id, book_id, borrow_date) VALUES (:user_id, :book_id, :borrow_date)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':book_id', $this->book_id);
        $stmt->bindParam(':borrow_date', $this->borrow_date);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Pengembalian buku
    public function returnBook() {
        $query = "UPDATE " . $this->table_name . " SET return_date = :return_date WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':return_date', $this->return_date);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
