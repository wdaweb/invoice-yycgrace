<?php
    include_once "./com/base.php";

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
    
// 前頁丟過來的get值設為變數,並依其撈出資料庫的獎號與發票
if(!empty($_GET['year']) && !empty($_GET['period']) && !empty($_GET['aw'])){
    $aw=$_GET['aw'];
    $year=$_GET['year'];
    $period=$_GET['period'];
        
    // 撈出獎號
    $q_award=all('award_number',[
        'year'=>$year,
        'period'=>$period,
        'type'=>$award_type[$aw][1],
    ]);

    print_r($q_award);
    echo "<hr>";

    // 撈出發票
    $q_invo=all('invoice',[
        'year'=>$year,
        'period'=>$period,
    ]);

    print_r($q_invo);
    echo "<hr>";

    // 開始比對獎號與發票
    // 發票陣列
    foreach ($q_invo as $invon){
        // 獎號陣列
        foreach ($q_award as $awn){
            $len=$award_type[$aw][2];
            $start=8-$len;

            print_r($invon);
            echo "<hr>";
            
            print_r($awn);
            echo "<hr>";
            
            // 獎項目標號碼
            if($aw!=9){
                $target_num=mb_substr($awn['number'],$start,$len);
            }else{
                $target_num=$awn['number'];
            }
        
            // 發票目標號與獎項目標號比對
            if(mb_substr($invon['number'],$start,$len) == $target_num){
    
                // 新增判斷當筆資料是否存在
                $q=[
                    'code'=>$invon['code'],
                    'number'=>$invon['number'],
                ];
                
                $data=[
                    'code'=>$invon['code'],
                    'number'=>$invon['number'],
                    'period'=>$invon['period'],
                    'reward'=>$award_type[$aw][3],
                    'expend'=>$invon['expend'],
                    'year'=>$invon['year'],
                ];
                
                $findq=find("reward_record",$q);

                print_r($findq);
                echo "這是findq<hr>";
                // 若不存在則存取中獎紀錄  
                if(!isset($findq)){
                    save("reward_record",$data);
                }
    
                // $qaw=find("reward_record",['number'=>$invon['number'],]);
                // foreach($qaw as $q){
                //     $id=$q['id'];
                // }
                to("award.php?aw=$aw&year=$year&period=$period&awget=yep");
                // echo save("reward_record",$data);
            }else{
                to("award.php?aw=$aw&year=$year&period=$period&awget=none");
            }
        }
    }
// }else if(!isset($q_award) || !isset($q_invo)){
//     // 無法對獎:沒發票或沒獎項
//     // to("award.php?aw=$aw&year=$year&period=$period&awget=ops");
// }
}








?>

