
<?php include_once "./include/header.php";?>
    
<section class="content row fixed">

<article class="contentLeft col-12 col-md-6">
    <div class="title">輸入新發票</div>
    <div class="search">

    <form action="add_invoice.php" method="post">
        <table class="mr-0 ml-auto">
        <tr>
            <td class="srchth">年月份</td>
            <td>
                <input class="srchgp" type="number" name="year" value="<?=date("Y");?>" style="width: 70px;font-weight: 600;color: #126F80;">
                <select name="period">
                    <option value="1">1,2月</option>
                    <option value="2">3,4月</option>
                    <option value="3">5,6月</option>
                    <option value="4">7,8月</option>
                    <option value="5">9,10月</option>
                    <option value="6">11,12月</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="srchth">獎號</td>
            <td>
            <input class="srchgp" type="text" name="code" size="2">
            <input type="text" name="number" size="8">
            </td>
        </tr>
        <tr>
            <td class="srchth">花費</td>
            <td>
            <input class="srchgp" type="text" name="expend" size="8">
            </td>
        </tr>
        </table>
            <input class="sub" type="submit" value="save">
    </form>

    </div>
</article>

<?php
if(isset($_GET['year']) && isset($_GET['period']) && $_GET['year']=='ops' && $_GET['period']=='ops'){
    $title="新增失敗 Save False";
    $result="請重新輸入，年月份不得為空";
}else if(isset($_GET['year']) && isset($_GET['period'])){
    $title="新增成功 Save Success";
    $result="發票加入".$_GET['year']."年第".$_GET['period']."期資料庫囉";
}else{
    $title="統一發票小知識_發票篇";
    $result="你知道嗎? 傳統式的紙本發票有錯字?<br><strong>神祕的防弊措施</strong><br>為了防範有心人士偽造中獎發票，傳統式發票裡有一項非常特別的防弊措施，就藏在發票第一行的字裡行間。<br>每一期的傳統發票中，第一行的字樣中都有其中一個字少了一個筆劃，而且期期不同。<br>這個特別的設定如果不說出來，相信很多人到現在都還沒發現呢!";
}
?>


<article class="contentRight col-12 col-md-6">
    <div class="title"><?=$title;?></div> 
    <div class="result">
    <p class="container mt-3"><?=$result;?></p>
    </div>
</article>


<?php
if(isset($_GET['year']) && isset($_GET['period'])){
?>
    <article class="moreinfo col-12 text-right mt-5 rslth">
    <div class="navclr ql">Quick Link to</div>
    <!-- inputinvo -->
    <a class="btn btn-sm btn-outline-danger" href="list.php?year=<?=$_GET['year'];?>&period=<?=$_GET['period'];?>">顯示當期發票</a>
    </article>
<?php
}
?>

</section>


<?php include_once "./include/footer.php";?>
