<?php

include "com/base.php";


echo "<pre>";
print_r($_POST);
echo "</pre>";


$year=$_POST['year'];
$period=$_POST['period'];

// 儲存特別獎
$num1=$_POST['num1'];
$data=[
    "year"=>$year,
    "period"=>$period,
    "number"=>$num1,
    "type"=>1,
];
save($table,$data);

$num2=$_POST['num2'];
$data=[
    "year"=>$year,
    "period"=>$period,
    "number"=>$num2,
    "type"=>2,
];
save($table,$data);

$num3=$_POST['num3'];
foreach($num3 as $num){
    $data=[
        "year"=>$year,
        "period"=>$period,
        "number"=>$num,
        "type"=>3,
    ];
    save($table,$data);
}

$num3=$_POST['num4'];
foreach($num4 as $num){
    $data=[
        "year"=>$year,
        "period"=>$period,
        "number"=>$num,
        "type"=>4,
    ];
    save($table,$data);
}

to("invoice.php");

?>