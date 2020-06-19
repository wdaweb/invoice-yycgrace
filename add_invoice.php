<?php
include_once "./com/base.php";

// 實務上，表單欄位的過濾、安全性、injection:如:
// $period=stripslashes trim($_POST['period']);

if($_POST['year']!=0){
    $data=[
        'period'=>$_POST['period'],
        'year'=>$_POST['year'],
        'code'=>$_POST['code'],
        'number'=>$_POST['number'],
        'expend'=>$_POST['expend'],
    ];

    save('invo_invoice',$data);
    to("inputinvo.php?year=".$_POST['year']."&period=".$_POST['period']);

}else{
    to("inputinvo.php?year=ops&period=ops");
}

?> 