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

<div id="topics" class="outer">
    <?php
        $sql = "SELECT homework.id, homework.description, subject.name, CONCAT(until, ' ', period.start) AS until, TIMESTAMPDIFF(SECOND, NOW(), CONCAT(until, ' ', period.start)) AS untilt FROM homework LEFT JOIN timetable ON homework.timetable=timetable.id LEFT JOIN subject ON timetable.subject=subject.id LEFT JOIN period ON timetable.period=period.id WHERE TIMESTAMPDIFF(SECOND, NOW(), CONCAT(until, ' ', period.start)) <= (30*86400) AND TIMESTAMPDIFF(SECOND, NOW(), CONCAT(until, ' ', period.start)) >= 0";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div id="topic'.$row['id'].'" class="inner" style="
                position: fixed;
                top: 68%;
                left: '.(((double)$row['untilt']/(30*86400))*90+5).'%;
                width: 400px;
                height: 250px;
                border: 1px solid red;
                border-radius: 10px;
                background-color: white;
                visibility: hidden;"><p class="centered">과목 : '.$row['name'].'<br>내용 : '.$row['description'].'<br>기한 : '.date("Y년 m월 d일 A h시 i분 까지", strtotime($row['until'])).'</p>
            </div>';
        }
        echo '</div>';
        $sql = "SELECT homework.id, homework.description, subject.name, CONCAT(until, ' ', period.start) AS until, TIMESTAMPDIFF(SECOND, NOW(), CONCAT(until, ' ', period.start)) AS untilt FROM homework LEFT JOIN timetable ON homework.timetable=timetable.id LEFT JOIN subject ON timetable.subject=subject.id LEFT JOIN period ON timetable.period=period.id WHERE TIMESTAMPDIFF(SECOND, NOW(), CONCAT(until, ' ', period.start)) <= (30*86400) AND TIMESTAMPDIFF(SECOND, NOW(), CONCAT(until, ' ', period.start)) >= 0";
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
    ?>
</div>
