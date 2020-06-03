<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php
include "./include/header.php";
include "./com/base.php";


if(isset($_GET['period'])){
    $period=$_GET['period'];
}else{
    $period=ceil(date("n")/2);
}

$year=date("Y");
$awards=all('award_number',['year'=>$year,'period'=>$period]);
?>

<nav>
<a href="query.php?period=1">第1期</a>
<a href="query.php?period=2">第2期</a>
<a href="query.php?period=3">第3期</a>
<a href="query.php?period=4">第4期</a>
<a href="query.php?period=5">第5期</a>
<a href="query.php?period=6">第6期</a>
</nav>

<table>
    <tr>
        <td colplas=3><?=$year;?>年<?=$period;?>期</td>
    </tr>
    <?php
    if(!empty($awards)){
        foreach($awards as $row){
    ?>
        <tr>
            <td><?=$row['type'];?></td>
            <td><?=$row['number'];?></td>
            <td><a herf=""><button>編輯</button></a></td>
        </tr>
    <?php
        }
    }else{
        echo "<tr><td>oops!還沒開獎哦!</td></tr>";
    }
    ?>
</table>

</body>
</html>