<div class="">
  <input type="button" name="" value="<" onclick="<?=decrease()?>">
  날짜
  <input type="button" name="" value=">" onclick="<?=increase()?>">
</div>
<div>
  <?php
    $js_class = 0;
    $js_day = 0;
    $first_class = 1;
    $last_class = 7;
    function increase() {
      //교시++ period {js_class}
      //마지막 교시이면 요일++ {js_day}
      // if($js_class == $last_class) {
      //   $js_day++;
      //   $js_class = $first_class;
      // } else {
      //   $js_class++;
      // }
      $js_class = 1;
      if($js_class==1){
        echo "alert('gi')";
      }

      // }
    }
    function decrease() {
      //교시-- period {js_class}
      //첫 교시이면 요일-- {js_day}
      // if($js_class == $first_class) {
      //   $js_day--;
      //   $js_class = $last_class;
      // } else {
      //   $js_class--;
      // }
      $js_class--;
    }
    $sql = "SELECT id FROM period WHERE ((id <= 10) AND (start < now() AND DATE_ADD(`end`, INTERVAL 10 MINUTE) > now()) OR ((id > 10) AND (start < now() AND `end` > now())))";
    $result = mysqli_query($conn, $sql);
    if ($result -> num_rows != 0) {
        $row = mysqli_fetch_assoc($result);
        $period = $row['id'] + $js_class;

        $sql = "SELECT subject.name FROM timetable LEFT JOIN period ON timetable.period=period.id LEFT JOIN subject ON timetable.subject=subject.id WHERE `date`=DAYOFWEEK(now()) + {$js_day} AND `period`='".$period."'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows != 0) {
            $row = mysqli_fetch_assoc($result);
            $currClass = $row['name'];
            echo '<p id="index">NOW</p>';
            echo '<p id="subject">'.$currClass.'</p>';
        }
        $sql = "SELECT subject.name FROM timetable LEFT JOIN period ON timetable.period=period.id LEFT JOIN subject ON timetable.subject=subject.id WHERE `date`=DAYOFWEEK(now()) + {$js_day} AND `period`='".((int)$period+1)."'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows != 0) {
            $row = mysqli_fetch_assoc($result);
            $nextClass = $row['name'];
            echo '<p id="index">NEXT</p>';
            echo '<p id="subject">'.$nextClass.'</p>';
        } else {
            echo '<p id="index">NEXT</p>';
            echo '<p id="subject">취침시간..zZ</p>';
        }
    } else {
        echo '<p id="index">NOW</p>';
        echo '<p id="subject">취침시간...zZ</p>';
        echo '<p id="index">NEXT</p>';
        echo '<p id="subject">아침식사</p>';
    }
  ?>
</div>
