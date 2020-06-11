<?php 
include "./com/base.php";
include "./include/header.php";
?>



<section class="content row fixed">

    <article class="contentLeft col-12 col-md-6">
        <div class="title">發票列表</div>
        <h4>My Invoice List</h4>
        <div class="search">

        <!-- 這裡放一個年份選擇欄,預設$year=date("Y") -->
        <form action="?" method="get">
        <input type="text">
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


<?php 
if(isset($_GET['year'])){
    $period=$_GET['year'];
}else{
    $period=ceil(date("n")/2);
}

if(isset($_GET['period'])){
    $period=$_GET['period'];
}else{
    $year=date("Y");
}

$sql="select * from invoice where `period`='$period' `period`='$year'";
$invoices=$pdo->query($sql)->fetchAll();
    
?>


        </div>
    </article>

    <article class="contentRight col-12 col-md-6">
    <div class="title">搜尋結果</div> 
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
    <div class="navclr">Quick Link to</div>
    <!-- award -->

    <!-- inputinvo -->
    <a href="list.php"><td>顯示當期發票</td></a>
    href="list.php?year=<?=$year;?>&period=1"
    <!-- inputaward -->
    <a href="query.php"><td>顯示當期開獎號碼</td></a>
    href="query.php?year=<?=$year;?>&period=1"
    <!-- list -->
    <a href="award.php"><td>對獎GOGO</td></a>
    <!-- query -->
    <a href="award.php"><td>對獎GOGO</td></a>

</article>


</section>


<?php include "./include/footer.php";?>