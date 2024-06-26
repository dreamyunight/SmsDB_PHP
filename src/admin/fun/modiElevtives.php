<?php

require_once("../../config/database.php");
if (isset($_GET['Eno'])) {
  $Eno = mysqli_real_escape_string($db, $_GET['Eno']);
} else {
  die("No student ID provided");
}
// $Eno = mysqli_real_escape_string($db, $_GET['Eno']);
// echo $Eno;
// exit();
// 构建 SQL 查询语句
$com =
  'SELECT 
            s.Sno AS 学号,
            s.Sname AS 姓名,
            t.Tname AS 授课老师,
            c.Cname AS 课程名称,
            e.grade AS 课程得分,
            e.Eno AS Eno
        FROM
            electives e
        JOIN 
            student s ON e.Sno = s.Sno
        JOIN
            course c ON e.Cno = c.Cno
        JOIN
            teacher t ON e.Tno = t.Tno
        WHERE
            e.Eno = "' . $Eno . '";';

$result = mysqli_query($db, $com);
$row = mysqli_fetch_object($result);

?>
<!doctype html>
<html lang="en">

<head>
  <script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>选课修改</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>学生管理>>选课修改</title>

  <link rel="stylesheetlocal" type="text/css" href="css/addStudent.css">

  <!-- Custom styles for this template -->
  <link href="checkout.css" rel="stylesheet">
  <style>
    .Sno-input {
      display: none;
    }
  </style>
</head>

<body class="bg-body-tertiary">

  <div class="container">
    <main>
      <div class="py-5 text-center">
        <p class="lead">
          请更改选课的详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="editElectives.php" class="needs-validation" method="post">
          <div class="row g-3">

            <div class="col-sm-4">
              <label for="Sname" class="form-label">姓名</label>
              <input type="text" class="form-control" id="Sname" name="Sname" value="<?php echo $row->姓名 ?>" required disabled>
              <div class="invalid-feedback">
                学生姓名
              </div>
            </div>

            <div class="col-8"> <!-- 显示信息专用 -->
              <label for="Sno" class="form-label">学号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Sno" name="Sno" value="<?php echo $row->学号 ?>" required disabled>
                <div class="invalid-feedback">
                  学生学号
                </div>
              </div>
            </div>

            <div class="col-12 Sno-input"> <!-- 隐藏，传递数据专用 -->
              <label for="Eno" class="form-label">选课ID</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Eno" name="Eno" value="<?php echo $row->Eno ?>" required>
                <div class="invalid-feedback">
                  选课ID
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="Sno" class="form-label">授课老师</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Sno" name="Sno" value="<?php echo $row->授课老师 ?>" required disabled>
                <div class="invalid-feedback">
                  授课老师
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="Cname" class="form-label">课程名称</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Cname" name="Cname" value="<?php echo $row->课程名称 ?>" required disabled>
                <div class="invalid-feedback">
                  课程名称
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="grade" class="form-label">课程得分</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="grade" name="grade" value="<?php echo $row->课程得分 ?>" required>
                <div class="invalid-feedback">
                  课程得分
                </div>
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">保存得分</button>
        </form>
      </div>
    </main>
    <footer class="my-5 pt-5 text-center text-small">

    </footer>
  </div>

</body>

</html>

<?php
mysqli_close($db);
?>