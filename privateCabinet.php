<?php
function getDaysOfWeek($x){
    switch ($x) {
        case 1:
            return "monday";
            break;
        case 2:
            return "tuesday";
            break;
        case 3:
            return "wednesday";
            break;
        case 4:
            return "thursday";
            break;
        case 5:
            return "friday";
            break;
    }
}

function convertDays($x){
    switch ($x) {
        case "monday":
            return "Понеділок";
            break;
        case "tuesday":
            return "Вівторок";
            break;
        case "wednesday":
            return "Середа";
            break;
        case "thursday":
            return "Четвер";
            break;
        case "friday":
            return "П'ятниця";
            break;
    }
}


require_once "database.php";
Server::connectToServer();
database::selectDatabase();
$tmp = $_GET['id_doctor'];
$strSQL = "select * from `order` where id_doctor = " . $tmp;
$rs = mysql_query($strSQL);

$globalStrSQL = "select start,day from `order` where id_doctor = ". $tmp;

function isBusy($Time, $strSQL, $dayOfWeek){
    $busyTime = mysql_query($strSQL);
    while ($tmp_get = mysql_fetch_array($busyTime)){
        if ($tmp_get["day"] != $dayOfWeek){
            continue;
        }
        $hour = $tmp_get["start"][0] * 10 +  $tmp_get["start"][1];
        $minute = $tmp_get["start"][3] * 10 +  $tmp_get["start"][4];
        //echo $hour * 60 + $minute . "<br/>";
        //echo $Time . "<br/>";
        if (abs($hour * 60 + $minute - $Time) < 1){
            return "Зайнятий";
        }
    }
    return "Вільний";
}
?>
<!doctype>
<html>
<head>
    <title>Вінницька міська клінічна лікарня №1</title>
    <link rel="stylesheet" href="styledoctor.css">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <meta charset="utf-8">
    
</head>
<body>
    
    <div class="menu"> 
<div class="icon-close"> 
<i class="fa fa-close"></i> 
</div> 
<ul> 
<a href="enter.html"><li>Вхід <i class="fa fa-user-md fa-2x"></i></li></a> 
<a href="doctor.html"><li>Реєстрація на сайті <i class="fa fa-plus-square fa-2x"></i></i></li></a> 
<a href="main.html"><li>Вибрати лікарню <i class="fa fa-hospital-o fa-2x"></i></li></a> 
<a href="about.html"><li>Про нас <i class="fa fa-heart fa-2x"></i></li></a> 
<a href="delete_order.html"><li>Видалення запису <i class="fa fa-trash fa-2x"></i></li></a> 
<a href="connection.html"><li>Зворотній зв'язок <i class="fa fa-comment fa-2x"></i></li></a> 
<li><form name = "enteredWords" action="" class="google"><button type="submit" class="but"><i class="fa fa-search"></i></button><input type="search" placeholder="Пошук"></form></li> 
</ul> 
</div>

    <div class="jumbotron">
      <div class="icon-menu">
        <i class="fa fa-bars"></i>
            Меню
      </div>
      <div class="content">
          <h1>Вінницька міська клінічна лікарня №1</h1>
          <?php
          $strSQL_2 = "select name from doctors where id = " . $tmp;
          //$strSQL_2 = mysql_fetch_array($strSQL_2);
          $get2 = mysql_query($strSQL_2);
          $get2 = mysql_fetch_array($get2);
          echo '
          <h2> ' . $get2["name"] . '</h2>
          ';
          ?>
          <div class="content">
              <table border="2" class="simple-little-table" align="center" width="80%" cellspacing="0">
                <?php
                $strSQL = "select monday, tuesday, wednesday, thursday, friday from doctors where id = " . $tmp;
                $getFlagDays = mysql_query($strSQL);
                $getFlagDays = mysql_fetch_array($getFlagDays);
                $cols = 1;
                echo '<th>'. "Час" .'</th>';
                $arr = array();
                for ($i = 1; $i < 6; $i++){
                    if ($getFlagDays[getDaysOfWeek($i)]){
                       echo '<th>'. convertDays(getDaysOfWeek($i)).'</th>';
                       $arr[] = $i;
                       $cols++;
                    }
                }
                $strSQL = "select start,finish,duration from doctors where id = " . $tmp;
                $getTime = mysql_query($strSQL);
                $getTime = mysql_fetch_array($getTime);
                $allTime = $getTime["finish"] - $getTime["start"];
                $allTime *= 60;

                $rows = floor($allTime / $getTime["duration"]);
                $currentTime = floor($getTime["start"] * 60);
                for ($r = 0; $r < $rows; $r++){
                    echo "<tr>";
                    echo "<td>" . floor($currentTime / 60) . "-" . floor($currentTime) % 60 . "</td>";
                    for ($c = 1; $c < $cols; $c++){
                        //echo $currentTime . "<br/>";
                        echo "<td>". isBusy($currentTime,$globalStrSQL,$arr[$c-1]) . "</td>";
                    }
                    echo "</tr>";
                    $currentTime += $getTime["duration"];
                }
                ?>
                <!--
                <tr>
                <th></th> 
                <th>Понеділок</th>  
                <th>Вівторок</th>
                <th>Середа</th> 
                <th>Четвер</th> 
                <th>П'ятниця</th>
                <th>Субота</th> 
                <th>Неділя</th> 
                <tr>
                <tr>
                <td>10:00 - 10:30</td>  
                <td></td> 
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <tr>
                <tr>  
                -->
            </table>
          </div>          
      </div>
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>