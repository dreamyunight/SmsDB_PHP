<!doctype html>
<html lang="en">

<head>
  <script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生密码</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>学生管理>>学生密码</title>

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
          学生密码
        </h2>
        <p class="lead">
          请输入学生密码
        </p>
      </div>

      <div class="row g-5">
        <form action="fun/changeSpassword.php" class="needs-validation" method="post">
          <div class="row g-3">

            <div class="col-6">
              <label for="Sno" class="form-label">学号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Sno" name="Sno" placeholder="例：S001" required>
                <div class="invalid-feedback">
                  请填写学生学号
                </div>
              </div>
            </div>

            <div class="col-6">
              <label for="Spassword" class="form-label">新密码</label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="Spassword" name="Spassword" placeholder="" required>
                <div class="invalid-feedback">
                  请填写新密码
                </div>
              </div>
            </div>

          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">保存密码</button>
        </form>
      </div>
    </main>
    <footer class="my-5 pt-5 text-center text-small">

    </footer>
  </div>

  <script src="checkout.js"></script>
</body>

</html>