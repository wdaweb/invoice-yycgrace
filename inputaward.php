
    <?php include "./include/header.php";?>


    <section class="content row fixed">
        
        <article class="contentLeft col-12 col-md-6">
            <div class="title">輸入獎號</div>
            <div class="search">
                
                <form action="add_award.php" method="post">
                    <table class="mr-0 ml-auto">
                        <tr>
                            <td class="srchth">年期別</td>
                            <td>
                                <input class="srchgp" type="text" name="year" id="" size="1">
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

    <article class="contentRight col-12 col-md-6">
    <div class="title">統一發票小知識_開獎篇</div> 
        <div class="result">

        </div>
    </article>

    <article class="moreinfo col-12 text-right">
    <div>也許你還想去...(↑)</div>
    <a href="query.php"><button>查看獎號</button></a>
    <a href="list.php">顯示當期發票</a><br>
    <a href="award.php">對獎GOGO</a><br>
    <a href="inputaward.php">後台輸入獎號</a>
</article>

</section>

<?php include "./include/footer.php";?>
