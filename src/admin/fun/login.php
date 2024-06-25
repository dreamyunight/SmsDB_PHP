<?php

require_once("../../config/database.php");

if (!$db) {
  die('Fail to connect to Server');
} //如果连接失败就报错并且中断程序

$user = $_POST['username'];
$pass = $_POST['password'];
if ($user == null || $pass == null) {
  // echo "<script>alert('你没有管理员！')</script>";
  die("账号和密码不能为空!");
}

function check_param($value = null)
{ //preg_match函数检查传入的$value中是否包含$str中的任何一个关键字或符号。eregi函数执行不区分大小写的正则表达式匹配。如果匹配成功，则条件为真。
  $str = 'select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile';
  if (preg_match("/$str/i", $value)) { //使用preg_match函数执行不区分大小写的正则表达式匹配。/i修饰符表示忽略大小写。
    exit('参数非法！');
  }
  return true;
}

if (check_param($user) && check_param($pass)) {
  $sql = 'select * from teacher where Tno=' . "'{$user}'and Tpassword=" . "'$pass';";
  $res = mysqli_query($db, $sql);
  $row = $res->num_rows; //将获取到的用户名和密码拿到数据库里面去查找匹配
  if ($row != 0) {
    session_start();
    $_SESSION["admin"] = $user;
    header('Location: ../home.php');
  } else {
    echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
  }
}
