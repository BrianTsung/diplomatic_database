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
    $name = $_POST["name"]; 
    $id = $_POST["id"]; 
    $originalid = $_POST["originalid"]; 
    $position = $_POST["position"]; 
    $salary = $_POST["salary"]; 
    $phone = $_POST["phone"]; 
    $gender = $_POST["gender"]; 
    $birth = $_POST["birth"]; 
    $hiringdate = $_POST["hiringdate"]; 
    $address = $_POST["address"]; 
    $photo = $_POST["photo"];

    $url='./photo/'.$id.'.png';
    $originalurl='./photo/'.$originalid.'.png';
    list($type, $photo) = explode(';', $photo);
    if($type=='data:image/png'){
        list(, $photo)      = explode(',', $photo);
        $photo = base64_decode($photo);
        file_put_contents($url, $photo);
    }
    else{
        $photo = file_get_contents($originalurl);
        list($type, $photo) = explode(';', $photo);
        list(, $photo)      = explode(',', $photo);
        $photo = base64_decode($photo);
        file_put_contents($url, $photo);
    }

    $sql = "UPDATE employee
    SET name='$name',IDno='$id',positions='$position',Salary='$salary',Telephone='$phone',Gender='$gender',birth='$birth',hiringdate='$hiringdate',Address='$address',Photo='$url'
    WHERE IDno = '$originalid'";

    if ($db->query($sql) === TRUE) {
        echo "紀錄更新成功";
    } else {
        echo "更新失敗";
    }
    
}

if($sheet=='2'){
    $country_code = $_POST["country_code"]; 
    $country_name = $_POST["country_name"]; 
    $continent_name = $_POST["continent_name"]; 
    $president_name = $_POST["president_name"]; 
    $foreign_minister_name = $_POST["foreign_minister_name"]; 
    $contact_person_name = $_POST["contact_person_name"]; 
    $population = $_POST["population"]; 
    $territory = $_POST["territory"]; 
    $phone = $_POST["phone"]; 
    $diplomatic = $_POST["diplomatic"];
    if($diplomatic=='yes'){
        $diplomatic=1;
    }
    else{
        $diplomatic=0;
    }

    /*$sql = "select * from dependents where id='$id'";
    if (!$result = $db->query($sql)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "query zero";
        exit;
    }
    while ($result->fetch_assoc()){
        echo ("查詢到code");
    }*/

    $sql2 = "UPDATE country
    SET country_code='$country_code',country_name='$country_name',continent_name='$continent_name',president_name='$president_name',foreign_minister_name='$foreign_minister_name',contact_person_name='$contact_person_name',population='$population',territory='$territory',phone='$phone',diplomatic='$diplomatic'
    WHERE country_code = '$country_code'";

    if ($db->query($sql2) === TRUE) {
        echo "紀錄更新成功";
    } else {
        echo "更新失敗";
    }
}

if($sheet=='4'){
    $id = $_POST["id"]; 
    $dependent_id = $_POST["dependent_id"]; 
    $dependent_name = $_POST["dependent_name"]; 
    $dependent_gender = $_POST["dependent_gender"]; 
    $relationship = $_POST["relationship"]; 
    $dependent_birth = $_POST["dependent_birth"]; 
 
    /*$sql = "select * from dependents where id='$id'";
    if (!$result = $db->query($sql)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "query zero";
        exit;
    }
    while ($result->fetch_assoc()){
        echo ("查詢到id");
    }*/

    $sql2 = "UPDATE dependents
    SET id='$id',dependent_id='$dependent_id',dependent_name='$dependent_name',dependent_gender='$dependent_gender',relationship='$relationship',dependent_birth='$dependent_birth'
    WHERE id = '$id'";

    if ($db->query($sql2) === TRUE) {
        echo "紀錄更新成功";
    } else {
        echo "更新失敗";
    }
}
$db->close();

?>