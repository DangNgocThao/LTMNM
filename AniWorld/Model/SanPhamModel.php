<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class SanPhamModel extends Database
{
    public function getSanPhams()
    {
        return $this->select("SELECT * FROM sanpham ORDER BY maSP ASC");
    }
}
