<!--登陆验证-->
      <title>点赞！</title>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <!--<script type="text/javascript" src="validateForm.js"></script>-->
    <body>
    <div class="container container-small">
        <form action="" method="post" name="myForm" >
 <input class="btn btn-primary btn-block" type="submit"  value="点赞" name="submit">
       </form>
    </div>
</body></html>

<?php
ob_start();
@ $db = mysqli_connect('localhost','root','');  
mysqli_query($db,"set names utf8;");  
mysqli_select_db($db,'travel');//找到数据库mmassage  
if(mysqli_connect_errno()){  
 echo "Error:Could not connect to mysqli database.";  
 exit;  
}  
?>

<?php session_start();?>
<?php
if(isset($_POST['submit']))
$_SESSION['id']+=1;
echo $_SESSION['id'];?>

<?php
$con = mysql_connect("localhost","peter","abc123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("travel", $con);
//
if(isset($_POST['submit'])){
    if($_SESSION['id']%2==0){
         $sql = mysql_query("update thumbs_up set up_number = up_number-1 where title='sas'");
    }
else{
    $sql = mysql_query("update thumbs_up set up_number = up_number+1 where title='sas'");
}
}
echo $_SESSION['id'];   
mysqli_query($db,$sql);//执行

$result = mysql_query("SELECT * FROM thumbs_up where title='sas'");
while($row = mysql_fetch_array($result))
  {
     echo  '<br>'.'已经为标题为'.$row['title'] .'的游记点赞'.'<br>';
 echo  '<br>'.'该游记当前点赞数量为:'.$row['up_number'] .'<br>';
  }
mysql_close($con);
?>