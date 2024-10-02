<?php
require_once 'models/User.php';
require_once 'config/database.php';

class UserController {
    private $db;
    private $user;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->user = new User($this->db);
    }

    // Registrasi pengguna baru
    public function register($username, $password) {
        $this->user->username = $username;
        $this->user->password = $password;
        if ($this->user->register()) {
            header("Location: login.php");
        } else {
            echo "Error saat registrasi.";
        }
    }

    // Login pengguna
    public function login($username, $password) {
        $this->user->username = $username;
        $this->user->password = $password;
        $user = $this->user->login();

        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
        } else {
            echo "Login gagal. Username atau password salah.";
        }
    }
}
?>
