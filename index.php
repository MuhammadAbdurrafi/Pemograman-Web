<?php

session_start();
$username_valid = "UNNES";
$password_valid = "123";

if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    die("Form belum diisi!");
} else {
    $username = $_POST["username"];
    $password = $_POST["password"];
}

if ($username == $username_valid && $password == $password_valid) {

    $_SESSION["login"][] = [
        "username" => $username,
        "password" => $password,
        "login_time" => date("Y-m-d H:i:s")
    ];

    $_SESSION["last_activity"] = time();
    $_SESSION["timeout_duration"] = 60;

    echo "Selamat datang, " . $username . ", Anda login sebanyak " . count($_SESSION["login"]) . " kali.<br><br>";
    echo "<a href='logout.php'>Logout</a> <br><br>";
    var_dump($_SESSION);

    if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"]) > $_SESSION["timeout_duration"]) {
        session_unset();
        session_destroy();
        echo "Session expired. Please log in again.<br>";
        echo "<a href='WebProgramming.html'>Kembali ke halaman login</a>";
        exit;
    }
} else {
    echo "Login Gagal!<br>";
    echo "<a href='WebProgramming.html'>Kembali ke halaman login</a>";
}