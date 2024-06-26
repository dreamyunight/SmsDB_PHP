<?php

require_once("../../config/database.php");
if (!$db) {
  die('Fail to connect to Server');
} // 如果连接失败就报错并且中断程序

$_Tname   = mysqli_real_escape_string($db, $_POST['Tname']);
$_Tno     = mysqli_real_escape_string($db, $_POST['Tno']);
$_Tdept   = mysqli_real_escape_string($db, $_POST['Tdept']);


$com = "INSERT INTO teacher 
        (Tno, Tpassword, Tname, Dno) 
        VALUES
        ('$_Tno', '$_Tno', '$_Tname', '$_Tdept')";

try {
  if (mysqli_query($db, $com)) {
    echo "<script>alert('教师信息成功插入');history.go(-1);</script>";
  } else {
    throw new Exception(mysqli_error($db));
  }
} catch (Exception $e) {
  $errorMessage = $e->getMessage();
  if (strpos($errorMessage, 'Duplicate entry') !== false) {
    echo "<script>alert('错误: 教师编号已存在，请检查信息后重新提交');history.go(-1);</script>";
  } else {
    echo "<script>alert('错误: 教师信息插入失败，请检查信息是否正确填写');history.go(-1);</script>";
  }
}
