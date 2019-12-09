
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

 
    
    <?php
ob_start();
 $_GET['keyword'] = empty($_GET['keyword']) ? '' : $_GET['keyword'];
 $keyword=$_REQUEST["keyword"];
?>

<?php session_start();?>
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
$keyword=$_SESSION['keyword'];
echo '$_SESSION[keyword]:   ';
print_r($keyword);
echo "<br>";
echo 'keyword22为：      ';
echo $keyword.'<br>'.'--------------------'.'<br>'; 
echo '$keyword33: ';
echo $keyword.'<br>';
//$q="SELECT count(*) FROM apply where title like  '%".$keyword."%'";
//$q="SELECT count(*) FROM apply where title like  '%".$keyword."%'  order by people desc";
//$q="SELECT count(*) FROM apply where title like  '%".$keyword."%'  order by people desc";
$q="SELECT count(*) FROM apply where title like  '%".$keyword."%'  ";
echo 'q: '.$q.'<br>';
$k="SELECT * FROM apply where title like '%".$keyword."%' order by thumbs_up desc";//对表apply进行选择  
echo $k;




$result1 = mysqli_query($db,$q);  //执行
$row1 = mysqli_fetch_array($result1);  //得到有几条结果
$allnum=$row1[0];  //

//    $info = mysqli_query($db,$sql);
$result = mysqli_query($db,$k);//执行$k的mysql语句，并赋给result  
$rownum = mysqli_num_rows($result);//获取result的数据数量  
echo '共有'.$rownum.'条数据'; 
$apply=array(array());  
?>
    <div id="contentarea"  style="font-size:16px;">
       <table cellspacing="0" cellpadding="0" border="1">
            <tr>
                <th>游记id</th>
                <th>标题</th>
                <th>众筹人数</th>
                <th>点赞数</th>
            </tr>
            <?php
                //获取表中的数据
                while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['people'];?></td>
                <td><?php echo $row['thumbs_up'];?></td>
                
                <td>
                    
                   
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
 </html>     

