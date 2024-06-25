<?php

require_once("../../config/database.php");

// 处理表单提交的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 获取并转义表单数据
  $Sname = mysqli_real_escape_string($db, $_POST["Sname"]);
  $Sno = mysqli_real_escape_string($db, $_POST["Sno"]);
  $Honid = mysqli_real_escape_string($db, $_POST["Sclass"]);
  $Awdname = mysqli_real_escape_string($db, $_POST["Sdept"]);

  // echo $Sname;
  // echo "<br>";
  // echo $Sno;
  // echo "<br>";
  // echo $Honid;
  // echo "<br>";
  // echo $Awdname;

  // 检查学生是否存在
  $findStudent = "SELECT Sno FROM student WHERE Sno = '$Sno'";
  $resultStudent = mysqli_query($db, $findStudent);
  if (mysqli_num_rows($resultStudent) == 0) {
    echo "<script>alert('学生学号不存在。');history.go(-1);</script>";
    exit();
  }

  // 构建 INSERT 查询语句
  $com = "INSERT INTO awd (Awdname, Honid, Sno) 
          VALUES ('$Awdname', '$Honid', '$Sno')";

  $result = mysqli_query($db, $com);

  if ($result) {
    echo "<script>alert('提示：奖项新增成功！');history.go(-1);</script>";
  } else {
    echo "<script>alert('注意：奖项新增失败！');history.go(-1);</script>";
  }

  mysqli_close($db);
} else {
  echo "<script>alert('无效的请求方式。');history.go(-1);</script>";
}
