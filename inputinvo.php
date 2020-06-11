
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
                <select class="srchgp" name="year">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
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
if(isset($_GET['year']) && isset($_GET['period'])){
    $title="新增成功 Save Success";
    $result="發票加入".$_GET['year']."年第".$_GET['period']."期資料庫囉";
}else if(isset($_GET['year']) && isset($_GET['period']) && $_GET['year']==1 && $_GET['period']==1){
    $title="新增失敗 Save False";
    $result="請重新輸入";
}else{
    $title="統一發票小知識_發票篇";
    $result="Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis sunt est eos magnam doloribus aspernatur iure veritatis quaerat alias repellendus beatae iste tempore harum expedita odit necessitatibus recusandae, explicabo, excepturi quasi mollitia eveniet asperiores optio! Rem iste, animi nesciunt culpa doloribus quod blanditiis a, eligendi aut soluta, ad atque dolor? Maiores, minus. Magnam beatae, nihil ut dignissimos corporis dolores dolorem excepturi neque labore soluta ullam minus unde vitae doloremque at distinctio natus veniam voluptate possimus qui id rem nesciunt.";
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
