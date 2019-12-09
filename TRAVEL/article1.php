
<!--       <link rel="stylesheet" href="css/main2.css" type="text/css" />-->


<?php
 //删除管理员部分代码
// require_once('conn.php'); 

@ $db = mysqli_connect('localhost','root','');  
mysqli_query($db,"set names utf8;");  
mysqli_select_db($db,'travel');//找到数据库mpinglun  
if(mysqli_connect_errno()){  
 echo "Error:Could not connect to mysqli database.";  
 exit;  
}  

echo '数据库连接成功    '.'<br>';
 $title = $_GET['title'];
 // $title='西藏指南21';
 echo '$title:   '.$title.'<br>';
 $sql = "select * from article where title='".$title."' "; 
 echo ''.$sql;

      $r=mysqli_query($db,$sql);
if($r)//执行
  { 
  	echo  '<br>'.'游记找到啦！'.$row['title'] ;?>
  	<div style="width: 80%;padding-left: 20%;">
            <?php
            require 'thumbs_up.php';
            //获取表中的数据
            while($row=mysqli_fetch_assoc($r)){
            ?> 
                <?php ?>
            <tr>

   
                <div style="width: 80%;"><h3>文章id:</h3><?php echo $row['id'];?></div>
                <div style="width: 80%;"><h1><?php echo $row['title'];?></h1></div>
                <div style="display: online"><h5>发表时间:</h5><?php echo $row['time'];?></div>
                <div style="width: 80%;"><h3>点赞人数:</h3><?php echo $row['thumbs_up'];?></div>
                <div style="width: 80%;"><img src="<?php echo $row['img'];?>" style="width: 100%"></div>
                <div style="width: 80%;"><?php echo $row['content'];?></div>
                

            </tr>
            <?php
            
                }
            ?>
        <!-- </table> -->
</div>
<?php
  }
  else{
  	echo '删除失败'.'<br>'.'<br>';
  }
?>
