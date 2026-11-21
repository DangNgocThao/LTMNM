<?php
session_start();

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = getAllProducts("data.csv");
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>