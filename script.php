<link href="style.css?ver=1.2" rel="stylesheet">
<link href="./bootstrap-3.3.4-dist/css/bootstrap.min.css?ver=0.1" rel="stylesheet">
<script src="./bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
<script src="./jquery-3.2.0.min.js"></script>
<script>
    $(document).ready(function() {
        <?php
            $sql = "SELECT *, TIMESTAMPDIFF(SECOND, NOW(), until) AS untilt FROM homework WHERE TIMESTAMPDIFF(SECOND, NOW(), until) <= (30*86400)";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '$("div#dot'.$row['id'].'").mouseover(function(){
                        $("div#topic'.$row['id'].'").css("visibility", "visible");
                    });
                    $("div#dot'.$row['id'].'").mouseout(function(){
                        $("div#topic'.$row['id'].'").css("visibility", "hidden");
                    });';
            }
        ?>
        $("div#left, div#middle, div#right").css("height", screen.height);
    });
    var today = new Date();

    function getTime() {
        var date = new Date();
        var ht = date.getHours();
        var h = (ht == 00) ? '오전 12' : ((ht == 12) ? '오후 12' : ((ht <= 12) ? '오전 ' + ht : '오후 ' + (ht - 12)));
        var m = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes();
        var s = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
        var ctime = h + ":" + m + ":" + s;
        document.getElementById("currtime").innerHTML = ctime;
        document.getElementById("currdate").innerHTML = today.getFullYear() + "년 " + (today.getMonth() + 1) + "월 " + today.getDate() + "일";
        window.setTimeout("getTime();", 1000);
    }

    window.onload = function() {
        getTime();
    }
</script>
