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
    $position = $_POST["position"]; 
    $salary = $_POST["salary"]; 
    $phone = $_POST["phone"]; 
    $gender = $_POST["gender"]; 
    $birth = $_POST["birth"]; 
    $hiringdate = $_POST["hiringdate"]; 
    $address = $_POST["address"]; 
    $photo = $_POST["photo"];
    $status = $_POST["status"];

    $sql2 = "select * from employee where IDno='$id'";
    if (!$result = $db->query($sql2)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows !== 0) {
        echo "query one";
        exit;
    }

    list($type, $photo) = explode(';', $photo);
    list(, $photo)      = explode(',', $photo);
    $photo = base64_decode($photo);
    $url='./photo/'.$id.'.png';
    file_put_contents($url, $photo);

    $sql = "INSERT INTO employee (name,IDno,positions,Salary,Telephone,Gender,birth,hiringdate,Address,Photo,status)
    VALUES ('$name','$id','$position','$salary','$phone','$gender','$birth','$hiringdate','$address','$url','$status')";

    if ($db->query($sql) === TRUE) {
        echo "新紀錄插入成功";
    } else {
        echo "插入失敗";
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
    $status = $_POST["status"];

    $sql = "INSERT INTO country (country_code,country_name,continent_name,president_name,foreign_minister_name,contact_person_name,population,territory,phone,diplomatic,status)
    VALUES ('$country_code','$country_name','$continent_name','$president_name','$foreign_minister_name','$contact_person_name','$population','$territory','$phone','$diplomatic','$status')";

    if ($db->query($sql) === TRUE) {
        echo "新紀錄插入成功";
    } else {
        echo "插入失敗";
    }
}    

if($sheet=='3'){
    $id = $_POST["id"]; 
    $countrycode = $_POST["countrycode"]; 
    $appointment_date = $_POST["appointment_date"]; 
    $ambassador_name = $_POST["ambassador_name"]; 
    $status = $_POST["status"];

    $sql = "select * from employee where IDno='$id'";
    if (!$result = $db->query($sql)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "query zero";
        exit;
    }
    while ($employee = $result->fetch_assoc()){
        $name=$employee['name'];
        echo ("查詢到名字");
    }

    $sql2 = "INSERT INTO expatriate (id,countrycode,name,appointment_date,ambassador_name,status)
    VALUES ('$id','$countrycode','$name','$appointment_date','$ambassador_name','$status')";

    if ($db->query($sql2) === TRUE) {
        echo "新紀錄插入成功";
    } else {
        echo "插入失敗";
    }
}

if($sheet=='4'){
    $id = $_POST["id"]; 
    $dependent_id = $_POST["dependent_id"]; 
    $dependent_name = $_POST["dependent_name"]; 
    $dependent_gender = $_POST["dependent_gender"]; 
    $relationship = $_POST["relationship"]; 
    $dependent_birth = $_POST["dependent_birth"]; 
    $status = $_POST["status"];

    $sql = "select * from employee where IDno='$id'";
    if (!$result = $db->query($sql)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "query zero";
        exit;
    }
    while ($employee = $result->fetch_assoc()){
        echo ("查詢到名字");
    }

    $sql2 = "INSERT INTO dependents (id,dependent_id,dependent_name,dependent_gender,relationship,dependent_birth,status)
    VALUES ('$id','$dependent_id','$dependent_name','$dependent_gender','$relationship','$dependent_birth','$status')";

    if ($db->query($sql2) === TRUE) {
        echo "新紀錄插入成功";
    } else {
        echo "插入失敗";
    }
}

$db->close();

?>