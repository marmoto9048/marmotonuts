<html>  
<head>  
<meta charset="UTF-8">  
<name>查询景点</name>  
<script type="text/javascript" src="jquery.min.js"></script>   
<script>
$(document).ready(function (){
    $('#dropdown_selector').change(function(){
        var option = $(this).find('option:selected').val();
        if (option == 'content1')
        {
            $.ajax({   //load
                url:"findout2_2.php",success:function (result){
                    $("#contentarea").html(result);
                }
            });
        }
        else if (option =='content2')
        {
            $.ajax({
                url:"findout2_3.php",success:function (result){
                    $("#contentarea").html(result);
                }
            });
        }
        else
        {
            $.ajax({
                url:"findout2_4.php",success:function (result){
                    $("#contentarea").html(result);
                }
            });
        }
    });
});
</script>

</head>


<body style="background: #dfe7ec;">
    <span style="font-size:16px;">请选择排序条件:</span>
    <select id="dropdown_selector" style="width:190px">
        <option value="content1"> id</option>
        <option selected value="content2"> 参加人数</option>
        <option value="content3"> 点赞人数 </option>
    </select>
    <br> <br> 
    
<form action="" method="post" name="myForm" >
             <div class="form-group" style="width: 432px;">
                  <h3 style="width: 170px;
color:#454545;">请输入要检索的name信息(根据参加人数排序)： </h3>
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

 
    
    <?php
ob_start();
 $_GET['keyword'] = empty($_GET['keyword']) ? '' : $_GET['keyword'];
 $keyword=$_REQUEST["keyword"];
?>
<?php session_start();?>
<?php
if(isset($_POST['keyword']))
$_SESSION['keyword']=$keyword;
echo '$_SESSION[keyword]: '.$_SESSION['keyword'];?>

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
mysqli_select_db($db,'travel');//找到数据库mplaces  
if(mysqli_connect_errno()){  
 echo "Error:Could not connect to mysqli database.";  
 exit;  
}  
echo '数据库连接成功    '.'<br>';
echo 'keyword22为：      ';
echo $keyword.'<br>'.'--------------------'.'<br>'; 
echo '$keyword33: ';
echo $keyword.'<br>';
//$q="SELECT count(*) FROM places where name like  '%".$keyword."%'";
//$q="SELECT count(*) FROM places where name like  '%".$keyword."%'  order by people desc";
//$q="SELECT count(*) FROM places where name like  '%".$keyword."%'  order by people desc";
$q="SELECT count(*) FROM places where name like  '%".$keyword."%'";
echo 'q: '.$q.'<br>';
$k="SELECT * FROM places where name like '%".$keyword."%' order by thumbs_up desc";//对表places进行选择  
echo $k;




$result1 = mysqli_query($db,$q);  //执行
$row1 = mysqli_fetch_array($result1);  //得到有几条结果
$allnum=$row1[0];  //

//    $info = mysqli_query($db,$sql);
$result = mysqli_query($db,$k);//执行$k的mysql语句，并赋给result  
$rownum = mysqli_num_rows($result);//获取result的数据数量  
echo '共有'.$rownum.'条数据'; 
$places=array(array());  
?>



    <div id="contentarea"  style="font-size:16px;">
       <table cellspacing="0" cellpadding="0" border="1">
            <tr>
                <th>id</th>
                <th>游玩方式</th>
                <th>旅游人数</th>
                <th>点赞数</th>
                <th>图片</th>
                <th>城市</th>
                <th>餐厅</th>
                <th>景点</th>
                <th>酒店</th>
            </tr>
            <?php
                //获取表中的数据
                while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['path1'];?></td>
                <td><?php echo $row['people'];?></td>
                <td><?php echo $row['thumbs_up'];?></td>
                <td><?php echo $row['pic'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['canting'];?></td>
                <td><?php echo $row['jingdian'];?></td>
                <td><?php echo $row['jiudian'];?></td>
                <td><a href="deluser1.php?id=<?php echo $row['id'];?>">删除</a></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </div>
</body>
 </html>     

