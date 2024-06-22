<?php

$local = "db";
$username = "root";
$password = "123456";
$dbname = "test";
$db = mysqli_connect($local, $username, $password, $dbname);

if (!$db) {
  die('Fail to connect to Server');
} //如果连接失败就报错并且中断程序

mysqli_set_charset($db, "utf8mb4");
