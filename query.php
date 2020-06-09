<?php
include "./include/header.php";
include "./com/base.php";


if(isset($_GET['period'])){
    $period=$_GET['period'];
}else{
    $period=ceil(date("n")/2);
}

$year=date("Y");
$awards=all('award_number',['year'=>$year,'period'=>$period]);
?>




<section class="container">

    <article class="contentLeft">
        <div class="title"></div>
        <div class="search">



            <nav>
                <a href="query.php?period=1">第1期</a>
                <a href="query.php?period=2">第2期</a>
                <a href="query.php?period=3">第3期</a>
                <a href="query.php?period=4">第4期</a>
                <a href="query.php?period=5">第5期</a>
                <a href="query.php?period=6">第6期</a>
            </nav>




        </div>
    </article>

    <article class="contentRight">
        <div class="result">



        <table>
            <tr>
                <td colplas=3><?=$year;?>年<?=$period;?>期</td>
            </tr>
<?php
if(!empty($awards)){
    foreach($awards as $row){
?>
                <tr>
                    <td><?=$row['type'];?></td>
                    <td><?=$row['number'];?></td>
                    <td><a herf=""><button>編輯</button></a></td>
                </tr>
<?php
    }
}else{
    echo "<tr><td>oops!還沒開獎哦!</td></tr>";
}
?>
        </table>






        </div>
    </article>

</section>

<?php include "./include/footer.php";?>