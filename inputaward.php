
    <?php include "./include/header.php";?>


    <section class="container">
        
        <article class="contentLeft">
            <div class="title"></div>
            <div class="search">
                
                <form action="add_award.php" method="post">
                    <table>
                        <tr>
                            <td>年月份</td>
                            <td>
                                <input type="text" name="year" id="">
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
                            <td>特別獎</td>
                            <td>        
                                <input type="number" name="num1">
                            </td>
                        </tr>
                        <tr>
                            <td>特獎</td>
                            <td>
                                <input type="number" name="num2">
                            </td>
                        </tr>
                        <tr>
                            <td>頭獎</td>
                            <td>
                                <input type="number" name="num3[]">
                                <input type="number" name="num3[]">
                                <input type="number" name="num3[]">
                            </td>
                        </tr>
                        <tr>
                            <td>增開六獎</td>
                            <td>
                                <input type="text" name="num4[]">
                                <input type="text" name="num4[]">
                                <input type="text" name="num4[]">
                            </td>
                        </tr>
                    </table>
                <input type="submit" value="submit">
                </form>

        </div>


        
        <a href="query.php"><button>查看獎號</button></a>

    </article>

    <article class="contentRight">
        <div class="result">

        </div>
    </article>

</section>

<?php include "./include/footer.php";?>
