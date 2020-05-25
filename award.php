<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>統一發票管理系統</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php include "./include/header.php";
    
    $year=2020;
    $period=1;

    $sql="select * from `invoice` where `period`='."$year".' and `period`='."$period".'";
    $invoice=$pdo->query($sql)->fetchAll();

    ?>

<?php

if(empty($_GET)){
    echo "請選擇要對獎的項目<a href='incvoice.php'>各期獎號</a>";
    exit();
} 

$award_type=[
    1=>["特別獎",1,8];
    2=>["特獎",2,8];
    3=>["頭獎",3,8];
    4=>["二獎",3,7];
    5=>["三獎",3,6];
    6=>["四獎",3,5];
    7=>["五獎",3,4];
    8=>["六獎",3,3];
    9=>["增開六獎",4,3];  
];

echo "獎別:".$award_type[$_GET['aw']][0]."<br>";
echo "年份:".$_GET['year']


?>



<table>
    <tr>
        <td>id</td>
        <td>code</td>
        <td>number</td>
        <td>expend</td>
        <td>是否中獎</td>
    </tr>
<?php
    foreach($invoice as $row){
?>
    <tr>
        <td><?=$row['id'];?></td>
        <td><?=$row['code'];?></td>
        <td><?=$row['number'];?></td>
        <td><?=$row['expend'];?></td>
        <td><?=$checkaward;?></td>
    </tr>
<?php
    }
?>
</table>
    <button>對獎</button>

<?php
// $sql="select * from award_number where `period`='$year' and `period`='$period'";
// $award=$pdo->query($sql)->fetchAll();

// // 特別獎及特獎:全部相同
// if ($invoice['code']=$award['code'] && $invoice['number']=$award['number']){
//     echo "恭喜中大獎";
// }else{
//     echo "QQ沒中";
// }

// 頭獎:全部相同+部分相同


$invoices=all("invoice",[
    "year"=>$_GET['year'],
    "period"=>$_GET['period'],]);




?>


</body>
</html>