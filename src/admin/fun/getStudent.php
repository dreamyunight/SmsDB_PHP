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
        <th scope="col">学号</th>
        <th scope="col">姓名</th>
        <th scope="col">性别</th>
        <th scope="col">年龄</th>
        <th scope="col">班级</th>
        <th scope="col">专业</th>
        <th scope="col">院系</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once("../../config/database.php");

      $com = 'SELECT 
                        s.Sno AS 学号,
                        s.Sname AS 姓名,
                        s.Ssex AS 性别,
                        YEAR(CURDATE()) - YEAR(s.Sdate) AS 年龄,
                        c.clsname AS 班级,
                        m.Mname AS 专业,
                        d.Dname AS 学院
                    FROM 
                        student s
                    JOIN 
                        classes c ON s.Clsno = c.Clsno
                    JOIN 
                        major m ON s.Mno = m.Mno
                    JOIN 
                        dept d ON s.Dno = d.Dno
                    WHERE 1=1';

      if (!empty($_POST['Sno'])) {
        $com .= ' AND s.Sno LIKE "%' . mysqli_real_escape_string($db, $_POST['Sno']) . '%"';
      }
      if (!empty($_POST['Sname'])) {
        $com .= ' AND s.Sname LIKE "%' . mysqli_real_escape_string($db, $_POST['Sname']) . '%"';
      }
      if (!empty($_POST['Sclass'])) {
        $com .= ' AND c.clsname LIKE "%' . mysqli_real_escape_string($db, $_POST['Sclass']) . '%"';
      }
      if (!empty($_POST['Smajor'])) {
        $com .= ' AND m.Mname LIKE "%' . mysqli_real_escape_string($db, $_POST['Smajor']) . '%"';
      }
      if (!empty($_POST['Sdept'])) {
        $com .= ' AND d.Dname LIKE "%' . mysqli_real_escape_string($db, $_POST['Sdept']) . '%"';
      }

      $result = mysqli_query($db, $com);

      if ($result) {
        if (mysqli_num_rows($result) > 0) { //检查查询结果是否包含行
          while ($row = mysqli_fetch_object($result)) {
            echo "<tr>";
            echo "<td>{$row->学号}</td>";
            echo "<td>{$row->姓名}</td>";
            echo "<td>{$row->性别}</td>";
            echo "<td>{$row->年龄}</td>";
            echo "<td>{$row->班级}</td>";
            echo "<td>{$row->专业}</td>";
            echo "<td>{$row->学院}</td>";
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