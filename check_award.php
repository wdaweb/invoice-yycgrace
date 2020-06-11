<?php
    include "./com/base.php";

    $award_type=[
        // 對應有幾種獎項,對應的獎項名稱,比對的開獎獎項(號碼在陣列裡),與開獎號碼比對數字個數
        // (獎項[key],獎項名稱_字串[0],開出號_變數[1],比對數_參數[2])
        1=>['特別獎',1,8,999],
        2=>['特獎',2,8,999],
        3=>['頭獎',3,8,999],
        4=>['二獎',3,7,999],
        5=>['三獎',3,6,999],
        6=>['四獎',3,5,999],
        7=>['五獎',3,4,999],
        8=>['六獎',3,3,200],
        9=>['增開六獎',4,3,200],
    ];
    
    // 前頁丟過來的get值設為變數,並依其撈出資料庫的當期獎號與發票
    if(!empty($_GET['year']) && !empty($_GET['period']) && !empty($_GET['aw'])){
        $aw=$_GET['aw'];
        $year=$_GET['year'];
        $period=$_GET['period'];
        
        $q_award=all('award_number',[
            'year'=>$year,
            'period'=>$period,
            'type'=>$award_type[$aw][1],
        ]);
        $q_invo=all('invoice',[
            'year'=>$year,
            'period'=>$period,
        ]);
    }else{
        to("award.php");
    }


    // print_r ($q_award);
    // echo "<hr>";
    // print_r ($q_invo);
    // echo "<hr>";
    // echo $aw;
    // echo "<hr>";
    // echo $award_type[$aw][0];
    // echo "<hr>";
    // echo $award_type[$aw][1];
    // echo "<hr>";
    // echo $award_type[$aw][2];
    // echo "<hr>";
    // echo $award_type[$aw][3];



foreach ($q_invo as $invon){
    foreach ($q_award as $awn){
        $len=$award_type[$aw][2];
        $start=8-$len;

        // echo "<hr>";
        // echo $len;
        // echo "<hr>";
        // echo $start;



        // 獎項目標號碼
        if($_GET['aw']!=9){
            $target_num=mb_substr($awn['number'],$start,$len);
        }else{
            $target_num=$awn['number'];
        }


        // echo "<hr>";
        // echo "獎項目標號碼".$target_num;


        // 發票目標號與獎項目標號比對
        if(mb_substr($invon['number'],$start,$len) == $target_num){
            
            $data=[
            'code'=>$invon['code'],
            'number'=>$invon['number'],
            'period'=>$invon['period'],
            'expend'=>$invon['expend'],
            'year'=>$invon['year'],
            'reward'=>$award_type[$aw][3],
            ];

            // 新增判斷當筆資料是否存在
            $q=[
                'code'=>$invon['code'],
                'number'=>$invon['number'],
            ];
            $q_data=find("reward_record",$q);
            if(!isset($q_data)){
                save("reward_record",$data);
            }
            
            $tmp=array('number'=>$invon['number'],);
            $award_get=find("reward_record",$tmp);
            $id=$award_get['id'];
            // echo "<hr>";
            // echo "中獎了";
            // print_r ($data);
            
            // $_COOKIE[$awget];
            header("location:award.php?aw=$aw&year=$year&period=$period&aw=$aw&awget=$id");
            
        }else{
            header("location:award.php?aw=$aw&year=$year&period=$period&aw=$aw&awget=0");
        }

        // echo "<hr>";
        // echo "發票目標號碼".mb_substr($invon['number'],$start,$len);

        
    }
}



// // 年分
// $year
// // 期數
// $period
// // 獎項名稱
// $award_type[$aw][0];
// // 開出號對應
// $award_type[$aw][1]; //僅撈出號碼
// // 計算當期獎號筆數
// $award_nums=nums("award_number",[
//     "year"=>$year,
//     "period"=>$period,
//     "type"=>$award_type[$aw][1],
// ]);
// // 撈出當期獎號資料並做成陣列
// $award_nums=all("award_number",[
//     "year"=>$year,
//     "period"=>$period,
//     "type"=>$award_type[$aw][1],
// ]);
// // 比對參數
// $award_type[$aw][2];


// // 撈出當月所有發票及開獎號碼
// $data=[
//     'year' => $year,
//     'period' => $period,
// ];
// $invoices=all('invoice',$data);
// $award=all('award_number',$data);

// // 對獎
// // invoices比對
// foreach ($invoices as $ins){
//     foreach($)
// }














// foreach ($award as $a){

//     $a['number'];
//     foreach ($invo as $i){
//         $i['number'];
        
//         echo "開獎號碼".$a['number']."<br>";
//         echo "發票號碼".$i['number']."<br>";

//         switch{
//             case ($a['number']==$i['number']):echo "相同<br>";
//         break;
//         }
//     }


// }









// $sql="select * from award_number where `period`='$year' and `period`='$period'";
// $award=$pdo->query($sql)->fetchAll();

// // 特別獎及特獎:全部相同
// if ($invoice['code']=$award['code'] && $invoice['number']=$award['number']){
//     echo "恭喜中大獎";
// }else{
//     echo "QQ沒中";
// }

// 頭獎:全部相同+部分相同


// $invoices=all("invoice",[
//     "year"=>$_GET['year'],
//     "period"=>$_GET['period'],]);


// ***********若中獎寫入reward_record資料表

// $data=[
//     'id'=>,
//     'number'=>,
//     'period'=>,
//     'reward'=>,
//     'year'=>,
// ];
// save($teble,$data);

?>

