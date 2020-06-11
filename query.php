<?php
include_once "./include/header.php";
include_once "./com/base.php";

$last_aw=all("award_number",""," order by id desc limit 0,1");

foreach($last_aw as $d){
    $last_y=$d['year'];
    $last_p=$d['period'];
}


if(isset($_GET['year'])){
    $year=$_GET['year'];
    $rslti="搜尋結果";
}else{
    $year=$last_y;
    $rslti="最新獎號";
}

if(isset($_GET['period'])){
    $period=$_GET['period'];
    $rslti="搜尋結果";
}else{
    $period=$last_p;
    $rslti="最新獎號";
}



$awards=all('award_number',['year'=>$year,'period'=>$period]);


?>
<section class="content row fixed">

    <article class="contentLeft col-12 col-md-6">
        <div class="title">各期獎號</div>
        <h4>Passed Award Number</h4>
        <div class="search">

        <!-- 這裡放一個年份選擇欄,預設$year=date("Y") -->
        <form class="my-3" action="query.php" method="get">
        <input type="text" name="year" size="3">
        <input class="sub" type="submit" value="search">
        </form>

            <div class="chsbar">
                <a class="btn btn-sm btn-outline-secondary" href="query.php?year=<?=$year;?>&period=1">第1期</a>
                <a class="btn btn-sm btn-outline-secondary" href="query.php?year=<?=$year;?>&period=2">第2期</a>
                <a class="btn btn-sm btn-outline-secondary" href="query.php?year=<?=$year;?>&period=3">第3期</a><br>
                <a class="btn btn-sm btn-outline-secondary" href="query.php?year=<?=$year;?>&period=4">第4期</a>
                <a class="btn btn-sm btn-outline-secondary" href="query.php?year=<?=$year;?>&period=5">第5期</a>
                <a class="btn btn-sm btn-outline-secondary" href="query.php?year=<?=$year;?>&period=6">第6期</a>
            </div>




        </div>
    </article>

    <article class="contentRight col-12 col-md-6">
    <div class="title"><?=$rslti;?></div> 
        <div class="result container">

        <table>
            <tr>
                <td class="m-0 p-0" colspan="3">
                    <h4><?=$year;?>年<?=$period;?>期</h4>
                </td>
            </tr>

<?php
if(!empty($awards)){
?>
            <tr class="rslth">
                    <td style="width:15%;">獎項</td>
                    <td style="width:15%;">號碼</td>
                    <td style="width:20%;">編輯</td>
            </tr>
<?php
    foreach($awards as $row){
?>
            <tr class="rsl">
                <td class="cpr"><?=$row['type'];?></td>
                <td><?=$row['number'];?></td>
                <td><button class="cpr btn btn-sm btn-outline-warning py-0">edit</button></td>
            </tr>
<?php
    }
}else{
    echo "<tr><td class='text-warning' style='font-weight:900;font-size:2rem;line-height:3rem;'>oops!還沒開獎哦!</td></tr>";
}
?>
        </table>

        </div>
    </article>

    <article class="moreinfo col-12 text-right mt-5 rslth">
    <div class="navclr ql">Quick Link to</div>
    <!-- query -->
    <a class="btn btn-sm btn-outline-danger" href="award.php?syear=<?=$year;?>&speriod=<?=$period;?>">對獎GOGO</a>
    </article>


</section>

<?php include_once "./include/footer.php";?>