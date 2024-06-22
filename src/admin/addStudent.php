<!doctype html>
<html lang="en">

<head>
  <script src="../assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

  <title>新增学生</title>

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
          新增学生
        </h2>
        <p class="lead">
          请输入学生的详细信息
        </p>
      </div>

      <div class="row g-5">
        <form action="fun/addStudent.php" class="needs-validation" method="post" novalidate>
          <div class="row g-3">

            <div class="col-sm-4">
              <label for="Sname" class="form-label">姓名</label>
              <input type="text" class="form-control" id="Sname" name="Sname" placeholder="例：张三" value="" required>
              <div class="invalid-feedback">
                请填写学生姓名
              </div>
            </div>

            <div class="col-md-4">
              <label for="Ssex" class="form-label">性别：</label>
              <select class="form-select" id="Ssex" name="Ssex" required>
                <option value="">Choose...</option>
                <option>男</option>
                <option>女</option>
                <option>武装直升机</option>
                <option>沃尔玛购物袋</option>
              </select>
              <div class="invalid-feedback">
                请选择你的性别
              </div>
            </div>

            <div class="col-md-4">
              <label for="Sdate" class="form-label">Address</label>
              <input type="date" class="form-control" id="Sdate" name="Sdate" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                请选择学生的出生日期
              </div>
            </div>

            <div class="col-12">
              <label for="Sno" class="form-label">学号</label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="Sno" name="Sno" placeholder="例：202058501101" required>
                <div class="invalid-feedback">
                  请填写学生学号
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="Semail" class="form-label">邮箱</label>
              <input type="email" class="form-control" id="Semail" name="Semail" placeholder="you@example.com">
              <div class="invalid-feedback">
                请填写学生邮箱
              </div>
            </div>

            <div class="col-md-4">
              <label for="Sdept" class="form-label">学院</label>
              <select class="form-select" id="Sdept" name="Sdept" required>
                <option value="">Choose...</option>
                <option>计算机与控制工程学院</option>
                <option>数学与信息科学学院</option>
                <option>机电汽车工程学院</option>
                <option>环境与材料工程学院</option>
                <option>马克思主义学院</option>
                <option>法学院</option>
                <option>知识产权学院</option>
              </select>
              <div class="invalid-feedback">
                请选择学生所在学院
              </div>
            </div>

            <div class="col-md-4">
              <label for="Smajor" class="form-label">专业</label>
              <input type="text" class="form-control" id="Smajor" name="Smajor" placeholder="例：计算机科学与技术" required>
              <div class="invalid-feedback">
                请输入学生所在专业
              </div>
            </div>

            <div class="col-md-4">
              <label for="Sclass" class="form-label">班级</label>
              <input type="text" class="form-control" id="Sclass" name="Sclass" placeholder="例：计221-1" required>
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

  <script src="checkout.js"></script>
</body>

</html>