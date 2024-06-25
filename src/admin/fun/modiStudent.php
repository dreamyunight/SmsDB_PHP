<?php

require_once("../../config/database.php");
if (isset($_GET['Sno'])) {
  $Sno = mysqli_real_escape_string($db, $_GET['Sno']);
} else {
  die("No student ID provided");
}
// 构建 SQL 查询语句
$com = 'SELECT 
            s.Sno AS 学号,
            s.Sname AS 姓名,
            s.Ssex AS 性别,
            s.Sdate AS 出生年月,
            s.Semail AS 邮箱,
            d.Dname AS 学院,
            m.Mname AS 专业,
            c.clsname AS 班级
        FROM 
            student s
        JOIN 
            classes c ON s.Clsno = c.Clsno
        JOIN 
            major m ON s.Mno = m.Mno
        JOIN 
            dept d ON s.Dno = d.Dno
        WHERE 
            s.Sno = "' . $Sno . '"';

$result = mysqli_query($db, $com);
$row = mysqli_fetch_object($result);
// echo "<tr>";
// echo "<td>{$row->学号}</td>";
// echo "<td>{$row->姓名}</td>";
// echo "<td>{$row->性别}</td>";
// echo "<td>{$row->出生年月}</td>";
// echo "<td>{$row->邮箱}</td>";
// echo "<td>{$row->学院}</td>";
// echo "<td>{$row->专业}</td>";
// echo "<td>{$row->班级}</td>";
// echo "</tr>";

?>
<!doctype html>
<html lang="en">

<head>
  <script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>学生管理>>新增学生</title>

  <link rel="stylesheetlocal" type="text/css" href="css/addStudent.css">

  <!-- Custom styles for this template -->
  <link href="checkout.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">

  <div class="container">
    <main>
      <div class="py-5 text-center">
        <p class="lead">
          请更改学生的详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="editStudent.php" class="needs-validation" method="post">
          <div class="row g-3">

            <div class="col-sm-4">
              <label for="Sname" class="form-label">姓名</label>
              <input type="text" class="form-control" id="Sname" name="Sname" value="<?php echo $row->姓名 ?>" required>
              <div class="invalid-feedback">
                请填写学生姓名
              </div>
            </div>

            <div class="col-sm-4">
              <label for="Ssex" class="form-label">性别：</label>
              <select class="form-select" id="Ssex" name="Ssex" required>
                <option value="<?php echo $row->性别 ?>"><?php echo $row->性别 ?></option>
                <option value="男">男</option>
                <option value="女">女</option>
              </select>
              <div class="invalid-feedback">
                请选择你的性别
              </div>
            </div>

            <div class="col-sm-4">
              <label for="Sdate" class="form-label">出生年月</label>
              <input type="date" class="form-control" id="Sdate" name="Sdate" value="<?php echo $row->出生年月 ?>" required>
              <div class="invalid-feedback">
                请选择学生的出生日期
              </div>
            </div>

            <div class="col-12">
              <label for="Sno" class="form-label">学号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Sno" name="Sno" value="<?php echo $row->学号 ?>" required disabled>
                <div class="invalid-feedback">
                  请填写学生学号
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="Semail" class="form-label">邮箱</label>
              <input type="email" class="form-control" id="Semail" name="Semail" value="<?php echo $row->邮箱 ?>" required>
              <div class="invalid-feedback">
                请填写学生邮箱
              </div>
            </div>

            <div class="col-md-4">
              <label for="Sdept" class="form-label">学院</label>
              <select class="form-select" id="Sdept" name="Sdept" required>
                <option value="<?php echo $row->学院 ?>"><?php echo $row->学院 ?></option>
                <?php
                $dept = mysqli_query($db, "SELECT Dno, Dname FROM dept");
                while ($dr = mysqli_fetch_assoc($dept)) {
                  echo '<option value="' . $dr['Dno'] . '">' . $dr['Dname'] . '</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">
                请选择学生所在学院
              </div>
            </div>

            <div class="col-md-4">
              <label for="Smajor" class="form-label">专业</label>
              <select class="form-select" id="Smajor" name="Smajor" required>
                <option value="<?php echo $row->专业 ?>"><?php echo $row->专业 ?></option>
                <?php
                $major = mysqli_query($db, "SELECT Mno, Mname FROM major");
                while ($mr = mysqli_fetch_assoc($major)) {
                  echo '<option value="' . $mr['Mno'] . '">' . $mr['Mname'] . '</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">
                请输入学生所在专业
              </div>
            </div>

            <div class="col-md-4">
              <label for="Sclass" class="form-label">班级</label>
              <select class="form-select" id="Sclass" name="Sclass" required>
                <option value="<?php echo $row->班级 ?>"><?php echo $row->班级 ?></option>
                <?php
                $classes = mysqli_query($db, "SELECT Clsno, clsname FROM classes");
                while ($cl = mysqli_fetch_assoc($classes)) {
                  echo '<option value="' . $cl['Clsno'] . '">' . $cl['clsname'] . '</option>';
                }
                ?>
              </select>
              <div class="invalid-feedback">
                请输入学生所在班级
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">保存信息</button>
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