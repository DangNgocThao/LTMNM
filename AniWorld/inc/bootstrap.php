<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../");
// include main configuration file 
require_once PROJECT_ROOT_PATH . "/inc/config.php";
// include the base controller file 
require_once PROJECT_ROOT_PATH . "/Controller/Api/BaseController.php";
// include the use model file 
require_once PROJECT_ROOT_PATH . "/Model/SanPhamModel.php";

spl_autoload_register(function ($class) {
    require PROJECT_ROOT_PATH . "/class/{$class}.php";
});

$db = new Db(DB_HOST, DB_DATABASE_NAME, DB_USERNAME, DB_PASSWORD);
$pdo = $db->connect();
?>