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
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">学号</th>
        <th scope="col">姓名</th>
        <th scope="col">奖项名称</th>
        <th scope="col">获奖等级</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once("../../config/database.php");

      $com = 'SELECT 
                        s.Sno AS 学号,
                        s.Sname AS 姓名,
                        h.Honname AS 奖项名称,
                        a.Awdname AS 奖项等级
                    FROM 
                        student s
                    JOIN 
                        awd a ON s.Sno = a.Sno
                    JOIN 
                        honors h ON h.honid = a.Awdid
                    WHERE 1=1';

      if (!empty($_POST['Sno'])) {
        $com .= ' AND s.Sno LIKE "%' . mysqli_real_escape_string($db, $_POST['Sno']) . '%"';
      }
      if (!empty($_POST['Sname'])) {
        $com .= ' AND s.Sname LIKE "%' . mysqli_real_escape_string($db, $_POST['Sname']) . '%"';
      }

      $result = mysqli_query($db, $com);

      if ($result) {
        if (mysqli_num_rows($result) > 0) { //检查查询结果是否包含行
          while ($row = mysqli_fetch_object($result)) {
            echo "<tr>";
            echo "<td>{$row->学号}</td>";
            echo "<td>{$row->姓名}</td>";
            echo "<td>{$row->奖项名称}</td>";
            echo "<td>{$row->奖项等级}</td>";
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