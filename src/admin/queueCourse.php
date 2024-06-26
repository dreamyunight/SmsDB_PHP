<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>课程查询</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>课程查询</title>

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
          查询课程信息
        </h2>
        <p class="lead">
          请输入课程的详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="./fun/getCourse.php" method="post" target="resultbox" class="needs-validation">
          <div class="row g-3">

            <div class="col-sm-5">
              <label for="Tname" class="form-label">教学老师姓名</label>
              <input type="text" class="form-control" id="Tname" name="Tname" placeholder="" value="">
              <div class="invalid-feedback">
                请教学教师姓名
              </div>
            </div>

            <div class="col-7">
              <label for="Cno" class="form-label">课程名称</label>
              <select class="form-select" id="Cno" name="Cno">
                <option value="">Choose...</option>
                <?php
                require_once '../config/database.php';
                $course = mysqli_query($db, "SELECT Cno, Cname FROM course");
                while ($cr = mysqli_fetch_assoc($course)) {
                  echo '<option value="' . $cr['Cno'] . '">' . $cr['Cname'] . '</option>';
                }
                mysqli_close($db);
                ?>
              </select>
              <div class="invalid-feedback">
                请填写课程名称
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">查询教师</button>
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