<!--登陆验证php执行-->
<script>
function validateForm(){
              
              var  formElement = document.myForm;
  //            依次取出用户名和密码
              // var username = formElement.username.value;
              var password = formElement.password.value;
              var username = formElement.username.value;
  //            alert("去空格前："+"#"+username+"#"+":"+password+":"+username+"长度："+username.length);
              // username = trim(username);
             password = trim(password);
             username = trim(username);
 //            alert("去空格后："+username+":"+password+":"+username+"长度："+username.length);
             // checkUsername(username);
             checkPassword(password);
             checkusername(username);
         }
 //        验证邮箱
         function checkusername(username){
             var flag = true;
             if(username.length==0){
                 flag = false; 
                 alert("邮箱不能为空！");
            }else if(!/^\w+@\w+(\.\w+)+$/.test(username)){
                 flag = false;
                 alert("邮箱格式不对");
             }else {alert("登陆成功！");}
             return flag;
         }        

 //        验证密码
         function checkPassword(password){
             var flag = true;
             var  formElement = document.myForm;
             if(password.length == 0){
                 flag = false;
                 alert("密码不能为空！");
                 formElement.password.focus();
             }else if(!/^[0-9]{6}$/.test(password)){
                 flag = false;
                 alert("密码必须为6位数字！");
             }
             return flag;
         }
         function trim(s){
             s = s.replace(/(^\s*)|(\s*$)/g, "");//去前后空格
 //            s = s.replace(/^\s*$/,"");
             return s;
         }
         window.onload = function(){
             var formElement = document.myForm;
             formElement.onsubmit=validateForm;
         }; 
</script>  

<?php
ob_start();
 $_GET['username'] = empty($_GET['username']) ? '' : $_GET['username'];
 $username=$_REQUEST["username"];
 $password=$_REQUEST["password"];

?>

<?php
ob_start();
//假设用户登录成功获得了以下用户数据
$userinfo = array(
    'username' => $username,
    'password'  => $password

);
ob_start(); //打开缓冲区 
header("content-type:text/html; charset=utf-8");
ob_end_flush();//输出全部内容到浏览器 
 
/* 将用户信息保存到session中 */
$_SESSION['username'] = $userinfo['username'];
$_SESSION['password'] = $userinfo['password'];
$_SESSION['userinfo'] = $userinfo;
$_SESSION['date'] = date('y-m-d h:i:s',time());

// ----
  $session_id = session_id();
        // PHPSESSID就是服务器端保存的sessionID名字，这个名字是固定的，不允许乱取

        // 当我们去访问show页面的时候，只要PHPSESSID这个Cookie值保存的sessionID还存在，说明就是登录状态

        // 也就实现了关闭浏览器重启，还保持登录状态
        // 给特殊的PHPSESSION这个Cookie，设置有效生命周期，这样重启浏览器后，Cookie信息依旧存在

       setcookie('PHPSESSID',$session_id,time()+7*24*3600);
//       ------------------------------------------
echo "<br><br><br>";
       echo '设置session完成';
// -----
//* 将用户数据保存到cookie中的一个简单方法 */
$secureKey = 'imooc'; //加密密钥
$str = serialize($userinfo); //将用户信息序列化
//用户信息加密前
$str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), $str, MCRYPT_MODE_ECB));
//用户信息加密后
//将加密后的用户数据存储到cookie中
ob_start(); //打开缓冲区 
setcookie('userinfo', $str);
 
//当需要使用时进行解密
$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), base64_decode($str), MCRYPT_MODE_ECB);
$uinfo = unserialize($str);
echo "<br><br><br>";

echo "序列化前的用户信息：<br>";
print_r($uinfo);

echo "<br>序列化后的用户信息：<br>";
print_r($str);echo "<br>";
echo "<br>";

echo "输出上次登陆时间:"."<br>";
 echo $_SESSION['date']."<br>";
$qwq=$_SESSION['date'];

echo "输出session_id():"."<br>";
 echo session_id()."<br>";

 echo "输出上次登陆的session会话名:"."<br>";

 echo session_name()."<br>";


 if ($qwq!=null) {
 echo "您上次访问的时间是 ".$_SESSION['date']."<br>";
}
else {
    echo "第一次访问本站";
}

?>