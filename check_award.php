<?php
    include_once "./com/base.php";

    $award_type=[
        // 對應有幾種獎項,對應的獎項名稱,比對的開獎獎項(號碼在陣列裡),與開獎號碼比對數字個數
        // (獎項[key],獎項名稱_字串[0],開出號_變數[1],比對數_參數[2])
        1=>['特別獎',1,8,10000000],
        2=>['特獎',2,8,2000000],
        3=>['頭獎',3,8,200000],
        4=>['二獎',3,7,40000],
        5=>['三獎',3,6,10000],
        6=>['四獎',3,5,4000],
        7=>['五獎',3,4,1000],
        8=>['六獎',3,3,200],
        9=>['增開六獎',4,3,200],
    ];
    
// 前頁丟過來的get值設為變數,並依其撈出資料庫的獎號與發票
if(!empty($_GET['year']) && !empty($_GET['period']) && !empty($_GET['aw'])){
    $aw=$_GET['aw'];
    $year=$_GET['year'];
    $period=$_GET['period'];
        
    // 撈出獎號
    $q_award=all('invo_award_number',[
        'year'=>$year,
        'period'=>$period,
        'type'=>$award_type[$aw][1],
    ]);

    // 撈出發票
    $q_invo=all('invo_invoice',[
        'year'=>$year,
        'period'=>$period,
    ]);
    
}


// 若獎號與發票其中一個不存在,就停止比對(回傳awget結果)
if(empty($q_award)==1){
    to("award.php?aw=$aw&year=$year&period=$period&awget=opsa");
}else if(empty($q_invo)==1){
    to("award.php?aw=$aw&year=$year&period=$period&awget=opsi");
}else{

// 開始比對獎號與發票
    // 發票陣列
    foreach ($q_invo as $invon){
        // 獎號陣列
        foreach ($q_award as $awn){
            $len=$award_type[$aw][2];
            $start=8-$len;
            
            // 獎項目標號碼
            if($aw!=9){
                $target_num=mb_substr($awn['number'],$start,$len);
            }else{
                $target_num=$awn['number'];
            }
        
            // 發票目標號與獎項目標號比對
            if(mb_substr($invon['number'],$start,$len) == $target_num){

                $data=[
                    'invo_id'=>$invon['id'],
                    'year'=>$year,
                    'period'=>$period,
                    'prize'=>$award_type[$aw][0],
                    'bonus'=>$award_type[$aw][3],
                ];

                // 新增判斷當筆資料是否存在,若不存在則存取中獎紀錄
                $qdata=find("invo_reward_record",['invo_id'=>$invon['id']]);
                if(empty($qdata)){
                    save("invo_reward_record",$data);
                    // $id=$qdata['id'];
                }
            }
        }
    }

// 迴圈全部跑完之後再判斷當期是否有中獎
    $q_reward=all('invo_reward_record',['year'=>$year,'period'=>$period,'prize'=>$award_type[$aw][0]]);
    if(!empty($q_reward)){
        to("award.php?aw=$aw&year=$year&period=$period&awget=yep");
    }else{
        to("award.php?aw=$aw&year=$year&period=$period&awget=none"); 
    }
}

?>
