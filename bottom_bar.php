<div id="bottom_bar">
    <div id="bottom_bar_today">Today</div>
    <div id="bottom_bar_10">|</div>
    <div id="bottom_bar_20">|</div>
    <div id="bottom_bar_30">|</div>
    <div id="bottom_bar_40">|</div>
    <div id="bottom_bar_50">|</div>
    <div id="bottom_bar_60">|</div>
    <div id="bottom_bar_70">|</div>
    <div id="bottom_bar_80">|</div>
    <div id="bottom_bar_90">|</div>
    <div id="bottom_bar_month">1 Month</div>
</div>

<div id="topics">
    <?php
        $sql = "SELECT assignment.id, assignment.description, subject.name, CONCAT(assignment.untildate, ' ', period.start) AS until, TIMESTAMPDIFF(SECOND, NOW(), CONCAT(assignment.untildate, ' ', period.start)) AS untilt FROM assignment LEFT JOIN timetable ON assignment.timetable=timetable.id LEFT JOIN subject ON assignment.subject=subject.id LEFT JOIN period ON timetable.period=period.id WHERE TIMESTAMPDIFF(SECOND, NOW(), CONCAT(assignment.untildate, ' ', period.start)) <= (30*86400) AND TIMESTAMPDIFF(SECOND, NOW(), CONCAT(assignment.untildate, ' ', period.start)) >= 0 AND assignment.timeset = 1";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            if ((((double)$row['untilt']/(30*86400))*90+5) >= 80) {
                echo '<div id="topic'.$row['id'].'" class="inner" style="
                    position: fixed;
                    top: 68%;
                    left: '.(((double)$row['untilt']/(30*86400))*90-14).'%;
                    width: 21%;
                    height: 25%;
                    border: 1px solid red;
                    border-radius: 10px;
                    background-color: white;
                    visibility: hidden;"><p class="centered">과목 : '.$row['name'].'<br><br>'.$row['description'].'<br><br>기한 : '.date("Y년 m월 d일 A h시 i분 까지", strtotime($row['until'])).'</p>
                </div>';
            } else {
                echo '<div id="topic'.$row['id'].'" class="inner" style="
                    position: fixed;
                    top: 68%;
                    left: '.(((double)$row['untilt']/(30*86400))*90+5).'%;
                    width: 21%;
                    height: 25%;
                    border: 1px solid red;
                    border-radius: 10px;
                    background-color: white;
                    visibility: hidden;"><p class="centered">과목 : '.$row['name'].'<br><br>'.$row['description'].'<br><br>기한 : '.date("Y년 m월 d일 A h시 i분 까지", strtotime($row['until'])).'</p>
                </div>';
            }
        }
        $sql2 = "SELECT assignment.id, assignment.description, subject.name, CONCAT(assignment.untildate, ' ', assignment.untiltime) AS until, TIMESTAMPDIFF(SECOND, NOW(), CONCAT(assignment.untildate, ' ', assignment.untiltime)) AS untilt FROM assignment LEFT JOIN timetable ON assignment.timetable=timetable.id LEFT JOIN subject ON assignment.subject=subject.id WHERE TIMESTAMPDIFF(SECOND, NOW(), CONCAT(assignment.untildate, ' ', assignment.untiltime)) <= (30*86400) AND TIMESTAMPDIFF(SECOND, NOW(), CONCAT(assignment.untildate, ' ', assignment.untiltime)) >= 0 AND assignment.timeset = 0";
        $result = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($result)) {
            if ((((double)$row['untilt']/(30*86400))*90+5) >= 80) {
                echo '<div id="topic'.$row['id'].'" class="inner" style="
                    position: fixed;
                    top: 68%;
                    left: '.(((double)$row['untilt']/(30*86400))*90-14).'%;
                    width: 21%;
                    height: 25%;
                    border: 1px solid red;
                    border-radius: 10px;
                    background-color: white;
                    visibility: hidden;"><p class="centered">과목 : '.$row['name'].'<br><br>'.$row['description'].'<br><br>기한 : '.date("Y년 m월 d일 A h시 i분 까지", strtotime($row['until'])).'</p>
                </div>';
            } else {
                echo '<div id="topic'.$row['id'].'" class="inner" style="
                    position: fixed;
                    top: 68%;
                    left: '.(((double)$row['untilt']/(30*86400))*90+5).'%;
                    width: 21%;
                    height: 25%;
                    border: 1px solid red;
                    border-radius: 10px;
                    background-color: white;
                    visibility: hidden;"><p class="centered">과목 : '.$row['name'].'<br><br>'.$row['description'].'<br><br>기한 : '.date("Y년 m월 d일 A h시 i분 까지", strtotime($row['until'])).'</p>
                </div>';
            }
        }
        echo '</div>';
        $result = mysqli_query($conn, $sql);
        echo '<div id="dots">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div id="dot'.$row['id'].'" style="
                position: fixed;
                bottom: 20px;
                left: '.(((double)$row['untilt']/(30*86400))*90+5).'%;
                width: 20px;
                height: 20px;
                border: 1px solid red;
                background-color: red;
                border-radius: 20px;
                z-index: 101;"></div>';
        }
        $result = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div id="dot'.$row['id'].'" style="
                position: fixed;
                bottom: 20px;
                left: '.(((double)$row['untilt']/(30*86400))*90+5).'%;
                width: 20px;
                height: 20px;
                border: 1px solid red;
                background-color: red;
                border-radius: 20px;
                z-index: 101;"></div>';
        }
    ?>
</div>
