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
        <h2 class="titletext">國家資料表</h2>
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
                <p>國家代碼(查詢)&emsp;&emsp;
                    <input type="text" maxlength="6" id="country_code" style="width:300px">
                </p>
                <p>國家名稱&emsp;&emsp;
                    <input type="text" id="country_name" style="width:300px">
                </p>
                <p>所屬洲名&emsp;&emsp;
                    <input type="text" id="continent_name" style="width:300px">
                </p>
                <p>元首姓名&emsp;&emsp;
                    <input type="text" id="president_name" style="width:300px">
                </p>
                <p>外交部長姓名&emsp;&emsp;
                    <input type="text" id="foreign_minister_name" style="width:300px">
                </p>
                <p>聯絡人姓名&emsp;&emsp;
                    <input type="text" id="contact_person_name" style="width:300px">
                </p>
                <p>人口數&emsp;&emsp;
                    <input type="text" id="population" style="width:300px">
                </p>
                <p>領土面積&emsp;&emsp;
                    <input type="text" id="territory" style="width:300px">
                </p>
                <p>連絡電話&emsp;&emsp;
                    <input type="text" id="phone" style="width:300px">
                </p>
                <p>是否為邦交國&emsp;&emsp;
                    <select id="diplomatic">
                        <option value="not">否</option>
                        <option value="yes">是</option>
                    </select>
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
            $sql = "select * from country";
            if (!$result = $db->query($sql)) {
                echo "query failed";
                exit;
            }
            $sql2 = "select COUNT(*) as total from country where diplomatic='1'";
            $countdiplomatic=$db->query($sql2);
            $countdiplomatic=$countdiplomatic->fetch_assoc();
            $countdiplomatic=$countdiplomatic['total'];

            $sql3 = "select COUNT(*) as total from country where diplomatic='0'";
            $countnotdiplomatic=$db->query($sql3);
            $countnotdiplomatic=$countnotdiplomatic->fetch_assoc();
            $countnotdiplomatic=$countnotdiplomatic['total'];

            $sql4 = "select SUM(population) as total from country where diplomatic='1'";
            $diplomaticpopulation=$db->query($sql4);
            $diplomaticpopulation=$diplomaticpopulation->fetch_assoc();
            $diplomaticpopulation=$diplomaticpopulation['total'];

            $sql5 = "select SUM(population) as total from country where diplomatic='0'";
            $notdiplomaticpopulation=$db->query($sql5);
            $notdiplomaticpopulation=$notdiplomaticpopulation->fetch_assoc();
            $notdiplomaticpopulation=$notdiplomaticpopulation['total'];

            $sql6 = "select COUNT(*) as total from country where diplomatic='1' AND continent_name='asia'";
            $countasia=$db->query($sql6);
            $countasia=$countasia->fetch_assoc();
            $countasia=$countasia['total'];

            $sql7 = "select COUNT(*) as total from country where diplomatic='1' AND continent_name='europe'";
            $counteurope=$db->query($sql7);
            $counteurope=$counteurope->fetch_assoc();
            $counteurope=$counteurope['total'];

            $sql8 = "select COUNT(*) as total from country where diplomatic='1' AND continent_name='america'";
            $countamerica=$db->query($sql8);
            $countamerica=$countamerica->fetch_assoc();
            $countamerica=$countamerica['total'];

            $sql9 = "select COUNT(*) as total from country where diplomatic='1' AND continent_name='africa'";
            $countafrica=$db->query($sql9);
            $countafrica=$countafrica->fetch_assoc();
            $countafrica=$countafrica['total'];

            $sql10 = "select COUNT(*) as total from country where diplomatic='1' AND continent_name='australia'";
            $countaustralia=$db->query($sql10);
            $countaustralia=$countaustralia->fetch_assoc();
            $countaustralia=$countaustralia['total'];

            $sql11 = "select COUNT(*) as total from country where diplomatic='0' AND continent_name='asia'";
            $countnotasia=$db->query($sql11);
            $countnotasia=$countnotasia->fetch_assoc();
            $countnotasia=$countnotasia['total'];

            $sql12 = "select COUNT(*) as total from country where diplomatic='0' AND continent_name='europe'";
            $countnoteurope=$db->query($sql12);
            $countnoteurope=$countnoteurope->fetch_assoc();
            $countnoteurope=$countnoteurope['total'];

            $sql13 = "select COUNT(*) as total from country where diplomatic='0' AND continent_name='america'";
            $countnotamerica=$db->query($sql13);
            $countnotamerica=$countnotamerica->fetch_assoc();
            $countnotamerica=$countnotamerica['total'];

            $sql14 = "select COUNT(*) as total from country where diplomatic='0' AND continent_name='africa'";
            $countnotafrica=$db->query($sql14);
            $countnotafrica=$countnotafrica->fetch_assoc();
            $countnotafrica=$countnotafrica['total'];

            $sql15 = "select COUNT(*) as total from country where diplomatic='0' AND continent_name='australia'";
            $countnotaustralia=$db->query($sql15);
            $countnotaustralia=$countnotaustralia->fetch_assoc();
            $countnotaustralia=$countnotaustralia['total'];

            

            $db->close();
        ?>
        <table style="position:relative;left:5%;top:80px" width="1200px">
            <tr>
                <th>國家代碼</th>
                <th>國家名稱</th>
                <th>所屬洲名</th>
                <th>元首姓名</th>
                <th>外交部長姓名</th>
                <th>聯絡人姓名</th>
                <th>人口數</th>
                <th>領土面積</th>
                <th>連絡電話</th>
                <th>是否為邦交國</th>
                <th>國家存在狀態</th>
            </tr>
            <?php
                while ($country = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$country['country_code']."</td>";
                    echo "<td>".$country['country_name']."</td>";
                    echo "<td>".$country['continent_name']."</td>";
                    echo "<td>".$country['president_name']."</td>";
                    echo "<td>".$country['foreign_minister_name']."</td>";
                    echo "<td>".$country['contact_person_name']."</td>";
                    echo "<td>".$country['population']."</td>";
                    echo "<td>".$country['territory']."</td>";
                    echo "<td>".$country['phone']."</td>";
                    if($country['diplomatic']==0){
                        $diplomatic='否';
                    }
                    else{
                        $diplomatic='是';
                    }
                    echo "<td>".$diplomatic."</td>";
                    echo "<td>".$country['status']."</td>";
                    echo "</tr>";
                    }
            ?>
        </table>    
    </div>

    <div style="position:relative;left:5%;top:80px;height:400px">
        <h2 class="titletext">統計表</h2>
        <p>查詢邦交國(國家代碼)&emsp;&emsp;
            <input type="text" id="searchdiplomatic" style="width:300px">&emsp;&emsp;
            <input type="button" class="example_a" value="查詢" onClick="searchdiplomatic()">
        </p>
        <table width="1200px">
            <tr>
                <th>邦交國數量</th>
                <th>非邦交國數量</th>
                <th>所有邦交國人數</th>
                <th>所有非邦交國人數</th>
                <th>邦交國查詢結果</th>
            </tr>
            <?php
                echo "<tr>";
                echo "<td>".$countdiplomatic."</td>";
                echo "<td>".$countnotdiplomatic."</td>";
                echo "<td>".$diplomaticpopulation."</td>";
                echo "<td>".$notdiplomaticpopulation."</td>";
            ?>
            <td id="searchresult"></td>
            </tr>
            <th>亞洲邦交國數</th>
            <th>歐洲邦交國數</th>
            <th>美洲邦交國數</th>
            <th>非洲邦交國數</th>
            <th>澳洲邦交國數</th>
            <?php
                echo "<tr>";
                echo "<td>".$countasia."</td>";
                echo "<td>".$counteurope."</td>";
                echo "<td>".$countamerica."</td>";
                echo "<td>".$countafrica."</td>";
                echo "<td>".$countaustralia."</td>";
                echo "</tr>";
            ?>
            <th>亞洲非邦交國數</th>
            <th>歐洲非邦交國數</th>
            <th>美洲非邦交國數</th>
            <th>非洲非邦交國數</th>
            <th>澳洲邦交國數</th>
            <?php
                echo "<tr>";
                echo "<td>".$countnotasia."</td>";
                echo "<td>".$countnoteurope."</td>";
                echo "<td>".$countnotamerica."</td>";
                echo "<td>".$countnotafrica."</td>";
                echo "<td>".$countnotaustralia."</td>";
                echo "</tr>";
            ?>
        </table>
    </div>

    <div style="position:relative;left:5%;top:80px;height:200px" >
        <h2 class="titletext">查詢資料</h2>
        <table width="1200px">
            <tr>
                <th>國家代碼</th>
                <th>國家名稱</th>
                <th>所屬洲名</th>
                <th>元首姓名</th>
                <th>外交部長姓名</th>
                <th>聯絡人姓名</th>
                <th>人口數</th>
                <th>領土面積</th>
                <th>連絡電話</th>
                <th>是否為邦交國</th>
                <th>國家存在狀態</th>
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
                <td id="10"></td>
                <td id="11"></td>
            </tr>
        </table> 
    </div>
    <div style="height:80px"></div>
</body>
</html>

<script>
    function search(){
        var country_code=document.getElementById("country_code").value;
        $.ajax({ 
        'url': 'search.php', 
        'async': false, 
        'type': 'POST', 
        'data': {'sheet':'2','country_code': country_code}, 
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
                var yesno=0;
                if(data[9]==0){
                    yesno="否";
                }
                else{
                    yesno="是";
                }
                document.getElementById('10').innerHTML=yesno;
                document.getElementById('11').innerHTML=data[10];  

                document.getElementById('country_code').value=data[0];
                document.getElementById('country_name').value=data[1]; 
                document.getElementById('continent_name').value=data[2]; 
                document.getElementById('president_name').value=data[3]; 
                document.getElementById('foreign_minister_name').value=data[4]; 
                document.getElementById('contact_person_name').value=data[5]; 
                document.getElementById('population').value=data[6]; 
                document.getElementById('territory').value=data[7]; 
                document.getElementById('phone').value=data[8];  
                document.getElementById('diplomatic').selectedIndex=data[9]; 
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
        var country_code=document.getElementById("country_code").value;
        var country_name=document.getElementById("country_name").value;
        var continent_name=document.getElementById("continent_name").value;
        var president_name=document.getElementById("president_name").value;
        var foreign_minister_name=document.getElementById("foreign_minister_name").value;
        var contact_person_name=document.getElementById("contact_person_name").value;
        var population=document.getElementById("population").value;
        var territory=document.getElementById("territory").value;
        var phone=document.getElementById("phone").value;
        var diplomatic=document.getElementById("diplomatic").value;
        
        $.ajax({ 
            'url': 'insert.php', 
            'async': false, 
            'type': 'POST', 
            'data': {
                'sheet':'2',
                'country_code': country_code,
                'country_name': country_name,
                'continent_name': continent_name,
                'president_name': president_name,
                'foreign_minister_name': foreign_minister_name,
                'contact_person_name': contact_person_name,
                'population': population,
                'territory': territory,
                'phone': phone,
                'diplomatic': diplomatic,
                'status':'正常',
            }, 
            'dataType': 'text', 
            'success': function(msg){ 
                console.log("success");
                alert("新資料插入成功");
            }, 
            'error': function(){ 
                console.log("error");
            } 
        }); 
    }

    function update(){
        var country_code=document.getElementById("country_code").value;
        var country_name=document.getElementById("country_name").value;
        var continent_name=document.getElementById("continent_name").value;
        var president_name=document.getElementById("president_name").value;
        var foreign_minister_name=document.getElementById("foreign_minister_name").value;
        var contact_person_name=document.getElementById("contact_person_name").value;
        var population=document.getElementById("population").value;
        var territory=document.getElementById("territory").value;
        var phone=document.getElementById("phone").value;
        var diplomatic=document.getElementById("diplomatic").value;
        $.ajax({ 
            'url': 'update.php', 
            'async': false, 
            'type': 'POST', 
            'data': {
                'sheet':'2',
                'country_code': country_code,
                'country_name': country_name,
                'continent_name': continent_name,
                'president_name': president_name,
                'foreign_minister_name': foreign_minister_name,
                'contact_person_name': contact_person_name,
                'population': population,
                'territory': territory,
                'phone': phone,
                'diplomatic': diplomatic,
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
        var country_code=document.getElementById("country_code").value;
        $.ajax({ 
            'url': 'delete.php', 
            'async': false, 
            'type': 'POST', 
            'data': {
                'sheet':'2',
                'country_code': country_code,
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

    function searchdiplomatic(){
        var searchdiplomatic=document.getElementById("searchdiplomatic").value;
        $.ajax({ 
        'url': 'search.php', 
        'async': false, 
        'type': 'POST', 
        'data': {'sheet':'5','searchdiplomatic': searchdiplomatic}, 
        'dataType': 'text', 
        'success': function(msg){ 
            console.log("success");
            console.log(msg);
            //data=msg.split(",");
            //if(data[0]!="query failed"){
                document.getElementById('searchresult').innerHTML=msg;
            //}
            /*else{
                alert("查詢失敗");
            }*/
        }, 
        'error': function(){ 
            console.log("error");
        } 
      }); 
    }
</script>