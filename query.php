<?php
include "./include/header.php";
include "./com/base.php";

if(isset($_GET['year'])){
    $period=$_GET['year'];
}else{
    $period=ceil(date("n")/2);
}

if(isset($_GET['period'])){
    $period=$_GET['period'];
}else{
    $period=ceil(date("n")/2);
}

$awards=all('award_number',['year'=>$year,'period'=>$period]);
?>




<section class="content row fixed">

    <article class="contentLeft col-12 col-md-6">
        <div class="title">各期獎號</div>
        <h4>Passed Award Number</h4>
        <div class="search">

        <!-- 這裡放一個年份選擇欄,預設$year=date("Y") -->

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
    <div class="title">搜尋結果</div> 
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

    <article class="moreinfo col-12 text-right">
    <div>也許你還想去...(↑)</div>
    <a href="list.php">顯示當期發票</a><br>
    <a href="award.php">對獎GOGO</a><br>
    <a href="inputaward.php">後台輸入獎號</a>
</article>


</section>

<?php include "./include/footer.php";?>