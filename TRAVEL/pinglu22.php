<?php
    @ $db = mysqli_connect('localhost','root','');  
mysqli_query($db,"set names utf8;");  
mysqli_select_db($db,'travel');//找到数据库mpinglun  
if(mysqli_connect_errno()){  
 echo "Error:Could not connect to mysqli database.";  
 exit;  
}  
 $addtime=date("Y-m-d H:i:s"); //获取当前时间
echo '数据库连接成功    '.'<br>';
//连接数据库
$id=32;
    $sql = "SELECT * FROM pinglun where id like '%".$id."%'"; //查询user表中的数据
    echo '$sql:    '.$sql;
    $info = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>展示用户列表</title>
    <style type="text/css">
        .top{height:30px;line-height:30px;float:right;margin-right:15px;}
        .top a{color:red;text-decoration:none;}
        .cont{width:100%;height:300px;float:left;}
        .cont_ct{float:left;}
        table{width:100%;border:1px solid #eee;text-align:center;}
        th{background:#eee;}
        td{width:200px;height:30px;}
    </style>
</head>
<body>
    <!-- <div class="top"><a href="addu.php">添加管理员</a></div> -->
<?php $order='desc';
$button=2;?>
    <div class="cont">
         <form action="" method="post" name="myForm" >
 <input class="btn btn-primary btn-block" type="submit"  value="点赞" name="submit">
       </form>
        <table cellspacing="0" cellpadding="0" border="1">
            <tr>
                
                <th>评论id</th>
                <th>被评论的id</th>
                <th>内容</th>
                <th>评论日期</th>
                <th>操作</th>
                <th><a href="list.php?order=<?php echo $order; ?>">评论ID</a></th>
            </tr>
            <?php
                //获取表中的数据
                while($row=mysqli_fetch_assoc($info)){
            ?>
            <tr>
                <td><?php echo $row['pinglun_id'];?></td>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['content'];?></td>
                <td><?php echo $row['time'];?></td>
                
                
                <td>
                    <!--<a href="modifyu.php?id=//<?php // echo $row['id'];?>">修改</a>-->
                    <a href="deluser.php?id=<?php echo $row['pinglun_id'];?>">删除</a>
                </td>
            </tr>
            <?php
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
            
            
        </table>
    </div>
</body>
</html>