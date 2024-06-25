<?php

require_once("../../config/database.php");
if (!$db) {
  die('Fail to connect to Server');
} // 如果连接失败就报错并且中断程序

$_Sname       = mysqli_real_escape_string($db, $_POST['Sname']);
$_Ssex        = mysqli_real_escape_string($db, $_POST['Ssex']);
$_Sno         = mysqli_real_escape_string($db, $_POST['Sno']);
$_Semail      = mysqli_real_escape_string($db, $_POST['Semail']);
$_Sdate       = mysqli_real_escape_string($db, $_POST['Sdate']);
$_Sdept   = mysqli_real_escape_string($db, $_POST['Sdept']);
$_Smajor  = mysqli_real_escape_string($db, $_POST['Smajor']);
$_Sclass = mysqli_real_escape_string($db, $_POST['Sclass']);


$com = "INSERT INTO student 
        (Sno, Sname, Ssex, Sdate, Semail, Dno, Mno, Clsno) 
        VALUES
        ('$_Sno', '$_Sname', '$_Ssex', '$_Sdate', '$_Semail', '$_Sdept', '$_Smajor', '$_Sclass')";

try {
  if (mysqli_query($db, $com)) {
    echo "学生信息成功插入";
  } else {
    throw new Exception(mysqli_error($db));
  }
} catch (Exception $e) {
  $errorMessage = $e->getMessage();
  if (strpos($errorMessage, 'Duplicate entry') !== false) {
    echo "<script>alert('错误: 学号已存在，请检查信息后重新提交');history.go(-1);</script>";
  } else {
    echo "<script>alert('错误: 学生信息插入失败，请检查信息是否正确填写');history.go(-1);</script>";
  }
}
