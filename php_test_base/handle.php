<?php
// если прислали get то будет переменная $_GET суперглобальный массив
print_r($_GET); echo '<hr>';
// попытка обмануть систему, создав фиктивную переменную. И это заработало!
$connect =0;
// подключаем БД
include_once ('includes/db.php');
// присваиваем переменные
$login = $_GET['login'];
$pass = $_GET['pass'];

$count = mysqli_query($connect, "SELECT * FROM `users` WHERE `name` = '$login' AND `pass` = '$pass'");
    if (mysqli_num_rows($count) == 0) echo "нет такого";
    else echo 'Привет, '. $login.'!';
//$record