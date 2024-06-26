<!doctype html>
<html lang="en">

<head>
  <script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>学生管理>>教师密码</title>

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
          教师密码
        </h2>
        <p class="lead">
          请输入教师密码
        </p>
      </div>

      <div class="row g-5">
        <form action="fun/changeTpassword.php" class="needs-validation" method="post">
          <div class="row g-3">

            <div class="col-6">
              <label for="Tno" class="form-label">教师编号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Tno" name="Tno" placeholder="例：T001" required>
                <div class="invalid-feedback">
                  请填写教师编号
                </div>
              </div>
            </div>

            <div class="col-6">
              <label for="TpasswordOld" class="form-label">原密码</label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="TpasswordOld" name="TpasswordOld" placeholder="" required>
                <div class="invalid-feedback">
                  请填写原密码
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="Tpassword" class="form-label">新密码</label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="Tpassword" name="Tpassword" placeholder="" required>
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