<?php
//DB 연결
  require("config.php");

  $conn = mysqli_connect($databaseHost, $databaseUser, $databasePassword);
  mysqli_select_db($conn, $databaseName);
  mysqli_set_charset($conn, "utf8");
?>

<div>
  <?php
    $cookie = "timetable_id";
    $id = $_GET['id'];
    $sql = "SELECT id FROM period WHERE ((id = 2 OR id = 3 OR id = 4 OR id = 7 OR id = 8 OR id = 13) AND (start <= now() AND DATE_ADD(`end`, INTERVAL 10 MINUTE) > now()) OR (start < now() AND `end` > now()))";
    $result = mysqli_query($conn, $sql);
    if ($result -> num_rows != 0) {
        $row = mysqli_fetch_assoc($result);
        $period = $row['id'];
        $timetable_id = (($_COOKIE[$cookie] + $id + 74) % 75) + 1;
        $sql = "SELECT subject.name FROM timetable LEFT JOIN period ON timetable.period=period.id LEFT JOIN subject ON timetable.subject=subject.id WHERE timetable.id = '{$timetable_id}'";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows != 0) {
            $row = mysqli_fetch_assoc($result);
            $currClass = $row['name'];
            echo '<p id="index">Subject</p>';
            echo '<p id="subject">'.$currClass.'</p>';
        }
    }
  ?>
</div>

<div>
  <input type="button" value="<" onclick="location.href='./right_iframe.php?id=<?=$id - 1?>'">
  <input type="button" value="Reset" onclick="location.href='./right_iframe.php?id=0'">
  <input type="button" value=">" onclick="location.href='./right_iframe.php?id=<?=$id + 1?>'">
</div>
