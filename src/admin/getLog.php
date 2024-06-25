<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>学生奖项</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>学生奖项</title>

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
          查询学生
        </h2>
        <p class="lead">
          请输入学生的详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="./fun/getLog.php" method="post" target="resultbox" class="needs-validation">
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

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">查询信息</button>
        </form>
        <iframe name="resultbox" frameborder="0" width="100%" height=690px></iframe>
      </div>
    </main>
    <footer class="my-5 pt-5 text-center text-small">

    </footer>
  </div>

  <script src="checkout.js"></script>
</body>

</html>