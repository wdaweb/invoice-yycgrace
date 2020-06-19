<?php

include_once "com/base.php";

// count()

if($_POST['year']!=0){

    $table="invo_award_number";
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
    
    // 特獎
    $num2=$_POST['num2'];
    $data=[
        "year"=>$year,
        "period"=>$period,
        "number"=>$num2,
        "type"=>2,
    ];
    save($table,$data);
    
    // 頭獎
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
    
    // 增開六獎
    $num4=$_POST['num4'];
    foreach($num4 as $num){
        $data=[
            "year"=>$year,
            "period"=>$period,
            "number"=>$num,
            "type"=>4,
        ];
        save($table,$data);
    }
    
    // 如何判別，若獎項為空值就不輸入? (如增開六獎)
    
    to("inputaward.php?year=$year&period=$period");

}else{
    to("inputaward.php?year=ops&period=ops");
}



?>