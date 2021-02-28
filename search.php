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
    $sql = "select * from employee where IDno='$id'";
    if (!$result = $db->query($sql)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "query failed";
        exit;
    }
    while ($employee = $result->fetch_assoc()){
        echo $employee['name'].",";
        echo $employee['IDno'].",";
        echo $employee['positions'].",";
        echo $employee['Salary'].",";
        echo $employee['Telephone'].",";
        echo $employee['Gender'].",";
        echo $employee['birth'].",";
        echo $employee['hiringdate'].",";
        echo $employee['Address'].",";
        echo $employee['Photo'].",";
        echo $employee['status'].",";
    }
}

if($sheet=='2'){
    $country_code = $_POST["country_code"]; 
    $sql = "select * from country where country_code='$country_code'";
    if (!$result = $db->query($sql)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "query failed";
        exit;
    }
    while ($country = $result->fetch_assoc()){
        echo $country['country_code'].",";
        echo $country['country_name'].",";
        echo $country['continent_name'].",";
        echo $country['president_name'].",";
        echo $country['foreign_minister_name'].",";
        echo $country['contact_person_name'].",";
        echo $country['population'].",";
        echo $country['territory'].",";
        echo $country['phone'].",";
        echo $country['diplomatic'].",";
        echo $country['status'].",";
    }
}

if($sheet=='3'){
    $id = $_POST["id"]; 
    $sql = "select * from expatriate where id='$id'";
    if (!$result = $db->query($sql)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "query failed";
        exit;
    }
    while ($expatriate = $result->fetch_assoc()){
        echo $expatriate['id'].",";
        echo $expatriate['countrycode'].",";
        echo $expatriate['name'].",";
        echo $expatriate['appointment_date'].",";
        echo $expatriate['ambassador_name'].",";
        echo $expatriate['status'].",";
    }
}

if($sheet=='4'){
    $id = $_POST["id"]; 
    $sql = "select * from dependents where id='$id'";
    if (!$result = $db->query($sql)) {
        echo "query failed";
        exit;
    }
    if ($result->num_rows === 0) {
        echo "query failed";
        exit;
    }
    while ($dependents = $result->fetch_assoc()){
        echo $dependents['id'].",";
        echo $dependents['dependent_id'].",";
        echo $dependents['dependent_name'].",";
        echo $dependents['dependent_gender'].",";
        echo $dependents['relationship'].",";
        echo $dependents['dependent_birth'].",";
        echo $dependents['status'].",";
    }
}

if($sheet=='5'){
    $searchdiplomatic = $_POST["searchdiplomatic"]; 
    $sql = "select diplomatic as diplomatic,population as population from country where country_code='$searchdiplomatic'";
    $searchdiplomatic=$db->query($sql);
    $searchdiplomatic=$searchdiplomatic->fetch_assoc();
    $diplomatic=$searchdiplomatic['diplomatic'];
    $population=$searchdiplomatic['population'];
    
    if($diplomatic==0){
        echo '非邦交國, '.'人口數: '.$population;
    }
    if($diplomatic==1){
        echo '是邦交國, '.'人口數: '.$population;
    }  
}

if($sheet=='6'){
    $searchemployeenum = $_POST["searchemployeenum"]; 
    $sql = "select COUNT(*) as total from expatriate where countrycode='$searchemployeenum'";
    $countemployee=$db->query($sql);
    $countemployee=$countemployee->fetch_assoc();
    $countemployee=$countemployee['total'];
    
    $sql2 = "select territory as total from country where country_code='$searchemployeenum'";
    $territory=$db->query($sql2);
    $territory=$territory->fetch_assoc();
    $territory=$territory['total'];
    $territory=$countemployee/$territory;

    echo $countemployee.",".$territory;
}

if($sheet=='7'){
    $employeenum = $_POST["employeenum"]; 
    $sql = "select COUNT(*) as total from country,expatriate where country.continent_name='$employeenum' AND expatriate.countrycode=country.country_code";
    $countemployee=$db->query($sql);
    $countemployee=$countemployee->fetch_assoc();
    $countemployee=$countemployee['total'];
    echo $countemployee;
}

if($sheet=='8'){
    $thirtyup = $_POST["thirtyup"]; 
    $sql = "select COUNT(*) as total from country,expatriate,employee where country.country_name='$thirtyup' AND expatriate.countrycode=country.country_code AND expatriate.id=employee.IDno AND YEAR(CURDATE())-YEAR(employee.birth)>30";
    $thirtyup=$db->query($sql);
    $thirtyup=$thirtyup->fetch_assoc();
    $thirtyup=$thirtyup['total'];
    echo $thirtyup;
}

$db->close();

?>