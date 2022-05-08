<?php
//перенос строки . '<br/>';
    echo 'Привет <br/>';
    echo 'Сегодня '. date('d.m.y'). '<br/>' ;
    echo 'Сейчас '. date('h:i'). '<br/>';

    //переменная variable
    $date = date('d.m.y');
    echo $date. '<br/>';

    //array
    $a = array('name' => 'Alex', 'surname' => 'Sobol');
    echo 'Моё имя - '. $a['name']. '<br/>';

    // деление по модулю "%"
    echo (10%3). '<br/>';

    // foreach
    $ari = [123,122,1,2,4,5,65,7];
    foreach($ari as $value)
    {
//        if($value%2) echo $value. '<br/>';
    get_chet($value);
    }

    function get_chet($a)
    {
        if($a%2);
        else echo $a. '<br/>';
    }

//  abs - модуль.
//  round - округление
//  ceil - округление в+
//  floor - округление в-
//  min - минимальное из
    echo 'минимальное - '. min($ari). '<br>';
    echo 'максимальное - '. max($ari). '<hr>';

//SQL

//    шпаргалка по запросам MYSQL в текущей базе
// INSERT (вставить) INTO (куда) `таблица` (` где Ё) (`поле`) VALUES (значение) ("значение, текст")
// INSERT INTO `articles` (`title`,`text`,`date`) VALUES ("ещё одна статья",'кучка текста', NOW());
// SELECT (выбрать) `поле` (что или количество COUNT(`поле`)) FROM (в где) `название таблицы`
    // COUNT(`id`) AS 'total_count' (псевдоним ага)
    // WHERE (где) условие `title` = "ещё одна статья"
    // ORDER (сортировка) BY (по) `поле` DESK (инвертировать) LIMIT (ограничить) от,сколько (или просто, сколько)
// UPDATE (обновить) `таблица` SET (задать) `поле` = "текст" WHERE (где) условие;
// DELETE (удалить) 'имя базы' WHERE (где) условие OR (или) AND (и) и прочие.

//    подключаемся
    $connect = mysqli_connect('127.0.0.1','root','root','test_db');
    if ($connect) echo 'база данных подключена <br>';
    else {echo 'чот не подключается <br>'; echo mysqli_connect_error(); exit();}
//    проверяем
    $result = mysqli_query($connect, "select * from `articles`");

// сколько у нас записей?
$sum_zap = 0;
    while(($r1 = mysqli_fetch_assoc($result)))
    {   print_r($r1);
        echo '<br>';
    }
    echo "Записей - ". mysqli_num_rows($result). '<hr>';

//    закроем phpсписок!
?>
<!-- список! -->
<ul>
    <?php
        $result = mysqli_query($connect, "select * from `articles`");
        while(($category = mysqli_fetch_assoc($result)))
        {
            echo '<li>'.$category['title'].'</li>';
        }
    ?>
</ul>

<!--форма-->
<form method="get" action="handle.php"> <!--если данных много, то post-->
    <input type="text" placeholder="name" name="login">
    <input type="text" placeholder="pass" name="pass">
    <hr>
    <input type="submit" value="OK">
</form>
<?php
//  закрываем соединение
    mysqli_close($connect);
?>