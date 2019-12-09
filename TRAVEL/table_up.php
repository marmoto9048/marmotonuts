<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
<div id="content">
<form method="post" action="reservation0.php" >
<table >
<tr>
入住日期: <input type="date" name="date1">
<input type="submit">
</tr><br><br>
<tr>
离店日期: <input type="date" name="date2">
    <input type="submit">
</tr>

<tr>
<th>入住城市</th>
<td>
<input name="city" value="" type="text" placeholder="请选择入住城市"/>
</td>
</tr>
<tr>
<th>预约人</th>
<td>
<input name="username" value="" type="text" placeholder="请选择预约人"/>
</td>
</tr>
<br><br>
国内酒店<input type="radio" name="country" value="in"/>  
国外酒店<input type="radio" name="country" value="out"/> 

<tr>
<th></th>
<td><input type="submit" value="预约" name="reg" id="tijiao" /></td>
</tr>
</table>
</form></div>


    </body>
</html>


