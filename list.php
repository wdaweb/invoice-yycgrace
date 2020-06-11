<?php 
include_once "./com/base.php";
include_once "./include/header.php";
?>



<section class="content row fixed">

    <article class="contentLeft col-12 col-md-6">
        <div class="title">發票列表</div>
        <h4>My Invoice List</h4>
        <div class="search">
<?php 

if(isset($_GET['year'])){
    $year=$_GET['year'];
    $rslti="搜尋結果";
}else{
    $year=date("Y");
    $rslti="近期發票";
}

if(isset($_GET['period'])){
    $period=$_GET['period'];
    $rslti="搜尋結果";
}else{
    $period=ceil(date("n")/2);
    $rslti="近期發票";
}

$invoices=all('invoice',['year'=>$year,'period'=>$period,]);
    
?>

        <!-- 這裡放一個年份選擇欄,預設$year=date("Y") -->
        <form class="my-3" action="list.php" method="get">
        <input type="text" name="year" size="3">
        <input class="sub" type="submit" value="search">
        </form>

            <div class="chsbar">
                <a class="btn btn-sm btn-outline-secondary" href="list.php?year=<?=$year;?>&period=1">第1期</a>
                <a class="btn btn-sm btn-outline-secondary" href="list.php?year=<?=$year;?>&period=2">第2期</a>
                <a class="btn btn-sm btn-outline-secondary" href="list.php?year=<?=$year;?>&period=3">第3期</a><br>
                <a class="btn btn-sm btn-outline-secondary" href="list.php?year=<?=$year;?>&period=4">第4期</a>
                <a class="btn btn-sm btn-outline-secondary" href="list.php?year=<?=$year;?>&period=5">第5期</a>
                <a class="btn btn-sm btn-outline-secondary" href="list.php?year=<?=$year;?>&period=6">第6期</a>
            <!-- 三元運算式 -->
            </div>


        </div>
    </article>

    <article class="contentRight col-12 col-md-6">
    <div class="title"><?=$rslti;?></div> 
        <div class="result container">

            <table>
                <tr>
                    <td class="m-0 p-0" colspan="5">
                        <h4><?=$year;?>年<?=$period;?>期</h4>
                    </td>
                </tr>
                <tr class="rslth">
                    <td style="width:15%;">編號</td>
                    <td style="width:15%;">標記</td>
                    <td style="width:20%;">號碼</td>
                    <td style="width:20%;">花費</td>
                    <td style="width:30%;">編輯</td>
                    
                </tr>
    <?php
    foreach($invoices as $row){
    ?>
                <tr class="rsl">
                    <td class="cpr"><?=$row['id'];?></td>
                    <td><?=$row['code'];?></td>
                    <td><?=$row['number'];?></td>
                    <td class="cpr"><?=$row['expend'];?></td>
                    <td><button class="cpr btn btn-sm btn-outline-warning py-0">edit</button></td>
                </tr>
    <?php
    }
    ?>
            </table>

        </div>
    </article>

    <article class="moreinfo col-12 text-right mt-5 rslth">
    <div class="navclr ql">Quick Link to</div>
    <!-- list -->
    <a class="btn btn-sm btn-outline-danger" href="award.php?syear=<?=$year;?>&speriod=<?=$period;?>">對獎GOGO</a>
    </article>


</section>


<?php include_once "./include/footer.php";?>