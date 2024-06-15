<?php

class Middleware {
    public static function auth() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        // echo(!isset($_SESSION["login"]));
     }
}
?>
