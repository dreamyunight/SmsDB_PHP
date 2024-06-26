<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>查询课程</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>查询课程</title>
  <link rel="stylesheetlocal" type="text/css" href="css/addStudent.css">
  <!-- Custom styles for this template -->
  <link href="checkout.css" rel="stylesheet">
</head>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">课程编号</th>
        <th scope="col">课程名称</th>
        <th scope="col">上课时间</th>
        <th scope="col">教学老师</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once("../../config/database.php");

      $com = 'SELECT 
                  c.cno AS 课程编号,
                  c.Cname AS 课程名称,
                  g.startDate AS 上课时间,
                  t.Tname AS 教学老师
              FROM 
                  course c
              LEFT JOIN 
                  giveLessons g ON c.Cno = g.Cno
              LEFT JOIN
                  teacher t ON t.Tno = g.Tno 
              WHERE 1=1';

      if (!empty($_POST['Tname'])) {
        $com .= ' AND t.Tname LIKE "%' . mysqli_real_escape_string($db, $_POST['Tname']) . '%"';
      }
      if (!empty($_POST['Cno'])) {
        $com .= ' AND t.Tno LIKE "%' . mysqli_real_escape_string($db, $_POST['Cno']) . '%"';
      }

      $result = mysqli_query($db, $com);

      if ($result) {
        if (mysqli_num_rows($result) > 0) { //检查查询结果是否包含行
          while ($row = mysqli_fetch_object($result)) {
            echo "<tr>";
            echo "<td>{$row->课程编号}</td>";
            echo "<td>{$row->课程名称}</td>";
            echo "<td>{$row->上课时间}</td>";
            echo "<td>{$row->教学老师}</td>";
            // echo "<td>";
            // echo '<a class="icon-link icon-link-hover" href="modiStudent.php?Sno=' . $row->学号 . '">修改<svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg></a>';
            // echo "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='7'>没有找到符合条件的记录</td></tr>";
        }
      } else {
        echo "<tr><td colspan='7'>查询出错: " . mysqli_error($db) . "</td></tr>"; //检查查询本身出现错误
      }
      mysqli_close($db);
      ?>

  </table>
</div>


</div>
<?php


?>