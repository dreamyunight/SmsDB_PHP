<?php

require_once("../config/database.php");
if (!$db) {
  die('Fail to connect to Server');
} //如果连接失败就报错并且中断程序

$_Sname   = $_POST['Sname'];
$_Ssex    = $_POST['Ssex'];
$_Sno     = $_POST['Sno'];
$_Semail  = $_POST['Semail'];
$_Sdate   = $_POST['Sdate'];
$_Sdept   = $_POST['Sdept'];
$_Smajor  = $_POST['Smajor'];
$_Sclass  = $_POST['Sclass'];
