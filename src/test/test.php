<?php
//学生无法访问
session_start();
if (!isset($_SESSION["admin"])) {
  header("HTTP/1.1 403 Moved Temporatily");
  header("Location: " . "../");
  exit();
}
if ($_SESSION["limit"] == "student") {
  header("HTTP/1.1 403 Moved Temporatily");
  echo "<script>alert('学生无权限');history.go(-1);</script>";
  header("Location: " . "../");
  exit();
}
?>
<?php
//登陆即可访问
session_start();
if (!isset($_SESSION["admin"])) {
  header("HTTP/1.1 403 Moved Temporatily");
  header("Location: " . "../");
  exit();
}
?>