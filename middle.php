<div id="dateTime">
    <div id="currdate"></div>
    <div id="currtime"></div>
</div>
<div id="subject">
    <?php
        $cookie = "timetable_id";

        $sql = "SELECT id FROM period WHERE ((id = 2 OR id = 3 OR id = 4 OR id = 7 OR id = 8 OR id = 13) AND (start <= now() AND DATE_ADD(`end`, INTERVAL 10 MINUTE) > now()) OR (start < now() AND `end` > now()))";
        $result = mysqli_query($conn, $sql);
        if ($result -> num_rows != 0) {
            $row = mysqli_fetch_assoc($result);
            $period = $row['id'];

            $sql = "SELECT subject.name, timetable.id FROM timetable LEFT JOIN period ON timetable.period=period.id LEFT JOIN subject ON timetable.subject=subject.id WHERE `date`=DAYOFWEEK(now()) AND `period`='".$period."'";
            $result = mysqli_query($conn, $sql);
            if ($result -> num_rows != 0) {
                $row = mysqli_fetch_assoc($result);
                $currClass = $row['name'];
                echo '<p id="index">NOW</p>';
                echo '<p id="subject">'.$currClass.'</p>';
                setcookie($cookie, $row['id']);
            }
            $sql = "SELECT subject.name FROM timetable LEFT JOIN period ON timetable.period=period.id LEFT JOIN subject ON timetable.subject=subject.id WHERE timetable.id='".($row['id']+1)."'";
            $result = mysqli_query($conn, $sql);
            if ($result -> num_rows != 0) {
                $row = mysqli_fetch_assoc($result);
                $nextClass = $row['name'];
                echo '<p id="index">NEXT</p>';
                echo '<p id="subject">'.$nextClass.'</p>';
            }
        }
    ?>

</div>
<div id="nextPrepare" class="alert alert-info">
    <p>숙제 / 준비물</p>
    <pre>
        <?php
            if (isset($nextClass)) {
                $sql = "SELECT * FROM homework LEFT JOIN timetable ON homework.timetable=timetable.id LEFT JOIN subject ON timetable.subject=subject.id WHERE until = DATE(now()) AND subject.name='".$nextClass."'";
                $result = mysqli_query($conn, $sql);
                if ($result -> num_rows != 0) {
                    $row = mysqli_fetch_assoc($result);
                    echo $row['description'];
                }
            }
        ?>
    </pre>
</div>
