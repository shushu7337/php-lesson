<style>
.calendar{
    display:inline-block;
}






</style>

<h1>Calendar</h1>
<div class="callyear">
    <!-- <form action="?" method="get">
        years:<input type="number" name="year">
        <input type="submit" value="SEND">
    </form> -->
</div>

<?php
// 判斷給值


if (isset($_GET["year"])) {
    $year = $_GET["year"];
} else {
    $year = date("Y");
}
if (isset($_GET["month"])) {
    $month = $_GET["month"];
} else {
    $month = date("M");
}   


// 上下月處理
if ($month < 1) {
    $month = 12;
    $year -= 1;
}
if ($month > 12) {
    $month = 1;
    $year += 1;
}

?>
<div class="introm">
<span class="prev"><a href="layouttest.php?month=<?= $month -1 ?>&year=<?= $year?>">Prev</a></span>
<span>&nbsp&nbsp<?= $year; ?>&nbsp&nbsp</span>
<span>/</span>
<span>&nbsp<?= date('M',strtotime("$year-$month")); ?>&nbsp</span>
<span class="next"><a href="layouttest.php?month=<?= $month +1 ?>&year=<?= $year?>">Next</a></span>

</div> 
<div class="calendar">
<div class="pic"><img src="https://picsum.photos/300//?random=1">
    <table>
        <thead>
            <tr>
                <td>SUN</td>
                <td>MON</td>
                <td>TUE</td>
                <td>WED</td>
                <td>THU</td>
                <td>FRI</td>
                <td>SAT</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $firstDay = date("$year-$month-01");
            $firstDayWeek = date("w", strtotime($firstDay)); //第一天
            $WeekDays = date("t", strtotime($firstDay));  //總天數
            $spaceDay=ceil(($firstDayWeek + $WeekDays) / 7);
            
            if (date("Y", strtotime($firstDay)))
                for ($i = 0; $i < $spaceDay; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 7; $j++) {
                        if ($i == 0 && $j < $firstDayWeek) {
                            echo "<td>";
                            echo "</td>";
                        } else {
                            echo "<td>";
                            $day = $i * 7 + $j + 1 - $firstDayWeek;
                            if ($day <= $WeekDays) {
                                echo $day;
                            }
                            echo "</td>";
                        }
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    </div>
</div>