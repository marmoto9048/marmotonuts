<?php
header("Content-Type: text/html; charset=utf-8");//防止界面乱码
$con = new mysqli("localhost", "root", "", "travel");
if(!$con){
    die("连接失败: " . $con->connect_error);
}else{
echo "数据库连接成功！";
}
$result = $con->query("select * from reservation");
//print_r(mysql_fetch_array($result));//取得第一条数据
echo "<table border='1'>
<tr>
<th>预定用户</th>
<th>入住日期</th>
<th>离店日期</th>
<th>城市</th>
<th>国内还是国内</th>
</tr>";

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc())//转成数组，且返回第一条数据,当不是一个对象时候退出
    {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['date1'] . "</td>";
        echo "<td>" . $row['date2'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['country'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";}
    else {
    echo "0 结果";
}





mysqli_close($con);
?>