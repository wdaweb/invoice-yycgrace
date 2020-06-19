
    <?php include_once "./include/header.php";?>


    <section class="content row fixed">
        
        <article class="contentLeft col-12 col-md-6">
            <div class="title">輸入獎號</div>
            <div class="search">
                
                <form action="add_award.php" method="post">
                    <table class="mr-0 ml-auto">
                        <tr>
                            <td class="srchth">年期別</td>
                            <td>
                                <input class="srchgp"  type="number" name="year" value="<?=date("Y");?>" style="width: 70px;font-weight: 600;color: #126F80;">
                                <select name="period">
                                    <option value="1">第1期</option>
                                    <option value="2">第2期</option>
                                    <option value="3">第3期</option>
                                    <option value="4">第4期</option>
                                    <option value="5">第5期</option>
                                    <option value="6">第6期</option>
                                </select>
                    
                            </td>
                        </tr>
                        <tr>
                            <td class="srchth">特別獎</td>
                            <td>        
                                <input class="srchgp" type="text" name="num1" size="3">
                            </td>
                        </tr>
                        <tr>
                            <td class="srchth">特獎</td>
                            <td>
                                <input class="srchgp" type="text" name="num2" size="3">
                            </td>
                        </tr>
                        <tr>
                            <td class="srchth">頭獎</td>
                            <td>
                                <input class="srchgp" type="text" name="num3[]" size="3">
                                <input type="text" name="num3[]" size="3">
                                <input type="text" name="num3[]" size="3">
                            </td>
                        </tr>
                        <tr>
                            <td class="srchth">增開六獎</td>
                            <td>
                                <input class="srchgp" type="text" name="num4[]" size="3">
                                <input type="text" name="num4[]" size="3">
                                <input type="text" name="num4[]" size="3">
                            </td>
                        </tr>
                    </table>
                    <input class="sub" type="submit" value="save">
                </form>

        </div>

    </article>

<?php
// 如果addaward傳回值
if(isset($_GET['year']) && isset($_GET['period']) && $_GET['year']=='ops' && $_GET['period']=='ops'){
    $title="新增失敗 Save False";
    $result="請重新輸入，年期別不得為空";
}else if(isset($_GET['year']) && isset($_GET['period'])){
    $title="新增成功 Save Success";
    $result=$_GET['year']."年第".$_GET['period']."期加入資料庫囉";
}else{
    $title="統一發票小知識_開獎篇";
    $result="你知道嗎?<br><strong>中大獎怎麼辦</strong><br>當消費項目很多的時候，往往會拿到好幾張相連且號碼連號的統一發票。<br>相信大家都知道每張都可以獨立對獎，但如果其中一張中獎的時候，要帶哪張去領獎呢?<br>要特別注意!如果你幸運中大獎的話，要全部出示才可以領獎哦!";
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
    <!-- inputaward -->
    <a class="btn btn-sm btn-outline-danger" href="query.php?year=<?=$_GET['year'];?>&period=<?=$_GET['period'];?>">顯示當期開獎號碼</a>
    </article>
<?php
}
?>

</section>

<?php include_once "./include/footer.php";?>
