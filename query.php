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
include "./com/base.php";

$sql="select * from award_number";
$awards=$pdo->query($sql)->fetchAll();

?>

<nav>
<div><a href="query.php?period=1">第1期</a></div>
<div><a href="query.php?period=2">第2期</a></div>
<div><a href="query.php?period=3">第3期</a></div>
<div><a href="query.php?period=4">第4期</a></div>
<div><a href="query.php?period=5">第5期</a></div>
<div><a href="query.php?period=6">第6期</a></div>
</nav>

    <table>
        <tr>
            <td colplas=3>幾年幾期<?=;?></td>
        </tr>
        <?php
        foreach($award as $row)
        ?>
        <tr>
            <td><?=$row['item'];?></td>
            <td><?=$row['number'];?></td>
            <td>編輯</td>
        </tr>
        <?php
        }
        ?>
        </table>
<?php
$sql="update";
?>

</body>
</html>