<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include "./include/header.php";?>

<a href="add_invoice.php"><button>新增獎號</button></a>

<?php

$num1=find('award_number',['period'=>$period,'year'=>$year,'type'=>1]);
$num2=find('award_number',['period'=>$period,'year'=>$year,'type'=>2]);
$num3=all('award_number',['period'=>$period,'year'=>$year,'type'=>3]);
$num4=all('award_number',['period'=>$period,'year'=>$year,'type'=>4]);

?>

<table>
    <tr>
        <td>年月份</td>
        <td><?=$year;?>年<?=$monthStr[];?></td>
    </tr>
        <td>特別獎</td>
        <td><?php
        if(!empty($num1['number'])){
            echo $num1['number'];
        };
        ?></td>
        <td><a href="award.php?type=3&year=<?=$year;?>&period=<?=$period;?>"></a> </td>
    <
    <tr>
        <td>特獎</td>
        <td><?=$num2;?></td>
    </tr>
    <tr>
        <td>頭獎</td>
        <td><?=$num3;?></td>
    </tr>
    <tr>
        <td>二獎</td>
        <td></td>
    </tr>
    <tr>
        <td>三獎</td>
        <td></td>
    </tr>
    <tr>
        <td>四獎</td>
        <td></td>
    </tr>
    <tr>
        <td>五獎</td>
        <td></td>
    </tr>
    <tr>
        <td>六獎</td>
        <td></td>
    </tr>
    <tr>
        <td>增開六獎</td>
        <td><?=$num4;?></td>
    </tr>
</table>





<a href="query.php"><button>查看獎號</button></a>
</body>
</html>