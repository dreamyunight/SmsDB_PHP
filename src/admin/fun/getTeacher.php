<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>学生管理>>查询学生</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <title>查询学生</title>
  <link rel="stylesheetlocal" type="text/css" href="css/addStudent.css">
  <!-- Custom styles for this template -->
  <link href="checkout.css" rel="stylesheet">
</head>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">教师编号</th>
        <th scope="col">教师姓名</th>
        <th scope="col">所属院系</th>
        <th scope="col">所教课程</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once("../../config/database.php");

      $com = 'SELECT 
                  t.Tno AS 教师编号,
                  t.Tname AS 教师姓名,
                  d.Dname AS 所属院系,
                  c.Cname AS 所教课程
              FROM 
                  teacher t
              JOIN 
                  giveLessons g ON t.Tno = g.Tno
              JOIN 
                  course c ON g.Cno = c.Cno
              JOIN 
                  dept d ON t.Dno = d.Dno
              WHERE 1=1';

      if (!empty($_POST['Tname'])) {
        $com .= ' AND t.Tname LIKE "%' . mysqli_real_escape_string($db, $_POST['Tname']) . '%"';
      }
      if (!empty($_POST['Tno'])) {
        $com .= ' AND t.Tno LIKE "%' . mysqli_real_escape_string($db, $_POST['Tno']) . '%"';
      }
      if (!empty($_POST['Sdept'])) {
        $com .= ' AND d.Dname LIKE "%' . mysqli_real_escape_string($db, $_POST['Sdept']) . '%"';
      }

      $result = mysqli_query($db, $com);

      if ($result) {
        if (mysqli_num_rows($result) > 0) { //检查查询结果是否包含行
          while ($row = mysqli_fetch_object($result)) {
            echo "<tr>";
            echo "<td>{$row->教师编号}</td>";
            echo "<td>{$row->教师姓名}</td>";
            echo "<td>{$row->所属院系}</td>";
            echo "<td>{$row->所教课程}</td>";
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