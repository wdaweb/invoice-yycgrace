
<?php include "./include/header.php";?>
    
<section class="container">

<article class="contentLeft">
    <div class="title"></div>
    <div class="search">

    <form action="add_invoice.php" method="post">
        期別:
        <select name="period">
            <option value="1">1,2月</option>
            <option value="2">3,4月</option>
            <option value="3">5,6月</option>
            <option value="4">7,8月</option>
            <option value="5">9,10月</option>
            <option value="6">11,12月</option>
        </select>
        年份:
        <select name="year">
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
        </select>
        獎號:
        <input type="text" name="code">
        <input type="text" name="number">
        花費:
        <input type="number" name="expend">
        <input type="submit" value="儲存">
    </form>
    <a href="list.php">顯示當期發票</a>
    <a href="award.php">對獎GOGO</a>
    <a href="inputaward.php">後台輸入獎號</a>

    </div>
</article>

<article class="contentRight">
    <div class="result">

    </div>
</article>

</section>


<?php include "./include/footer.php";?>
