
<?php include "./include/header.php";?>
    
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

<article class="contentRight col-12 col-md-6">
    <div class="title">統一發票小知識_發票篇</div> 
    <div class="result">

    </div>
</article>

<article class="moreinfo col-12 text-right mt-5 rslth">
    <div class="navclr">Quick Link to</div>
    <!-- inputinvo -->
    <a href="list.php?year=<?=$year;?>&period=<?=$period;?>"><td>顯示當期發票</td></a>
    </article>


</section>


<?php include "./include/footer.php";?>
