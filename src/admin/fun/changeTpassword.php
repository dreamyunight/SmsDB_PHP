<?php

require_once("../../config/database.php");

// 处理表单提交的数据
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // 获取并转义表单数据
  $Tno          = mysqli_real_escape_string($db, $_POST["Tno"]);
  $TpasswordOld = mysqli_real_escape_string($db, $_POST["TpasswordOld"]);
  $Tpassword    = mysqli_real_escape_string($db, $_POST["Tpassword"]);

  $sql = "select 
            * 
          from
            teacher
          where 
            Tno='$Tno'
          and 
            Tpassword='$TpasswordOld';";
  $res = mysqli_query($db, $sql);
  $row = $res->num_rows; //将获取到的用户名和密码拿到数据库里面去查找匹配
  if ($row == 0) {
    echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
    exit();
  }

  //   // 构建 REPLACE 查询语句 // REPLACE会导致原有记录的主键和外键关联被重新创建替换为 UPDATE
  $com = "UPDATE 
            teacher
          SET 
            Tpassword = '$Tpassword'
          WHERE 
            Tno = '$Tno';";
  // echo $com;
  // exit();
  $result = mysqli_query($db, $com);

  if ($result) {
    if (mysqli_affected_rows($db) > 0) {
      echo "<script>alert('提示：信息更改成功！');history.go(-1);</script>";
    } else {
      echo "<script>alert('注意：没有找到相应的编号或密码未更改。');history.go(-1);</script>";
    }
  } else {
    echo "<script>alert('SQL错误: " . mysqli_error($db) . "');history.go(-1);</script>";
  }
  mysqli_close($db);
} else {
  echo "<script>alert('无效的请求方式。');history.go(-1);</script>";
}
