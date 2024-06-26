<?php

require_once("../../config/database.php");
if (!$db) {
  die('Fail to connect to Server');
} // 如果连接失败就报错并且中断程序

$_Cno       = mysqli_real_escape_string($db, $_POST['Cno']);
$_startDate = mysqli_real_escape_string($db, $_POST['startDate']);
$_Tno       = mysqli_real_escape_string($db, $_POST['Tno']);


$find_com = "SELECT
                Cno, Tno  
            FROM 
                giveLessons 
            WHERE
                Cno = '$_Cno' AND Tno = '$_Tno'";

if ($result = mysqli_query($db, $find_com)) {
  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('该老师已有相关授课信息，请选择其他老师');history.go(-1);</script>";
    exit();
  }
}
$com = "INSERT INTO giveLessons 
        (Cno, Tno, startDate) 
        VALUES
        ('$_Cno', '$_Tno', '$_startDate')";

try {
  if (mysqli_query($db, $com)) {
    echo "<script>alert('授课成功插入');history.go(-1);</script>";
  } else {
    throw new Exception(mysqli_error($db));
  }
} catch (Exception $e) {
  $errorMessage = $e->getMessage();
  if (strpos($errorMessage, 'Duplicate entry') !== false) {
    echo "<script>alert('错误: 授课信息已存在，请检查信息后重新提交');history.go(-1);</script>";
  } else {
    echo "<script>alert('错误: 授课信息插入失败，请检查信息是否正确填写');history.go(-1);</script>";
  }
}
