<input type="button" name="" value="">

<input type="button" name="" value="">
<div>
  <?php
      $sql = "SELECT id FROM period WHERE ((id <= 10) AND (start < now() AND DATE_ADD(`end`, INTERVAL 10 MINUTE) > now()) OR ((id > 10) AND (start < now() AND `end` > now())))";
      $result = mysqli_query($conn, $sql);
      if ($result -> num_rows != 0) {
          $row = mysqli_fetch_assoc($result);
          $period = $row['id'];

          $sql = "SELECT subject.name FROM timetable LEFT JOIN period ON timetable.period=period.id LEFT JOIN subject ON timetable.subject=subject.id WHERE `date`=DAYOFWEEK(now()) AND `period`='".$period."'";
          $result = mysqli_query($conn, $sql);
          if ($result -> num_rows != 0) {
              $row = mysqli_fetch_assoc($result);
              $currClass = $row['name'];
              echo '<p id="index">NOW</p>';
              echo '<p id="subject">'.$currClass.'</p>';
          }
          $sql = "SELECT subject.name FROM timetable LEFT JOIN period ON timetable.period=period.id LEFT JOIN subject ON timetable.subject=subject.id WHERE `date`=DAYOFWEEK(now()) AND `period`='".((int)$period+1)."'";
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
