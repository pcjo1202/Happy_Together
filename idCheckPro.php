<?php
header("Content-Type:text/html;charset=utf-8");


$connection = mysql_connect('localhost', 'happy', 'together');
mysql_select_db('happytogether', $connection);



$id = $_GET['id'];

$query = "select * from member where id='$id'";
$result = mysql_query($query, $connection);
$idCheckPro = mysql_fetch_array($result);

if (!isset($idCheckPro[0])) {
    echo "<script>alert(`사용 가능한 ID입니다.`); history.back();</script>";
} else {
    echo "<script>alert('이미 사용중인 ID입니다.'); history.back();</script>";
}

?>