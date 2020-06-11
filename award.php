
<?php
    include_once "./com/base.php";
    include_once "./include/header.php";

// 判別最新已開獎期數
// 排序是否可以設定兩個欄位的排序組合???如日期+期數


// 若從前頁接到年月,按鈕會跳轉成馬上開獎
if(isset($_GET['syear']) && isset($_GET['speriod'])){
    $qikyear=$_GET['syear'];
    $qikperiod=$_GET['speriod'];
    $qikbtn="Quick<br>Check";
    $qikp="<p class='text-warning small mt-3 mb-5'>快速對獎點這裡 ";
}else{
    $last_aw=all("award_number",""," order by id desc limit 0,1");

    foreach($last_aw as $d){
        $last_y=$d['year'];
        $last_p=$d['period'];
    }

    $qikyear=$last_y;
    $qikperiod=$last_p;
    $qikbtn="Newest<br>Award";
    $qikp="<p class='text-info small mt-3 mb-5'>最新對獎點這裡 ";
}


?>





<section class="content row fixed">

    <article class="contentLeft col-12 col-md-6">
        <div class="title">對獎專區</div>
        <h4>小確幸moment!</h4>
        <div class="search">
            <a href="award.php?year=<?=$qikyear;?>&period=<?=$qikperiod;?>">
                <div class="awardbtn sub">
                    <p><?=$qikbtn;?></p>
                </div>
            </a>
            <?=$qikp;?><i class="fas fa-sort-up"></i></p>

            <hr>
            <h4>前期對獎</h4>
            <form action="award.php" method="get">
                <div class="srchgp">
                <input type="text" name="year" size="3">
                    <select name="period">
                        <option value="1">一二月</option>
                        <option value="2">三四月</option>
                        <option value="3">五六月</option>
                    </select>
                </div>
                <div class="srchgp">
                    <input class="sub" type="submit" value="Go!">
                </div>
            </form>




        </div>
    </article>

    <article class="contentRight col-12 col-md-6">
    <div class="title">點點指尖對獎樂</div> 
        <div class="result row">

<?php

$aw=[
    1=>'特別獎',
    2=>'特獎',
    3=>'頭獎',
    4=>'二獎',
    5=>'三獎',
    6=>'四獎',
    7=>'五獎',
    8=>'六獎',
    9=>'增開獎',
];

if(!empty($_GET['year']) && !empty($_GET['period'])){

    echo "<h4 class='col-12'>".$_GET['year']."第".$_GET['period']."期</h4>";
    echo "<div class='row col-6'>";
    foreach($aw as $k=>$v){
        echo "<div class='chsbar col-12 ml-3'><a class='btn btn-outline-warning' href='check_award.php?aw=".$k."&year=".$_GET['year']."&period=".$_GET['period']."'>".$v."</a></div>";
    }
    echo "</div>";
    


    if(isset($_GET['awget']) && $_GET['awget']=='ops'){
        echo "<div class='text-warning' style='font-weight:900;font-size:2rem;line-height:3rem;'>沒有發票或獎號</div>";
    }else if(isset($_GET['awget']) && $_GET['awget']=='none'){
        echo "<div class='text-warning' style='font-weight:900;font-size:2rem;line-height:3rem;'>c8 c8 c8 沒中獎</div>";
    }else if(isset($_GET['awget']) && $_GET['awget']=='yep'){
        $aget=find("reward_record",['id'=> $_GET['awget'],]);
        echo "<div class='col-6'>";
        echo "<div class='text-warning' style='font-weight:900;font-size:2rem;line-height:3rem;'>中獎囉</div>";
        // echo "<div>獎項".$aw[$_GET['aw']]."</div>";
        // echo "<div>獎號".$aget['code']."-".$aget['number']."</div>";
        // echo "<div>中獎金額$".$aget['reward']."</div>";
        // echo "</div>";
    }




}



?>

        </div>
    </article>


</section>


<?php include_once "./include/footer.php";?>