<?php
class Auth {
    public static function requireLogin() {
        // enable the session if there is no session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit();
        }

    }
    public static function isLoggedIn() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }

    public static function requireAdmin($mysqli) {
        // First, they must be logged in
        self::requireLogin();

        // Fetch user role from database
        $sql = "SELECT role FROM users WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if (!$user || $user['role'] !== 'admin') {
            header("Location: /");
            exit();
        }
    }
}