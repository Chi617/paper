<?php
$link = @mysqli_connect("localhost","root","") 
      or die("無法開啟資料庫連接!<br/>");
mysqli_select_db($link, "peper");
?>