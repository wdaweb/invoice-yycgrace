<?php

include_once "com/base.php";

$num=1000;
$chr=["A","B","C","D","E","F","G","H","I","J","K","L"]


for($i=0;$i<$num;$i++){
    $code=$char[rand(0,11)] . $char[rand(0,11)];
    $data=[
        'period'=>rand(1,6),
        'year'=>rand(2020,2021),
        'code'=>,
        'number'=>rand(12121212,99999999),
        'expend'=>rand(100,10000),
    ];

    // echo "以新增".$data["code"] . $data['number'] . "<br>";
    save("invoice",$data)
}



?>