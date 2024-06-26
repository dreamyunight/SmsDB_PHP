<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>添加教师</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>添加教师</title>

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
          添加教师
        </h2>
        <p class="lead">
          请输入教师的详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="./fun/addTeacher.php" method="post" target="resultbox" class="needs-validation">
          <div class="row g-3">

            <div class="col-sm-3">
              <label for="Tname" class="form-label">姓名</label>
              <input type="text" class="form-control" id="Tname" name="Tname" placeholder="" value="" required>
              <div class="invalid-feedback">
                请填写教师姓名
              </div>
            </div>

            <div class="col-3">
              <label for="Tno" class="form-label">教师编号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Tno" name="Tno" placeholder="" required>
                <div class="invalid-feedback">
                  请填写教师编号
                </div>
              </div>
            </div>

            <div class="col-6">
              <label for="Tdept" class="form-label">所属学院</label>
              <select class="form-select" id="Tdept" name="Tdept" required>
                <option value="">Choose...</option>
                <?php
                require_once '../config/database.php';
                $dept = mysqli_query($db, "SELECT Dno, Dname FROM dept");
                while ($dr = mysqli_fetch_assoc($dept)) {
                  echo '<option value="' . $dr['Dno'] . '">' . $dr['Dname'] . '</option>';
                }
                mysqli_close($db);
                ?>
              </select>
              <div class="invalid-feedback">
                请选择教师所在学院
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">添加教师</button>
        </form>
        <iframe name="resultbox" frameborder="0" width="100%" height="500px"></iframe>
      </div>
    </main>
    <footer class="my-5 pt-5 text-center text-small">

    </footer>
  </div>

  <script src="checkout.js"></script>
</body>

</html>