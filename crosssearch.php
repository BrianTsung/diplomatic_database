<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="database">
    <meta name="author" content="Brian">
    <title>員工外派資訊系統</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('./backgroundimg.jpg');
            /*background-repeat: no-repeat;*/
        }

        .titletext {
            position: relative;
            height: 35px;
            width: 180px;
            left: 0.5%;
            color: rgb(255, 255, 255);
            font-family: Microsoft JhengHei;
            border: 1px solid rgb(255, 255, 255);
            text-align: center;
        }

        input:focus {
            border-color: #ffa722;
            outline-color: #ffa722;
        }

        input {
            height: 30px;
        }

        p {
            position: relative;
            left: 20%;
            color: aliceblue;
            font-size: 16px;
            font-family: Microsoft JhengHei;
        }

        a {
            text-decoration: none;
            color: rgb(255, 255, 255);
        }

        .container {
            width: 200px;
            background: rgba(0, 0, 0, 0.75);
            border: 1px solid #111;
            border-radius: 4px;
            box-shadow: 0px 4px 5px rgba(0, 0, 0, 0.75);
            float: left;
            margin-right: 10px;
        }

        .container2 {
            position: relative; 
            top:-150px;
            width: 800px;
            float: right; 
        }

        .link {
            font-family: Microsoft JhengHei;
            font-size: 16px;
            font-weight: 300;
            text-align: center;
            position: relative;
            height: 40px;
            line-height: 40px;
            margin-top: 10px;
            overflow: hidden;
            width: 90%;
            margin-left: 5%;
            cursor: pointer;
        }

        .link::after {
            content: '';
            position: absolute;
            width: 80%;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            bottom: 50%;
            left: -100%;
            transition-delay: all 0.5s;
            transition: all 0.5s;
        }

        .link:hover::after,
        .link.hover::after {
            left: 100%;
        }

        .link .text {
            text-shadow: 0px -40px 0px rgba(255, 255, 255, 1);
            transition: all 0.75s;
            transform: translateY(100%) translateZ(0);
            transition-delay: all 0.25s;
        }

        .link:hover .text {
            color: aliceblue;
            transform: translateY(0%) translateZ(0) scale(1.1);
            font-weight: 600;
        }
        
        table, th, td, tr{
            border: 1px  groove rgb(153, 255, 255);
            font-family: Microsoft JhengHei;
            color: rgb(255, 255, 255);

        }

        .example_a {
            color: #fff !important;
            text-transform: uppercase;
            text-decoration: none;
            background: rgba(0, 0, 0, 0.5);
            height:50px;
            width:100px;
            border-radius: 5px;
            display: inline-block;
            border: none;
            transition: all 0.4s ease 0s;
            font-family: Microsoft JhengHei;
            margin-top:20px;
            text-align: center;
        }

        .example_a:hover {
            background: #434343;
            letter-spacing: 5px;
            -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
            -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
            box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
            transition: all 0.4s ease 0s;
        }
    </style>
</head>

<body>
    <div>
        <h2 class="titletext">跨資料表搜尋</h2>
    </div>
    <div style="height:500px;width:1000px">
        <div class="container">
            <div class="link">
                <div class="text">
                    <a href="./employee.php">員工基本資料表</a>
                </div>
            </div>
            <div class="link">
                <div class="text">
                    <a href="./country.php">國家資料表</a>
                </div>
            </div>
            <div class="link">
                <div class="text">
                    <a href="./expatriate.php">員工派駐資料表</a>
                </div>
            </div>
            <div class="link">
                <div class="text">
                    <a href="./dependents.php">眷屬資料表</a>
                </div>
            </div>
            <div class="link">
                <div class="text">
                    <a href="./crosssearch.php">跨資料表搜尋</a>
                </div>
            </div>
        </div>
        <?php
            require_once "config.php";
            $db = new mysqli($hostname,$username,$password,$database);
            $db->set_charset("utf8");
            if ($db->connect_errno) {
                echo "connect error";
                exit;
            }
       
            $sql = "select COUNT(*) as total from employee,dependents where YEAR(CURDATE())-YEAR(employee.birth)>30 AND employee.IDno=dependents.id";
            $countdependent=$db->query($sql);
            $countdependent=$countdependent->fetch_assoc();
            $countdependent=$countdependent['total'];

            $sql2 = "select COUNT(*) as total from employee where YEAR(CURDATE())-YEAR(birth)>30";
            $countemployee=$db->query($sql2);
            $countemployee=$countemployee->fetch_assoc();
            $countemployee=$countemployee['total'];

            $sql3 = "select SUM(YEAR(CURDATE())-YEAR(dependents.dependent_birth)) as total from employee,dependents where YEAR(CURDATE())-YEAR(employee.birth)>30 AND employee.IDno=dependents.id";
            $dependentage=$db->query($sql3);
            $dependentage=$dependentage->fetch_assoc();
            $dependentage=$dependentage['total'];

            $db->close();
        ?>
        <div class="container2">
                <p>某國30歲以上員工人數&emsp;&emsp;
                    <input type="text" id="thirtyup" style="width:300px">&emsp;&emsp;
                    <input type="button" class="example_a" value="查詢" onClick="thirtyup()">
                </p>
                <p>某洲員工總數&emsp;&emsp;
                    <input type="text" id="employeenum" style="width:300px">&emsp;&emsp;
                    <input type="button" class="example_a" value="查詢" onClick="employeenum()">
                </p>
                <br><br><br><br>
                <h2 class="titletext">統計表</h2>
                <table width="1200px">
                    <tr>
                        <th>某國30歲以上員工人數</th>
                        <th>某洲員工總數</th>
                        <th>30歲以上員工平均眷屬年齡</th>
                        <th>30歲以上員工平均眷屬人數</th>
                    </tr>
                    <tr>
                        <td id="count30age"></td>
                        <td id="totalemployee"></td>
                        <?php
                            echo "<td>".$dependentage/$countdependent."</td>";
                            echo "<td>".$countdependent/$countemployee."</td>"
                        ?>
                    </tr>
                </table>
        </div> 
     
    </div>

    <div style="height:80px"></div>
</body>
</html>

<script>
    function employeenum(){
        var employeenum=document.getElementById("employeenum").value;
        $.ajax({ 
        'url': 'search.php', 
        'async': false, 
        'type': 'POST', 
        'data': {'sheet':'7','employeenum': employeenum}, 
        'dataType': 'text', 
        'success': function(msg){ 
            console.log("success");
            console.log(msg);
            document.getElementById('totalemployee').innerHTML=msg;
        }, 
        'error': function(){ 
            console.log("error");
        } 
      }); 
    }

    function thirtyup(){
        var thirtyup=document.getElementById("thirtyup").value;
        $.ajax({ 
        'url': 'search.php', 
        'async': false, 
        'type': 'POST', 
        'data': {'sheet':'8','thirtyup': thirtyup}, 
        'dataType': 'text', 
        'success': function(msg){ 
            console.log("success");
            console.log(msg);
            document.getElementById('count30age').innerHTML=msg;
        }, 
        'error': function(){ 
            console.log("error");
        } 
      }); 
    }
</script>