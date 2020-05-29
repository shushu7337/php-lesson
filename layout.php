<link rel="stylesheet" href="plugins/bootstrap.css">
<link rel="stylesheet" href="plugins/custom.css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Iceland" />

<link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
<style>
 
</style>
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
  $month = date('m');
}

// 上下月處理
if ($month < 1) {
  $month = 12;
  $year -= 1;
}
if (
  $month >
  12
) {
  $month = 1;
  $year += 1;
}
?>
<div class="container-fluid">
  <div class="row justify-content-center">
      <!-- <h1 class="neon" data-test="[Neon-Light]">Calendar</h1> -->
      <h1>
        <span>カ</span>
        <span>レ</span>
        <span>ン</span>
        <span>ダ</span>
        <span>ー</span>
      </h1>
    </div>
  </div>

<div class="container-fluid callyear">
  <div class="introm row justify-content-center ">
    <div class="prev col-sm-2 offset-1 justify-content-center"><a href="layout.php?month=<?= $month - 1 ?>&year=<?= $year ?>"><i class="fa fa-arrow-circle-left"></i>Prev</a></div>
    <div class="col-sm-2 justify-content-center"><?= $year; ?></div>
    <div class="col-sm-1 justify-content-center">/</div>
    <div class="col-sm-2 "><?= date('M',strtotime("$year-$month")); ?></div>
    <div class="next col-sm-2 justify-content-center "><a href="layout.php?month=<?= $month + 1 ?>&year=<?= $year ?>">Next<i class="fa fa-arrow-circle-right"></i></a></div>
  </div>
</div>
<div class="container-fluid tt">
  <div class="row align-items-center justify-content-center calendar ">
  <div class="row"></div>  
  <div class="caard col-sm-auto">
          <div class="front rounded"><img src="plugins/dot.jpg"  class="rounded" alt=""></div>
            <div class="back rounded">
              <div class="details">
                  <h2>Shu<br><span>Design</span></h2>
                  <div class="social-icons">
                      <a href="#"><i class="fa fa-facebook"     aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-twitter"      aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-google-plus"      aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-linkedin"     aria-hidden="true"></i></a>
                      <a href="#"><i class="fa fa-instagram"     aria-hidden="true"></i></a>
                  </div>
              </div>
          </div>
    </div>

    <div class="main col-6-sm offset-1   justify-content-center">
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
              date_default_timezone_set("Asia/Taipei");
              $firstDay = date("$year-$month-01");
              $firstDayWeek = date("w", strtotime($firstDay)); //第一天 
              $WeekDays =date("t", strtotime($firstDay));
              //總天數 
              $spaceDay = ceil(($firstDayWeek + $WeekDays) / 7);
              if (date("Y", strtotime($firstDay)))
                for ($i = 0; $i <
                  $spaceDay; $i++) {
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
                  echo "
              </tr>
              ";
                } 
            ?>
          </tbody>
        </table>
      </div>
  </div>
</div>