<?php include "./com/base.php";?>
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

<h1>發票列表</h1>
<h4>My Invoice List</h4>
<div class="nav">
    <div><a href="list.php?period=1">第1期</a></div>
    <div><a href="list.php?period=2">第2期</a></div>
    <div><a href="list.php?period=3">第3期</a></div>
    <div><a href="list.php?period=4">第4期</a></div>
    <div><a href="list.php?period=5">第5期</a></div>
    <div><a href="list.php?period=6">第6期</a></div>
</div>

<?php 
$period=ceil(date("n")/2);
if(isset($_GET['period'])){
    $period=$_GET['period'];
}

// 三元運算式
($period==1)?"green":"white";

/*
if(isset($_GET['period'])){
    $period=$_GET['period'];
}elseif(date("n")<3){
    $period=1;
}elseif(date("n")<5){
    $period=2;
}elseif(date("n")<7){
    $period=3;
}elseif(date("n")<9){
    $period=4;
}elseif(date("n")<11){
    $period=5;
}else{
    $period=6;
}
*/

$sql="select * from `invoice`";
$invoices=$pdo->query($sql)->fetchAll();

    
?>

<table>
    <tr>
        <td>編號</td>
        <td>標記</td>
        <td>號碼</td>
        <td>花費</td>
        <td>編輯</td>
    </tr>
    <?php
    foreach($invoices as $row){
    ?>
    <tr>
        <td><?=$row['id'];?></td>
        <td><?=$row['code'];?></td>
        <td><?=$row['number'];?></td>
        <td><?=$row['expend'];?></td>
        <td><button>編輯</button></td>
    </tr>
    <?php
    }
    $sql="update";
    ?>
</table>

    <!-- <a href="?period=">1.2月</a>
    <a href="?period=">3.4月</a>
    <a href="?period=">5.6月</a>
    <a href="?period=">7.8月</a>
    <a href="?period=">9.10月</a>
    <a href="?period=">11.12月</a> -->

</body>
</html>