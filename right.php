<div>
  <input type="button" name="" value="<" onclick="location.href='index.php?id='+<?=$_GET['id'] - 1?>">
  날짜
  <input type="button" name="" value=">" onclick="location.href='index.php?id='+<?=$_GET['id'] + 1?>">
  <input type="button" name="" value="Reset" onclick="location.href='index.php?id=0'">
</div>
<div>
  <?php
    if (!isset($_GET['id'])) {
      header('location:./index.php?id=0');
    }

    $cookie = "timetable_id";

    $sql = "SELECT id FROM period WHERE ((id <= 10) AND (start < now() AND DATE_ADD(`end`, INTERVAL 10 MINUTE) > now()) OR ((id > 10) AND (start < now() AND `end` > now())))";
    $result = mysqli_query($conn, $sql);
    if ($result -> num_rows != 0) {
        $row = mysqli_fetch_assoc($result);
        $period = $row['id'];
        $timetable_id = $_COOKIE[$cookie] + $_GET['id'];
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
