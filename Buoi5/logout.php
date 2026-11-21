<?php
session_start();
unset($_SESSION['log_detail']);
header("Location:index.php");
exit;