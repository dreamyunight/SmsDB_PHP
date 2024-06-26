<?php
require_once("../config/database.php");
?>

<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>获奖登记</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>获奖登记</title>

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
          获奖登记
        </h2>
        <p class="lead">
          请输入获奖详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="./fun/addLog.php" method="post" target="resultbox" class="needs-validation">
          <div class="row g-3">

            <div class="col-sm-4">
              <label for="Sname" class="form-label">姓名</label>
              <input type="text" class="form-control" id="Sname" name="Sname" placeholder="例：张三" value="">
              <div class="invalid-feedback">
                请填写学生姓名
              </div>
            </div>

            <div class="col-8">
              <label for="Sno" class="form-label">学号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Sno" name="Sno" placeholder="例：202058501101">
                <div class="invalid-feedback">
                  请填写学生学号
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <label for="Sclass" class="form-label">奖项名称</label>
              <select class="form-select" id="Sclass" name="Sclass">
                <option value="">Choose...</option>
                <?php
                $honors = mysqli_query($db, "SELECT Honid, Honname FROM honors");
                while ($ho = mysqli_fetch_assoc($honors)) {
                  echo '<option value="' . $ho['Honid'] . '">' . $ho['Honname'] . '</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">
                请输入学生所在班级
              </div>
            </div>

            <div class="col-md-6">
              <label for="Sdept" class="form-label">获奖等级</label>
              <select class="form-select" id="Sdept" name="Sdept">
                <option value="">Choose...</option>
                <option value="国家一等奖">国家一等奖</option>
                <option value="国家二等奖">国家二等奖</option>
                <option value="国家三等奖">国家三等奖</option>
                <option value="国家优秀奖">国家优秀奖</option>
                <option value="省级一等奖">省级一等奖</option>
                <option value="省级二等奖">省级二等奖</option>
                <option value="省级三等奖">省级三等奖</option>
              </select>
              <div class="invalid-feedback">
                请选择奖项等级
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">新增奖项</button>
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