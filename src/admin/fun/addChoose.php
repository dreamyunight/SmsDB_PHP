<?php

require_once("../../config/database.php");
if (!$db) {
  die('Fail to connect to Server');
} // 如果连接失败就报错并且中断程序

$_Cno       = mysqli_real_escape_string($db, $_POST['Cno']);
$_Tno       = mysqli_real_escape_string($db, $_POST['Tno']);
$_Sno       = mysqli_real_escape_string($db, $_POST['Sno']);

$find_com = "SELECT
                Cno, Tno  
            FROM 
                giveLessons 
            WHERE
                Cno = '$_Cno' AND Tno = '$_Tno'";

if ($result = mysqli_query($db, $find_com)) {
  if (mysqli_num_rows($result) > 0) {
    $com = "INSERT INTO electives 
        (Cno, Sno, Tno) 
        VALUES
        ('$_Cno', '$_Sno', '$_Tno')";

    try {
      if (mysqli_query($db, $com)) {
        echo "<script>alert('选课成功');history.go(-1);</script>";
      } else {
        throw new Exception(mysqli_error($db));
      }
    } catch (Exception $e) {
      $errorMessage = $e->getMessage();
      if (strpos($errorMessage, 'Duplicate entry') !== false) {
        echo "<script>alert('错误: 选课信息已存在，请检查信息后重新提交');history.go(-1);</script>";
      } else {
        echo "<script>alert('错误: 选课信息插入失败，请检查信息是否正确填写');history.go(-1);</script>";
      }
    }
    exit();
  }
}

echo "<script>alert('暂无有相关授课信息，请选择其他老师');history.go(-1);</script>";
