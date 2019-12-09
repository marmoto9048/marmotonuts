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

    <div class="cont">
        <table cellspacing="0" cellpadding="0" border="1">
            <tr>
                <th>内容</th>
               <th>评论日期</th>
                 <th>用户名</th>
                <th>操作</th>
            </tr>
            <?php
                //获取表中的数据
                while($row=mysqli_fetch_assoc($info)){
            ?>
            <tr>
                
                <td><?php echo $row['content'];?></td>
                <td><?php echo $row['time'];?></td>
                <td><?php echo $row['yonghu'];?></td>
                <td><a href="deluser.php?id=<?php echo $row['pinglun_id'];?>">删除</a></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
</html>