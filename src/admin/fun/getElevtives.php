<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>查询选课</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>查询选课</title>
  <link rel="stylesheetlocal" type="text/css" href="css/addStudent.css">
  <!-- Custom styles for this template -->
  <link href="checkout.css" rel="stylesheet">
</head>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">学号</th>
        <th scope="col">姓名</th>
        <th scope="col">授课老师</th>
        <th scope="col">课程名称</th>
        <th scope="col">开课时间</th>
        <th scope="col">课程得分</th>
        <th scope="col">选课操作</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once("../../config/database.php");

      $com = 'SELECT 
                        s.Sno AS 学号,
                        s.Sname AS 姓名,
                        t.Tname AS 授课老师,
                        c.Cname AS 课程名称,
                        g.startDate AS 开课时间,
                        e.grade AS 课程得分,
                        e.Eno AS 选课ID
                    FROM 
                        student s
                    JOIN 
                        electives e ON s.Sno = e.Sno
                    JOIN
                        course c ON e.Cno = c.Cno
                    JOIN
                        giveLessons g ON c.Cno = g.Cno
                    JOIN
                        teacher t ON e.Tno = t.Tno
                    WHERE 1=1';

      if (!empty($_POST['Sname'])) {
        $com .= ' AND s.Sname LIKE "%' . mysqli_real_escape_string($db, $_POST['Sname']) . '%"';
      }
      if (!empty($_POST['Sno'])) {
        $com .= ' AND s.Sno LIKE "%' . mysqli_real_escape_string($db, $_POST['Sno']) . '%"';
      }
      if (!empty($_POST['Tno'])) {
        $com .= ' AND t.Tno LIKE "%' . mysqli_real_escape_string($db, $_POST['Tno']) . '%"';
      }
      if (!empty($_POST['Cno'])) {
        $com .= ' AND c.Cno LIKE "%' . mysqli_real_escape_string($db, $_POST['Cno']) . '%"';
      }

      $result = mysqli_query($db, $com);

      if ($result) {
        if (mysqli_num_rows($result) > 0) { //检查查询结果是否包含行
          while ($row = mysqli_fetch_object($result)) {
            echo "<tr>";
            echo "<td>{$row->学号}</td>";
            echo "<td>{$row->姓名}</td>";
            echo "<td>{$row->授课老师}</td>";
            echo "<td>{$row->课程名称}</td>";
            echo "<td>{$row->开课时间}</td>";
            echo "<td>{$row->课程得分}</td>";
            echo "<td>";
            echo '<a class="icon-link icon-link-hover" href="modiElevtives.php?Eno=' . $row->选课ID . '">修改/添加分数</a>'; //其中传递Eno到modiElevtives.php来Get
            echo "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='7'>没有找到符合条件的记录</td></tr>";
        }
      } else {
        echo "<tr><td colspan='7'>查询出错: " . mysqli_error($db) . "</td></tr>"; //检查查询本身出现错误
      }
      ?>

  </table>
</div>


</div>
<?php
mysqli_close($db);
?>