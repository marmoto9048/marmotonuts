<?php
//声明变量并接受form表单发送过来的数据
$date1=$_POST["date1"];
$date2=$_POST["date2"];
$country=$_POST["country"];
$city=$_POST["city"];
$username = $_POST['username'];

//字符串拼接，打印输出
echo $date1."<br/>".$date2."<br/>".$city."<br/>".$country."<br/>".$city."<br/>".$username."<br/>";


//---------------------------------------------------------------------------------------------------------------------------------------
$db = mysqli_connect('localhost','root','');  
mysqli_query($db,"set names utf8;");  
mysqli_select_db($db,'travel');//找到数据库mmassage  
if(mysqli_connect_errno()){  
 echo "Error:Could not connect to mysqli database.";  
 exit;  
} 
$too=1;
 $addtime=date("Y-m-d H:i:s"); //获取当前时间
$k="insert into reservation (username,date1,date2,country,city) values ('$username','$date1','$date2','$country','$city')";//对表massage进行选择  
echo $k;
$result1 = mysqli_query($db,$k);  
$row1 = mysqli_fetch_array($result1);  
$allnum=$row1[0];  

?>
