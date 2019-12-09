
<html>
    <head>
        <title>title</title>
    </head>
    <body>
 <form action="" method="post" name="myForm" >
             <div class="form-group" style="width: 432px;">
                  <h3 style="width: 170px;
color:#454545;">请输入要删除的id信息： </h3>
   
<input type="text"  name="keyword" id="div">
            </div>

 <input class="btn btn-primary btn-block" type="submit"  value="提交" name="submit">

       </form>
<script>
function validateForm(){
              
          var  formElement = document.myForm;
          var keyword = formElement.keyword.value;

             keyword = trim(keyword);
             checkkeyword(keyword);
         }
     
         function trim(s){
             s = s.replace(/(^\s*)|(\s*$)/g, "");//
             return s;
         }
         window.onload = function(){
             var formElement = document.myForm;
             formElement.onsubmit=validateForm;
         }; 
</script>  
    </body>
</html>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ob_start();
 $_GET['keyword'] = empty($_GET['keyword']) ? '' : $_GET['keyword'];
 $keyword=$_REQUEST["keyword"];
//$keyword=2;
ob_start();
//假设用户登录成功获得了以下用户数据
$userinfo = array('keyword' => $keyword,);
echo "keyword11:   ";
print_r($keyword);
echo "<br>";





$DSN = "mysql:host=localhost;dbname=travel";
$dbuser = "root";
$dbpwd= "root";

$conn = new PDO($DSN,$dbuser,$dbpwd);
$sql = "delete from news where id='{$keyword}'";
echo '$sql:    '.$sql;
$r = $conn->query($sql);
if($r)
{
//    header("location:empList.php");
    echo '删除成功';
}
else
{
    echo "Fail to delete";
}

?>