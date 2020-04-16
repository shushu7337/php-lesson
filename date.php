<h4>日期/時間函式</h4>
<div>strototime() - 把文字日期轉乘時間序</div>
<?php
$time="2020-04-16 11:30:20";
$serialTime=strtotime($time);

echo date("Y年/m月/d日  D H:i:s",$serialTime);

?>

<h4>時間練習</h4>
<div>距離下一次的生日還有幾天</div>
<div>12/8</div>
<hr>
<?php


$today=strtotime ("2020-04-16") ;
echo $today;
echo "<br>";
$Birth=strtotime("2020-12-8");
echo $Birth;
echo "<br>";
$days=round(($Birth - $today)/3600/24);
echo "<pre>";print_r($Birth - $today);echo "</pre>";
echo "<pre>";print_r($days);echo "</pre>";
echo $days . "天";

?>
<?php
$today=date("Y-m-d");
$birthd="2020-12-08";


$days=$between/60/60/24;
echo "還有".$days."天";
echo "<hr>";


?>
<h4>date()函式</h4>
<?php
date_default_timezone_set("Asia/Taipei");
echo date("Y-m-d H:i:s");
?>


<h4>strtotime()函式</h4>
<?php

$date=strtotime("+3 days" . $today);
echo date("Y-m-d",$date);

echo "<hr>";
echo date("Y-m-d",strtotime("-7 days 2020-12-08"));
echo "<hr>";
echo date("Y-m-d",strtotime("-2 month",strtotime("2020-12-08")));
echo "<br>";
echo date("Y-m-d",strtotime("-2 month 2020-12-08"));

?>

<h4>日期練習</h4>
<div>印出今天起的三十天日期</div>
<?php
$today=date("Y-m-d");
$day30=date("Y-m-d",strtotime("+30 days"));

echo $today;
echo "<br>";
echo $day30;
echo "<br>";
for($i=0;$i<=30;$i++){
    echo date("Y-m-d",strtotime($today . "+" . $i . 'day')) . "<br>";
}
?>
<style>
table{
    border-collapse:collapse;
}
table td{
    border:1px solid #ccc;
    padding:5px;
    text-align:center;
}
</style>
<h4>月曆製作</h4>
<div>年份:2020;</div>

<?php
$year="2020";
for($Q=1;$Q<=12;$Q++){
?>
<div>月份:<?=$Q;?></div>
<table>
    <thead>
        <tr>
            <td>日</td>
            <td>一</td>
            <td>二</td>
            <td>三</td>
            <td>四</td>
            <td>五</td>
            <td>六</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $firstDay=date("$year-$Q-01");
        $firstDayWeek=date("w",strtotime($firstDay));
        $WeekDays=date("t",strtotime($firstDay));
        echo $WeekDays;
        echo "<br>";
        echo $firstDayWeek;
        echo "<br>";
        if(date("Y",strtotime($firstDay)))
        for($i=0;$i<6;$i++) {
            echo "<tr>";
                for($j=0; $j<7;$j++) {
                    if($i==0 && $j<$firstDayWeek){
                        echo "<td>";
                        echo "</td>";
                    }else{
                        echo "<td>";
                        $dd=$i*7+$j+1-$firstDayWeek;
                        if($dd<=$WeekDays){
                            echo $dd;
                        }
                    echo "</td>";
                    }
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?php
}
    ?>