
<?php
    include "./com/base.php";
    include "./include/header.php";

// 判別最新已開獎期數
// 排序是否可以設定兩個欄位的排序組合???如日期+期數
$last_aw=all("award_number",""," order by id desc limit 0,1");

foreach($last_aw as $d){
    $last_y=$d['year'];
    $last_p=$d['period'];
}

?>

<h1>對獎專區</h1>
<h3>小確幸moment!</h3>

<a href="award.php?year=<?=$last_y;?>&period=<?=$last_p;?>">Newest Award</a>

<h3>查詢獎號</h3>
<form action="award.php" method="get">
    <input type="number" name="year">
    <select name="period">
        <option value="1">一二月</option>
        <option value="2">三四月</option>
        <option value="3">五六月</option>
    </select>
    <input type="submit" value="查詢獎號">
</form>



<?php

$aw=[
    1=>'特別獎',
    2=>'特獎',
    3=>'頭獎',
    4=>'二獎',
    5=>'三獎',
    6=>'四獎',
    7=>'五獎',
    8=>'六獎',
    9=>'增開獎',
];

if(!empty($_GET['year']) && !empty($_GET['period'])){

    echo "<h2>".$_GET['year']."第".$_GET['period']."期</h2>";

    foreach($aw as $k=>$v){
        echo "<a href='check_award.php?aw=".$k."&year=".$_GET['year']."&period=".$_GET['period']."'>".$v."</a>";
    }
}




if(isset($_GET['awget'])){
    $tmp=array('id'=>$_GET['awget'],);
    $award_get=find("reward_record",$tmp);
    echo "<div>中獎囉</div>";
    echo $aw[$_GET['aw']];
    echo $award_get['code']."-";
    echo $award_get['number'];
    echo "$".$award_get['reward'];
}

// $sql="select * from `invoice` where `period`='."$year".' and `period`='."$period".'";
// $invoice=$pdo->query($sql)->fetchAll();


?>



</body>
</html>