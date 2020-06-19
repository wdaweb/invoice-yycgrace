
<?php
    include_once "./com/base.php";
    include_once "./include/header.php";

// 判別最新已開獎期數
// 排序是否可以設定兩個欄位的排序組合???如日期+期數


// 若從前頁接到年月,按鈕會跳轉成馬上開獎
if(isset($_GET['syear']) && isset($_GET['speriod'])){
    $qikyear=$_GET['syear'];
    $qikperiod=$_GET['speriod'];
    $qikbtn="<div class='awardbtn sub2'><p>Quick<br>Check</p></div>";
    $qikp="<p class='text-warning small mt-3 mb-5'>快速對獎點這裡 ";
}else{
    $last_aw=all("invo_award_number",""," order by id desc limit 0,1");

    foreach($last_aw as $d){
        $last_y=$d['year'];
        $last_p=$d['period'];
    }

    $qikyear=$last_y;
    $qikperiod=$last_p;
    $qikbtn="<div class='awardbtn sub'><p>Newest<br>Award</p></div>";
    $qikp="<p class='text-info small mt-3 mb-5'>最新對獎點這裡 ";
}


?>





<section class="content row fixed">

    <article class="contentLeft col-12 col-md-6">
        <div class="title">對獎專區</div>
        <h4>小確幸moment!</h4>
        <div class="search">
            <a href="award.php?year=<?=$qikyear;?>&period=<?=$qikperiod;?>">
                <?=$qikbtn;?>
            </a>
            <?=$qikp;?><i class="fas fa-sort-up"></i></p>

            <hr>
            <h4>前期對獎</h4>
            <form action="award.php" method="get">
                <div class="srchgp">
                <input type="number" name="year" value="<?=date("Y");?>" style="width: 70px;font-weight: 600;color: #126F80;">
                <!-- <input type="text" name="year" size="3"> -->
                    <select name="period">
                        <option value="1">1,2月</option>
                        <option value="2">3,4月</option>
                        <option value="3">5,6月</option>
                        <option value="4">7,8月</option>
                        <option value="5">9,10月</option>
                        <option value="6">11,12月</option>
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
    
?>

<div class="col-6">
<button class="btn btn-warning mt-5"><p class="text-white">還沒做的一口氣快速對獎</p></button>

<?php


    if(isset($_GET['awget'])){
?>
    <div class='text-warning col-12 mt-5'>
    <?php    
        switch ($_GET['awget']){
            case 'opsa':
                echo "<div style='font-weight:900;font-size:2rem;line-height:3rem;'>還沒開獎哦</div>";
            break;
            case 'opsi':
                echo "<div style='font-weight:900;font-size:2rem;line-height:3rem;'>當期沒有發票紀錄</div>";
            break;
            case 'yep':
                echo "<div style='font-weight:900;font-size:2rem;line-height:3rem;'>中獎囉</div>";
?>                
        <table>
        <tr class="rslth">
            <td style="width:15%;">獎項</td>
            <td style="width:15%;">標記</td>
            <td style="width:20%;">號碼</td>
            <td style="width:20%;">獎金</td>            
        </tr>
        <?php
        $reward_invo=all('invo_reward_record',['year'=>$_GET['year'],'period'=>$_GET['period'],]);

        foreach($reward_invo as $rrow){
        ?>
        <tr class="rsl">
            <td><?=$rrow['prize'];?></td>
        <?php
            $invo=all('invo_invoice',['id'=>$rrow['invo_id'],]);
            foreach($invo as $irow){
        ?>
            <td><?=$irow['code'];?></td>
            <td><?=$irow['number'];?></td>
        <?php
            }
        ?>
            <td class="cpr"><?=$rrow['bonus'];?></td>

        </tr>
        <?php
        }
        
        ?>
        </table>
<?php
            break;
            case 'none':
                echo "<div style='font-weight:900;font-size:2rem;line-height:3rem;'>c8 c8 沒中獎</div>";
            break;

        }
    }
}
?>
    </div>
</div>


        </div>
    </article>

</section>


<?php include_once "./include/footer.php";?>