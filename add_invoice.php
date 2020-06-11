<?php
include_once "./com/base.php";

// 實務上，表單欄位的過濾、安全性、injection:如:
// $period=stripslashes trim($_POST['period']);

// $sql="insert into invoice (`period`,`year`,`code`,`number`,`expend`) values('".$_POST['period']."','".$_POST['year']."','".$_POST['code']."','".$_POST['number']."','".$_POST['expend']."')";
// $res=$pdo->exec($sql);

if(isset($_POST)){
    $data=[
        'period'=>$_POST['period'],
        'year'=>$_POST['year'],
        'code'=>$_POST['code'],
        'number'=>$_POST['number'],
        'expend'=>$_POST['expend'],
    ];

    save('invoice',$data);
    to("inputinvo.php?year=".$_POST['year']."&period=".$_POST['period']);

}else{
    to("inputinvo.php?year=1&period=1");
}

?> 