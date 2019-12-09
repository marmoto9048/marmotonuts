<?php
 //删除管理员部分代码
// require_once('conn.php');
    @ $db = mysqli_connect('localhost','root','');  
mysqli_query($db,"set names utf8;");  
mysqli_select_db($db,'travel');//找到数据库
if(mysqli_connect_errno()){  
 echo "Error:Could not connect to mysqli database.";  
 exit;  
}  
 $addtime=date("Y-m-d H:i:s"); //获取当前时间
echo '数据库连接成功    '.'<br>';
 $id = $_GET['id'];
 echo '$id:   '.$id.'<br>';
 $sql = "DELETE from places where id=".$id.""; 
 echo ''.$sql;

      $r=mysqli_query($db,$sql);
if($r)//执行
  { echo  '<br>'.'删除执行成功'.$row['title'] ;
header("location:../ajax/JQueryAjax_1.php");
  }
  else{echo '删除失败'.'<br>'.'<br>';}
?>