<?php
require_once "config.php";
$db = new mysqli($hostname,$username,$password,$database);
$db->set_charset("utf8");
if ($db->connect_errno) {
    echo "connect error";
    exit;
}

$sheet = $_POST["sheet"];

if($sheet=='1'){
    $id = $_POST["id"]; 

    $sql = "UPDATE employee
    SET status='刪除'
    WHERE IDno = '$id'";

    if ($db->query($sql) === TRUE) {
        echo "刪除成功";
    } else {
        echo "刪除失敗";
    }
}

if($sheet=='2'){
    $country_code = $_POST["country_code"]; 

    $sql = "UPDATE country
    SET status='亡國'
    WHERE country_code = '$country_code'";

    if ($db->query($sql) === TRUE) {
        echo "刪除成功";
    } else {
        echo "刪除失敗";
    }
}

if($sheet=='3'){
    $id = $_POST["id"]; 

    $sql = "UPDATE expatriate
    SET status='離職'
    WHERE id = '$id'";

    if ($db->query($sql) === TRUE) {
        echo "刪除成功";
    } else {
        echo "刪除失敗";
    }
}

if($sheet=='4'){
    $id = $_POST["id"]; 

    $sql = "UPDATE dependents
    SET status='離婚/被人收養'
    WHERE id = '$id'";

    if ($db->query($sql) === TRUE) {
        echo "刪除成功";
    } else {
        echo "刪除失敗";
    }
}

$db->close();

?>