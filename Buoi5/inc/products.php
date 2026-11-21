<?php
function getAllProducts($filename){
    $lines = explode("\n", file_get_contents($filename) );
    $str = trim(array_shift($lines),"﻿");
    $headers = str_getcsv($str);
    $data = array();
    foreach ($lines as $line) {
        $row = array();
    
        foreach (str_getcsv($line) as $key => $field)
            $row[$headers[$key]] = $field;
    
        $row = array_filter($row);
    
        $data[] = $row;
    }
    return $data;
}

function getOneProductByID($data, $id) {
    foreach ($data as $row) {
        if ($row["id"] == $id) {
            return $row;
        }
    }
    return null;
}

function getLastID($data) {
    $last = end($data);
    return $last['id'];
}
?>