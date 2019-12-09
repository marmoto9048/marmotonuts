<!-- 数据库查询 -->
      <title>排序检索！</title>

    <body>
        <form action="" method="post" name="myForm" >
             <div class="form-group" style="width: 432px;">
                  <h3 style="width: 170px;
color:#454545;">请输入要检索的title信息(根据参加人数排序)： </h3>
   
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
// $keyword=玩;
ob_start();
//假设用户登录成功获得了以下用户数据
$userinfo = array('keyword' => $keyword,);
echo "keyword11:   ";
print_r($keyword);
echo "<br>";
// =================================================================
@ $db = mysqli_connect('localhost','root','');  
mysqli_query($db,"set names utf8;");  
mysqli_select_db($db,'travel');//找到数据库mapply  
if(mysqli_connect_errno()){  
 echo "Error:Could not connect to mysqli database.";  
 exit;  
}  
echo '数据库连接成功    '.'<br>';
echo 'keyword22为：      ';
echo $keyword.'<br>'.'--------------------'.'<br>'; 
echo '$keyword33: ';
echo $keyword.'<br>';
$w="SELECT count(*) FROM apply where title like  '%".$keyword."%'  order by people desc";
//$w="SELECT count(*) FROM apply where title like  '%".$keyword."%'  order by people desc";
//$w="SELECT count(*) FROM apply where title like  '%".$keyword."%'  order by people desc";
echo 'w: '.$w.'<br>';
$k="SELECT * FROM apply where title like '%".$keyword."%' order by people desc";//对表apply进行选择  
echo $k;




$result1 = mysqli_query($db,$w);  //执行
$row1 = mysqli_fetch_array($result1);  //得到有几条结果
$allnum=$row1[0];  //


$result = mysqli_query($db,$k);//执行$k的mysql语句，并赋给result  
$rownum = mysqli_num_rows($result);//获取result的数据数量  
echo '共有'.$rownum.'条数据'; 
$apply=array(array());  
for($i=0;$i<=$rownum;$i++){  
    $apply[0][$i]= $row['id'];//获得id
    $apply[1][$i]= $row['title'];//获得文字描述
    $apply[2][$i]= $row['path1'];//获得缩略图的路径  
    $apply[3][$i]= $row['people'];//获得全图的路径 
    $apply[4][$i]= $row['thumbs_up'];//获得全图的路径 
    $row = mysqli_fetch_assoc($result);//获取result的一条数据  
    
 echo  '<br>'.'申请id:'.$apply[0][$i] .'<br>';
 echo  '<br>'.'标题:'.$apply[1][$i] .'<br>';
  echo  '<br>'.'出行计划:'.$apply[2][$i] .'<br>';
   echo  '<br>'.'众筹人数:'.$apply[3][$i] .'<br>';
   echo  '<br>'.'点赞人数:'.$apply[4][$i] .'<br>';
   echo '----------------------';
 
}  



?>