<?php
require_once("../config/database.php");
?>

<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>学生选课</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>学生选课</title>

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
          学生选课
        </h2>
        <p class="lead">
          请输入相关的详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="./fun/addChoose.php" method="post" target="resultbox" class="needs-validation">
          <div class="row g-3">

            <div class="col-md-3">
              <label for="Cno" class="form-label">课程名称</label>
              <select class="form-select" id="Cno" name="Cno" required>
                <option value="">Choose...</option>
                <?php
                $dept = mysqli_query($db, "SELECT Cno, Cname FROM course");
                while ($dr = mysqli_fetch_assoc($dept)) {
                  echo '<option value="' . $dr['Cno'] . '">' . $dr['Cname'] . '</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">
                请选择课程名称
              </div>
            </div>

            <div class="col-5">
              <label for="Sno" class="form-label">学号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Sno" name="Sno" placeholder="例：202058501101" required>
                <div class="invalid-feedback">
                  请填写学生学号
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <label for="Tno" class="form-label">授课老师</label>
              <select class="form-select" id="Tno" name="Tno" required>
                <option value="">Choose...</option>
                <?php
                $dept = mysqli_query($db, "SELECT Tno, Tname FROM teacher");
                while ($dr = mysqli_fetch_assoc($dept)) {
                  echo '<option value="' . $dr['Tno'] . '">' . $dr['Tname'] . '</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">
                请选择授课老师
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">新增授课</button>
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