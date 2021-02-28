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
            top:100px;
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
        <h2 class="titletext">員工基本資料表</h2>
    </div>
    <div style="height:600px;width:1000px">
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
                <p>員工姓名&emsp;&emsp;
                    <input type="text" id="name" style="width:300px">
                </p>
                <p>員工身分證字號(查詢)&emsp;&emsp;
                    <input type="text" id="id" style="width:300px">
                    <input type="hidden" id="originalid">
                </p>
                <p>職等&emsp;&emsp;
                    <input type="text" id="position" style="width:300px">
                </p>
                <p>薪資&emsp;&emsp;
                    <input type="text" id="salary" style="width:300px">
                </p>
                <p>電話&emsp;&emsp;
                    <input type="text" id="phone" style="width:300px">
                </p>
                <p>性別&emsp;&emsp;
                    <input type="text" id="gender" style="width:300px">
                </p>
                <p>出生年月日&emsp;&emsp;
                    <input type="date" id="birth" style="width:300px">
                </p>
                <p>錄用日期&emsp;&emsp;
                    <input type="date" id="hiringdate" style="width:300px">
                </p>
                <p>住址&emsp;&emsp;
                    <input type="text" id="address" style="width:300px">
                </p>
                <p>照片&emsp;&emsp;
                    <input type="file" id="photo" accept="image/jpeg, image/png">
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

    <div style="height:700px">
        <?php
            require_once "config.php";
            $db = new mysqli($hostname,$username,$password,$database);
            $db->set_charset("utf8");
            if ($db->connect_errno) {
                echo "connect error";
                exit;
            }
            $sql = "select * from employee";
            if (!$result = $db->query($sql)) {
                echo "query failed";
                exit;
            }

            /*$sql2 = "select COUNT(*) from employee";
            $count = $db->query($sql2);*/
            $db->close();
        ?>
        <table style="position:relative;left:5%;top:80px" width="1200px">
            <tr>
                <th>員工姓名</th>
                <th>員工身分證字號</th>
                <th>職等</th>
                <th>薪資</th>
                <th>電話</th>
                <th>性別</th>
                <th>出生年月日</th>
                <th>錄用日期</th>
                <th>住址</th>
                <th>照片</th>
                <th>狀態</th>
            </tr>
            <?php
                $count=0;
                $salary=0;
                $totalage=0;
                $position10=0;
                $position9=0;
                while ($employee = $result->fetch_assoc()) {
                    $count++;
                    $salary+=$employee['Salary'];
                    $age=explode('-', $employee['birth']);
                    $age=2019-$age[0];
                    $totalage+=$age;
                    if($employee['positions']=="十職等"){
                        $position10+=1;
                    }
                    else{
                        $position9+=1;
                    }
                    echo "<tr>";
                    echo "<td>".$employee['name']."</td>";
                    echo "<td>".$employee['IDno']."</td>";
                    echo "<td>".$employee['positions']."</td>";
                    echo "<td>".$employee['Salary']."</td>";
                    echo "<td>".$employee['Telephone']."</td>";
                    echo "<td>".$employee['Gender']."</td>";
                    echo "<td>".$employee['birth']."</td>";
                    echo "<td>".$employee['hiringdate']."</td>";
                    echo "<td>".$employee['Address']."</td>";
                    //$url="./photo/z456654445.png";
                    echo "<td>"."<img src='".$employee['Photo']."'/>"."</td>";
                    echo "<td>".$employee['status']."</td>";
                    echo "</tr>";
                    }
            ?>
        </table>    
    </div>

    <div style="position:relative;left:5%;top:80px;height:250px">
        <h2 class="titletext">統計表</h2>
        <table width="1200px">
            <tr>
                <th>員工人數</th>
                <th>員工平均年齡</th>
                <th>平均薪資</th>
                <th>十職等人數</th>
                <th>九職等以下人數</th>
                <th>員工全年總薪資</th>
                <th>員工每月總薪資</th>
                <th>員工每周總薪資</th>
            </tr>
            <?php
                $avgsalary=$salary/$count;
                $monthsalary=$salary/12;
                $weeksalary=($salary/365)*7;
                $avgage=$totalage/$count;
                echo "<tr>";
                echo "<td>".$count."</td>";
                echo "<td>".$avgage."</td>";
                echo "<td>".$avgsalary."</td>";
                echo "<td>".$position10."</td>";
                echo "<td>".$position9."</td>";
                echo "<td>".$salary."</td>";
                echo "<td>".$monthsalary."</td>";
                echo "<td>".$weeksalary."</td>";
                echo "</tr>";
            ?>
        </table>
    </div>

    <div style="position:relative;left:5%;top:80px;height:200px" >
        <h2 class="titletext">查詢資料</h2>
        <table width="1200px">
            <tr>
                <th>員工姓名</th>
                <th>員工身分證字號</th>
                <th>職等</th>
                <th>薪資</th>
                <th>電話</th>
                <th>性別</th>
                <th>出生年月日</th>
                <th>錄用日期</th>
                <th>住址</th>
                <th>照片</th>
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
                <td id="8"></td>
                <td id="9"></td>
                <td><img id="10" src=""></td>
                <td id="11"></td>
            </tr>
        </table> 
    </div>
    <div style="height:80px"></div>
</body>
</html>

<script>
    //圖片預覽
    $(function(){
        $('#photo').change(function(event){
            window.fileList = event.target.files;
            var formData = new window.FormData();	
            for(var i=0; i<fileList.length; i++){
                var file = fileList[i];
                formData.append('photo',file);
                var reader = new FileReader();
                reader.onload = (function(file){
                    return function(event){
                        var src = event.target.result
                        var img = '<img id="previewphoto" src="'+src+'"/>';	
                        $("#previewphoto").attr("src", src);					
                        //$('#preview').append('<div id="preview">'+img+'</div>');
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        });
    })

    function search(){
        var id=document.getElementById("id").value;
        $.ajax({ 
        'url': 'search.php', 
        'async': false, 
        'type': 'POST', 
        'data': {'sheet':'1','id': id}, 
        'dataType': 'text', 
        'success': function(msg){ 
            console.log("success");
            console.log(msg);
            data=msg.split(",");
            if(data[0]!="query failed"){
                document.getElementById('1').innerHTML=data[0];
                document.getElementById('2').innerHTML=data[1]; 
                document.getElementById('3').innerHTML=data[2]; 
                document.getElementById('4').innerHTML=data[3]; 
                document.getElementById('5').innerHTML=data[4]; 
                document.getElementById('6').innerHTML=data[5]; 
                document.getElementById('7').innerHTML=data[6]; 
                document.getElementById('8').innerHTML=data[7]; 
                document.getElementById('9').innerHTML=data[8];  
                $("#10").attr("src", data[9]);
                document.getElementById('11').innerHTML=data[10];  

                document.getElementById('name').value=data[0];
                document.getElementById('id').value=data[1];
                document.getElementById('originalid').value=data[1];  
                document.getElementById('position').value=data[2]; 
                document.getElementById('salary').value=data[3]; 
                document.getElementById('phone').value=data[4]; 
                document.getElementById('gender').value=data[5]; 
                document.getElementById('birth').value=data[6]; 
                document.getElementById('hiringdate').value=data[7]; 
                document.getElementById('address').value=data[8];  
                $("#previewphoto").attr("src", data[9]);
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
        var name=document.getElementById("name").value;
        var id=document.getElementById("id").value;
        var position=document.getElementById("position").value;
        var salary=document.getElementById("salary").value;
        var phone=document.getElementById("phone").value;
        var gender=document.getElementById("gender").value;
        var birth=document.getElementById("birth").value;
        var hiringdate=document.getElementById("hiringdate").value;
        var address=document.getElementById("address").value;
        var photo=document.getElementById("previewphoto").src;
        $.ajax({ 
            'url': 'insert.php', 
            'async': false, 
            'type': 'POST', 
            'data': {
                'sheet':'1',
                'name': name,
                'id': id,
                'position': position,
                'salary': salary,
                'phone': phone,
                'gender': gender,
                'birth': birth,
                'hiringdate': hiringdate,
                'address': address,
                'photo': photo,
                'status':'正常',
            }, 
            'dataType': 'text', 
            'success': function(msg){ 
                console.log("success");
                if(msg=="query one"){
                    alert("已有此員工身分證字號");
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
        var name=document.getElementById("name").value;
        var id=document.getElementById("id").value;
        var originalid=document.getElementById("originalid").value;
        var position=document.getElementById("position").value;
        var salary=document.getElementById("salary").value;
        var phone=document.getElementById("phone").value;
        var gender=document.getElementById("gender").value;
        var birth=document.getElementById("birth").value;
        var hiringdate=document.getElementById("hiringdate").value;
        var address=document.getElementById("address").value;
        var photo=document.getElementById("previewphoto").src;
        $.ajax({ 
            'url': 'update.php', 
            'async': false, 
            'type': 'POST', 
            'data': {
                'sheet':'1',
                'name': name,
                'id': id,
                'originalid': originalid,
                'position': position,
                'salary': salary,
                'phone': phone,
                'gender': gender,
                'birth': birth,
                'hiringdate': hiringdate,
                'address': address,
                'photo': photo,
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
                'sheet':'1',
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