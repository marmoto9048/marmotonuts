<?php
$conn = new mysqli("localhost", "root", "", "travel");
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql = "select * from reservation";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "username: " . $row["username"]. " - date1: " . $row["date1"]. " " . $row["date2"]. "<br>";
    }
} else {
    echo "0 结果";
}
$conn->close();
?>