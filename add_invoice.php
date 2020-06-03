<?php
include "./com/base.php";

// 實務上，表單欄位的過濾、安全性、injection:如:
// $period=stripslashes trim($_POST['period']);

// $sql="insert into invoice (`period`,`year`,`code`,`number`,`expend`) values('".$_POST['period']."','".$_POST['year']."','".$_POST['code']."','".$_POST['number']."','".$_POST['expend']."')";
// $res=$pdo->exec($sql);


$data=[
    'period'=>$_POST['period'],
    'year'=>$_POST['year'],
    'code'=>$_POST['code'],
    'number'=>$_POST['number'],
    'expend'=>$_POST['expend']
];

$res=save("invoice",$data);

if($res==1){
    echo "<br>新增成功<br>";
    // header('location:index.php');
}else{
    echo "<br>新增失敗<br>";
}
echo "<a href='index.php'>繼續輸入</a><br>";
echo "<a href='list.php'>發票列表</a><br>";


?> 