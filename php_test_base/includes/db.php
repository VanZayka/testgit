<?php
$connect = mysqli_connect('127.0.0.1','root','root','test_db');
if ($connect) echo 'база данных подключена <hr>';
else {echo 'чот не подключается <hr>'; echo mysqli_connect_error(); exit();}
?>