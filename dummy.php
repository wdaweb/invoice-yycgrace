<?php

include_once "com/base.php";

$num=500;
$char=["A","B","C","D","E","F","G","H","I","J","K","L"];


for($i=0;$i<$num;$i++){
    $code=$char[rand(0,11)] . $char[rand(0,11)];
    $data=[
        'period'=>rand(1,6),
        'year'=>rand(2019,2020),
        'code'=>$code,
        'number'=>rand(12121212,99999999),
        'expend'=>rand(100,10000),
    ];

    // echo "以新增".$data["code"] . $data['number'] . "<br>";
    save("invo_invoice",$data);
}



?>