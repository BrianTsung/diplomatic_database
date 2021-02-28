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
            width: 600px;
            float: right;
            
        }

        .container3 {
            position: relative; 
            left:1100px;
            width: 200px;
            
            
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
        <h2 class="titletext">眷屬資料表</h2>
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
        <div class="container2">
            <form>
                <p>*員工身分證字號(查詢)&emsp;&emsp;
                    <input type="text" id="id" style="width:300px">
                </p>
                <p>眷屬身分證字號&emsp;&emsp;
                    <input type="text" id="dependent_id" style="width:300px">
                </p>
                <p>眷屬姓名&emsp;&emsp;
                    <input type="text" id="dependent_name" style="width:300px">
                </p>
                <p>眷屬性別&emsp;&emsp;
                    <select id="dependent_gender">
                        <option value="0">女</option>
                        <option value="1">男</option>
                    </select>
                </p>
                <p>和員工關係&emsp;&emsp;
                    <input type="text" id="relationship" style="width:300px">
                </p>
                <p>出生年月日&emsp;&emsp;
                    <input type="date" id="dependent_birth" style="width:300px">
                </p>
                
            </form>
        </div> 
        <div class="container3">
            <div><input type="button" class="example_a" value="查詢" onClick="search()"></div>
            <div><input type="button" class="example_a" value="新增" onclick="insert()"></div>
            <div><input type="button" class="example_a" value="修改" onclick="update()"></div>
            <div><input type="button" class="example_a" value="刪除" onclick="deleted()"></div>
        </div>
    </div>

    <div id="preview" style="position:relative;left:55%;width:200"><img id="previewphoto" src=""></div>

    <div style="height:300px">
        <?php
            require_once "config.php";
            $db = new mysqli($hostname,$username,$password,$database);
            $db->set_charset("utf8");
            if ($db->connect_errno) {
                echo "connect error";
                exit;
            }
            $sql = "select * from dependents";
            if (!$result = $db->query($sql)) {
                echo "query failed";
                exit;
            }

            $sql2 = "select COUNT(*) as total from dependents where dependent_gender='0'";
            $genderwoman=$db->query($sql2);
            $genderwoman=$genderwoman->fetch_assoc();
            $genderwoman=$genderwoman['total'];

            $sql3 = "select COUNT(*) as total from dependents where dependent_gender='1'";
            $genderman=$db->query($sql3);
            $genderman=$genderman->fetch_assoc();
            $genderman=$genderman['total'];

            $db->close();
        ?>
        <table style="position:relative;left:5%;top:80px" width="1200px">
            <tr>
                <th>員工身分證字號</th>
                <th>眷屬身分證字號</th>
                <th>眷屬姓名</th>
                <th>眷屬性別</th>
                <th>和員工關係</th>
                <th>出生年月日</th>
                <th>狀態</th>
            </tr>
            <?php
                $womanage=0;
                $manage=0;
                $totalage=0;
                while ($dependents = $result->fetch_assoc()) {
                    $age=explode('-', $dependents['dependent_birth']);
                    $age=2019-$age[0];
                    $totalage+=$age;
                    echo "<tr>";
                    echo "<td>".$dependents['id']."</td>";
                    echo "<td>".$dependents['dependent_id']."</td>";
                    echo "<td>".$dependents['dependent_name']."</td>";
                    if($dependents['dependent_gender']==0){
                        $gender='女';
                        $womanage+=$age;
                    }
                    else{
                        $gender='男';
                        $manage+=$age;

                    }
                    echo "<td>".$gender."</td>";
                    echo "<td>".$dependents['relationship']."</td>";
                    echo "<td>".$dependents['dependent_birth']."</td>";
                    echo "<td>".$dependents['status']."</td>";
                    echo "</tr>";
                    }
            ?>
        </table>    
    </div>

    <div style="position:relative;left:5%;top:80px;height:250px">
        <h2 class="titletext">統計表</h2>
        <table width="1200px">
            <tr>
                <th>平均眷屬年齡</th>
                <th>男眷屬平均年齡</th>
                <th>女眷屬平均年齡</th>
                <th>男眷屬人數</th>
                <th>女眷屬人數</th>
            </tr>
            <?php
                $totalage=$totalage/($genderman+$genderwoman);
                $manage=$manage/$genderman;
                $womanage=$womanage/$genderwoman;
                echo "<tr>";
                echo "<td>".$totalage."</td>";
                echo "<td>".$manage."</td>";
                echo "<td>".$womanage."</td>";
                echo "<td>".$genderman."</td>";
                echo "<td>".$genderwoman."</td>";
                echo "</tr>";
            ?>
        </table>
    </div>

    <div style="position:relative;left:5%;top:80px;height:200px" >
        <h2 class="titletext">查詢資料</h2>
        <table width="1200px">
            <tr>
                <th>員工身分證字號</th>
                <th>眷屬身分證字號</th>
                <th>眷屬姓名</th>
                <th>眷屬性別</th>
                <th>和員工關係</th>
                <th>出生年月日</th>
                <th>狀態</th>
            </tr>
            <tr>
                <td id="1"></td>
                <td id="2"></td>
                <td id="3"></td>
                <td id="4"></td>
                <td id="5"></td>
                <td id="6"></td>
                <td id="7"></td>
            </tr>
        </table> 
    </div>
    <div style="height:80px"></div>
</body>
</html>

<script>
    function search(){
        var id=document.getElementById("id").value;
        $.ajax({ 
        'url': 'search.php', 
        'async': false, 
        'type': 'POST', 
        'data': {'sheet':'4','id': id}, 
        'dataType': 'text', 
        'success': function(msg){ 
            console.log("success");
            console.log(msg);
            data=msg.split(",");
            if(data[0]!="query failed"){
                document.getElementById('1').innerHTML=data[0];
                document.getElementById('2').innerHTML=data[1]; 
                document.getElementById('3').innerHTML=data[2]; 
                var yesno=0;
                if(data[3]==0){
                    boygirl="女";
                }
                else{
                    boygirl="男";
                }
                document.getElementById('4').innerHTML=boygirl;
                document.getElementById('5').innerHTML=data[4]; 
                document.getElementById('6').innerHTML=data[5];  
                document.getElementById('7').innerHTML=data[6]; 
                
                document.getElementById('id').value=data[0];
                document.getElementById('dependent_id').value=data[1]; 
                document.getElementById('dependent_name').value=data[2]; 
                document.getElementById('dependent_gender').selectedIndex=data[3]; 
                document.getElementById('relationship').value=data[4]; 
                document.getElementById('dependent_birth').value=data[5]; 
            }
            else{
                alert("查詢失敗");
            }
        }, 
        'error': function(){ 
            console.log("error");
        } 
      }); 
    }

    function insert(){
        var id=document.getElementById("id").value;
        var dependent_id=document.getElementById("dependent_id").value;
        var dependent_name=document.getElementById("dependent_name").value;
        var dependent_gender=document.getElementById("dependent_gender").value;
        var relationship=document.getElementById("relationship").value;
        var dependent_birth=document.getElementById("dependent_birth").value;
        $.ajax({ 
            'url': 'insert.php', 
            'async': false, 
            'type': 'POST', 
            'data': {
                'sheet':'4',
                'id': id,
                'dependent_id': dependent_id,
                'dependent_name': dependent_name,
                'dependent_gender': dependent_gender,
                'relationship': relationship,
                'dependent_birth': dependent_birth,
                'status':'正常',
            }, 
            'dataType': 'text', 
            'success': function(msg){ 
                console.log("success");
                console.log(msg);
                if(msg=="query zero"){
                    alert("無此員工身分證字號");
                }
                else{
                    alert("新紀錄插入成功");
                }
            }, 
            'error': function(){ 
                console.log("error");
            } 
        }); 
    }

    function update(){
        var id=document.getElementById("id").value;
        var dependent_id=document.getElementById("dependent_id").value;
        var dependent_name=document.getElementById("dependent_name").value;
        var dependent_gender=document.getElementById("dependent_gender").value;
        var relationship=document.getElementById("relationship").value;
        var dependent_birth=document.getElementById("dependent_birth").value;
        $.ajax({ 
            'url': 'update.php', 
            'async': false, 
            'type': 'POST', 
            'data': {
                'sheet':'4',
                'id': id,
                'dependent_id': dependent_id,
                'dependent_name': dependent_name,
                'dependent_gender': dependent_gender,
                'relationship': relationship,
                'dependent_birth': dependent_birth,
            }, 
            'dataType': 'text', 
            'success': function(msg){ 
                console.log("success");
                console.log(msg);
                alert("資料更新成功");
                
            }, 
            'error': function(){ 
                console.log("error");
            } 
        }); 
    }

    function deleted(){
        var id=document.getElementById("id").value;
        $.ajax({ 
            'url': 'delete.php', 
            'async': false, 
            'type': 'POST', 
            'data': {
                'sheet':'4',
                'id': id,
            }, 
            'dataType': 'text', 
            'success': function(msg){ 
                console.log("success");
                alert("刪除成功");
            }, 
            'error': function(){ 
                console.log("error");
            } 
        }); 
    }
</script>