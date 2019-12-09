<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Document</title>
</head>


<body>
  <div class="navbar navbar-default ">
    <div class="navbar-container">
      <div class="navbar-header">
        <a href="INDEX.html" class="navbar-brand"></a>
      </div>
      <label id="toggle-label" class="visible-xs-inline-block" for="toggle-checkbox">MENU</label>
      <input class="hidden" id="toggle-checkbox" type="checkbox">
      <div class="hidden-xs">
        <ul class=" nav navbar-nav">
          <li class="active"><a href="#">首页</a></li>
          <li><a href="#">公司背景</a></li>
          <li><a href="#">欢迎</a></li>
          <li><a href="#">来到</a></li>
          <li><a href="#">儿童</a></li>
          <li><a href="#">之国</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="register.php">登陆</a></li>
          <li><a href="signup.html">注册</a></li>
        </ul>
      </div>

    </div>
  </div>
  <div class="container container-small">
    <h1>注册</h1>
    <!-- ----------------------------- -->
    <form action="welcome.html" onsubmit="return checkForm();">
      <div class="form-group">
        <label>手机</label>
        <input type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>验证码</label>
        <div class="input-group">
          <input type="text" class="form-control">
          <div class="input-group-btn">
            <div class="btn btn-default">获取验证码</div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>账号</label>
        <input onblur="checkName()" type="text" id="name" class="form-control">
      </div>
      <!-- 鼠标移开的时候检查拼写，-->
      <span id="name_msg"></span>
      <!-- <br/><br/> -->
      <div class="form-group">
        <label>密码</label>
        <!-- 密码：<input /> -->
        <input id="pwd" onblur="checkPwd()" type="password" class="form-control">
      </div>

      <span id="pwd_msg"></span>
      <br/><br/>

      <div class="form-group">
        <!-- <input type="submit" value="登录"/> -->
        <button onclick="Submit()" type="submit" class="btn btn-primary btn-block" type="submit">注册</button>
      </div>
    </form>
<!--     <script type="text/javascript">

  </script> -->
    <!-- ---------------------------------------------------- -->
    <form>
      <div class="form-group">
        注册栓蛋头条即代表您同意<a href="#">栓蛋头条服务条款</a>
      </div>
    </form>
  </div>
  <div class="footer">

    © 2004-2019, marmoto9048, Inc. 版权所有。唐沂蒙 张宏森 于有为 及相关的商标是 marmoto9048 在美国和其他国家的注册商标。
  </div>
</body>

</html>