<?php 
include "./com/base.php";
include "./include/header.php";
?>



<section class="container">

    <article class="contentLeft">
        <div class="title">發票列表</div>
        <h4>My Invoice List</h4>
        <div class="search">



            <div class="nav">
                <a href="list.php?period=1">第1期</a>
                <a href="list.php?period=2">第2期</a>
                <a href="list.php?period=3">第3期</a>
                <a href="list.php?period=4">第4期</a>
                <a href="list.php?period=5">第5期</a>
                <a href="list.php?period=6">第6期</a>
            <!-- 三元運算式 -->
            </div>


<?php 
$period=ceil(date("n")/2);
if(isset($_GET['period'])){
    $period=$_GET['period'];
}

$sql="select * from invoice where `period`='$period'";
$invoices=$pdo->query($sql)->fetchAll();
    
?>


        </div>
    </article>

    <article class="contentRight">
        <div class="result">


        


            <table>
                <tr>
                    <td>編號</td>
                    <td>標記</td>
                    <td>號碼</td>
                    <td>花費</td>
                    <td>編輯</td>
                </tr>
    <?php
    foreach($invoices as $row){
    ?>
                <tr>
                    <td><?=$row['id'];?></td>
                    <td><?=$row['code'];?></td>
                    <td><?=$row['number'];?></td>
                    <td><?=$row['expend'];?></td>
                    <td><button>編輯</button></td>
                </tr>
    <?php
    }
    ?>
            </table>








        </div>
    </article>

</section>






</body>
</html>