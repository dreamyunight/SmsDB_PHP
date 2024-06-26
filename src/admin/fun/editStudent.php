<?php

require_once("../../config/database.php");

// 处理表单提交的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 获取并转义表单数据
  $Sno    = mysqli_real_escape_string($db, $_POST["Sno"]);
  $Sname  = mysqli_real_escape_string($db, $_POST["Sname"]);
  $Ssex   = mysqli_real_escape_string($db, $_POST["Ssex"]);
  $Sdate  = mysqli_real_escape_string($db, $_POST["Sdate"]);
  $Semail = mysqli_real_escape_string($db, $_POST["Semail"]);
  $Sdept  = mysqli_real_escape_string($db, $_POST["Sdept"]);
  $Smajor = mysqli_real_escape_string($db, $_POST["Smajor"]);
  $Sclass = mysqli_real_escape_string($db, $_POST["Sclass"]);

  // echo $Sdept;
  // echo $Smajor;
  // echo $Sclass;
  //   // 构建 REPLACE 查询语句 // REPLACE会导致原有记录的主键和外键关联被重新创建替换为 UPDATE
  $com = "UPDATE 
            student 
          SET 
            Sname = '$Sname',
            Ssex = '$Ssex', 
            Sdate = '$Sdate', 
            Semail = '$Semail', 
            Dno = '$Sdept', 
            Mno = '$Smajor', 
            Clsno = '$Sclass'
          WHERE 
            Sno = '$Sno';";

  $result = mysqli_query($db, $com);

  if ($result) {
    echo "<script>alert('提示：信息更改成功！');history.go(-1);</script>";
  } else {
    echo "<script>alert('注意：数据未更改！');history.go(-1);</script>";
  }

  mysqli_close($db);
} else {
  echo "<script>alert('无效的请求方式。');history.go(-1);</script>";
}
