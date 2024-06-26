<?php
require_once("../config/database.php");
?>

<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>新增课程</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>新增课程</title>

  <link rel="stylesheetlocal" type="text/css" href="css/addStudent.css">

  <!-- Custom styles for this template -->
  <link href="checkout.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">

  <div class="container">
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../resources/login.png" alt="" width="72" height="72">
        <h2>
          新增课程
        </h2>
        <p class="lead">
          请输入课程的详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="./fun/addCourse.php" method="post" target="resultbox" class="needs-validation">
          <div class="row g-3">

            <div class="col-sm-4">
              <label for="Cname" class="form-label">课程名称</label>
              <input type="text" class="form-control" id="Cname" name="Cname" value="" required>
              <div class="invalid-feedback">
                请填写课程名称
              </div>
            </div>

            <div class="col-4">
              <label for="Cno" class="form-label">课程编号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Cno" name="Cno" required>
                <div class="invalid-feedback">
                  请填写课程编号
                </div>
              </div>
            </div>

            <div class="col-4">
              <label for="Credit" class="form-label">学分值</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Credit" name="Credit" required>
                <div class="invalid-feedback">
                  请填写学分值
                </div>
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">新增课程</button>
        </form>
        <iframe name="resultbox" frameborder="0" width="100%" height="500px"></iframe>
      </div>
    </main>
    <footer class="my-5 pt-5 text-center text-small">

    </footer>
  </div>
  <?php
  mysqli_close($db);
  ?>