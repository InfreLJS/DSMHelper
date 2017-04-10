<script>
  function increase() {
    //교시++ period
    //마지막 교시이면 요일++

  }
  function decrease() {
    //교시-- period
    //첫 교시이면 요일--
  }
</script>
<div class="">
  <input type="button" name="" value="<" onclick="increase()">
  날짜
  <input type="button" name="" value=">" onclick="decrease()">
</div>
<div>
  <?php
    $js_class = 0;
    $js_day = 0;
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
