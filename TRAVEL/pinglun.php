<!-- 数据库查询 -->
      <title>评论！</title>

    <body>
       
        <form action="" method="post" name="myForm" >
             <div class="form-group" style="width: 432px;">
                  <h3 style="width: 170px;color:#454545;">评论区</h3>
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



</body></html>
<?php
ob_start();
 $_GET['keyword'] = empty($_GET['keyword']) ? '' : $_GET['keyword'];
 $keyword=$_REQUEST["keyword"];
?>

<?php
//$keyword=玩;
$id=32;
ob_start();
//假设用户登录成功获得了以下用户数据
$userinfo = array('keyword' => $keyword,);
echo "keyword即您评论的内容:   ";
print_r($keyword);
echo "<br>";
// =================================================================
@ $db = mysqli_connect('localhost','root','');  
mysqli_query($db,"set names utf8;");  
mysqli_select_db($db,'travel');//找到数据库mpinglun  
if(mysqli_connect_errno()){  
 echo "Error:Could not connect to mysqli database.";  
 exit;  
}  
 $addtime=date("Y-m-d H:i:s"); //获取当前时间
echo '数据库连接成功    '.'<br>';

$k="insert into pinglun(id,yonghu,content,time) values(32,'root2','".$keyword."','$addtime')";//向数据库插入评论
echo '<br>'.'$k:   ',$k;
if($k!=null){
    mysqli_query($db,$k);  //执行
}






$sql="delete from pinglun where id='{$id}'";
echo '<br>'.'$sql:   '.$sql;
?>