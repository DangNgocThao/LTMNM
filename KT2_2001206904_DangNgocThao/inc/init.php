<?php
session_start();

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = Article::getAll("data.csv");
}
if (!isset($_SESSION['comment'])) {
    $_SESSION['comment'] = [];
}
?>