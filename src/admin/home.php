<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("HTTP/1.1 403 Moved Temporatily");
  header("Location: " . "../");
  exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <title>学生选课信息管理系统@2024</title>

</head>

<body>
  <div class="container topnav">
    <div class="logo">
      学生选课信息管理系统
    </div>
    <div class="userbox" style="float:right">
      你好,
      <?= $_SESSION["admin"] ?>
      <a href="./logout.php"> 登出</a>
    </div>

  </div>
  <div class="container main">
    <div class="leftnav">
      <div class="homepage">
        <a href="./welcome.php" target="frame">首页</a>
      </div>
      <div class="subtitle">
        学生管理
      </div>
      <div class="item">
        <a href="./addStudent.php" target="frame">新增学生</a>
      </div>
      <div class="item">
        <a href="./queueStudent.php" target="frame">查询学生</a>
      </div>
      <div class="item">
        <a href="./getLog.php" target="frame">获奖信息</a>
      </div>
      <div class="item">
        <a href="./addLog.php" target="frame">获奖登记</a>
      </div>
      <div class="subtitle">
        教师管理
      </div>
      <div class="item">
        <a href="./queueTeacher.php" target="frame">老师信息</a>
      </div>
      <div class="item">
        <a href="./addTeacher.php" target="frame">添加老师</a>
      </div>
      <div class="item">
        <a href="./addGivelession.php" target="frame">新增授课</a>
      </div>
      <div class="subtitle">
        课程管理
      </div>
      <div class="item">
        <a href="./queueCourse.php" target="frame">课程查询</a>
      </div>
      <div class="item">
        <a href="./addCourse.php" target="frame">新增课程</a>
      </div>
      <div class="subtitle">
        选课管理
      </div>
      <div class="item">
        <a href="./addChoose.php" target="frame">学生选课</a>
      </div>
      <!-- <div class="item">
        <a href="./queueMark.php" target="frame">登记分数</a>
      </div> -->
      <div class="item">
        <a href="./queueElectives.php" target="frame">选课查询</a>
      </div>
      <div class="subtitle">
        系统设置
      </div>
      <div class="item">
        <a href="./changeSpassword.php" target="frame">学生密码</a>
      </div>
      <div class="item">
        <a href="./changeTpassword.php" target="frame">教师密码</a>
      </div>

    </div>
    <div class="content">
      <iframe name="frame" frameborder="0" width="100%" scrolling="yes" src="./welcome.php"></iframe>
    </div>

  </div>
  <div class="container footer">
    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
      <p class="mb-1">&copy; 数据库系统课程设计@2022–2024</p>
    </footer>
  </div>

</body>

</html>