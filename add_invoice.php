<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增開獎獎號</title>
</head>
<body>
<?php include "./include/header.php";?>


<form action="save_number.php" method="post">
<table>
    <tr>
        <td>年月份</td>
        <td>
            <select name="year">
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
            <select name="period">
                <optioon value="1">1,2月</optioon>
                <optioon value="2">3,4月</optioon>
                <optioon value="3">5,6月</optioon>
                <optioon value="4">7,8月</optioon>
                <optioon value="5">9,10月</optioon>
                <optioon value="6">11,12月</optioon>
            </select>

        </td>
    </tr>
    <tr>
        <td>特別獎</td>
        <td>        
            <!-- <input type="hidden" name="item" value="特別獎"> -->
            <input type="text" name="number">
        </td>
    </tr>
    <tr>
        <td>特獎</td>
        <td>
            <!-- <input type="hidden" name="item" value="特獎"> -->
            <input type="text" name="number">
        </td>
    </tr>
    <tr>
        <td>頭獎</td>
        <td>
            <!-- <input type="hidden" name="item" value="頭獎"> -->
            <input type="text" name="number">
            <input type="text" name="number">
            <input type="text" name="number">
        </td>
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
        <td>
            <!-- <input type="hidden" name="item" value="增開"> -->
            <input type="text" name="number">
            <input type="text" name="number">
        </td>
    </tr>
</table>
    <input type="submit" value="submit">
    <input type="reset" value="reset">
</form>

<?php

echo $_GET['period']."<br>".$_GET['item']."<br>".$_GET['number']."<br>".$_GET['year'];

// $sql="insert into award_number(`period`,`item`,`number`,`year`) values("$_GET['period']","$_GET['item']","$_GET['number']","$_GET['year']")";
?>  


</body>
</html>