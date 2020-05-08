<?php
include "./com/base.php";

// 實務上，表單欄位的過濾、安全性、injection:如:
// $period=stripslashes trim($_POST['period']);

$sql="insert into invoice (`period`,`year`,`code`,`number`,`expend`) values('".$_POST['period']."','".$_POST['year']."','".$_POST['code']."','".$_POST['number']."','".$_POST['expend']."')";

$res=$pdo->exec($sql);

if($res==1){
    echo "新增成功";
}else{
    echo "新增失敗";
}


?>