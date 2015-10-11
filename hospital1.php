<?php
require_once 'database.php';
require_once 'config.php';
Server::connectToServer();
Database::selectDatabase();
$hospital_name;

function getDoctorType($x){
  switch ($x) {
    case '1':
      return 'Хірург';
      break;
    
    case '2':
      return 'Педіатр';
      break;

    case '3':
      return 'Травматолог';
      break;
  }
}
$hospital_id = $_GET["hospital_id"];

function getHospitalName($hospital_id){
switch ($hospital_id) {
  case 1:
    return "Вінницька міська клінічна лікарня №1";
    break;
  
  case 2:
    return "Вінницька міська клінічна лікарня №2";
    break;

     case 3:
    return "Вінницька міська клінічна лікарня №3";
    break;

     case 4:
    return "Вінницька обласна клінічна лікарня ім. М. І. Пирогова";
    break;
  
  case 5:
    return "Вінницька обласна дитяча клінічна лікарня";
    break;

     case 6:
    return "Міська дитяча стоматологічна поліклініка";
    break;
  }
}
?>
<html>
<head>
    <title>Лікарні міста Вінниці</title>
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
<li><form name = "enteredWords" method = "post" action="http://localhost/project/actionSearch.php" class="google"><i class="fa fa-search"></i><input type="search" placeholder="Пошук" class="google_line"><input type="submit" class="but" value="Ok"></form></li> 
</ul> 
</div>

    <div class="jumbotron">
      <div class="icon-menu">
        <i class="fa fa-bars"></i>
            Меню
      </div>
      <div class="content">
          <h1><?php echo getHospitalName($hospital_id)?></h1>
            <div class="doctors">
                <div class="specifics">
                  <?php
                  $strSQL = "select * from doctors where type = 1 and hospital_id=" . $hospital_id . ";";
                  $rs = mysql_query($strSQL);
                  while ($row = mysql_fetch_array($rs)){
                    echo '
                      <div class="name_doctor">
                      <h2 class="name"> ' . $row['name'] . '</h2>
                      <p class="description_doctor clearfix">' . getDoctorType($row["type"]) . '. 
                      Години прийому: ' . $row["start"] . ' - 00 - ' . $row["finish"] . ' - 00
                      <a href="' . cabinet . '?id_doctor=' . $row['id'] . '">Записатися</a></p>
                      </div>
                    ';
                  }
                  ?>
                </div>
                <div class="specifics">
                  <?php
                  $strSQL = "select * from doctors where type = 2 and hospital_id=" . $hospital_id . ";";
                  $rs = mysql_query($strSQL);
                  while ($row = mysql_fetch_array($rs)){
                    echo '
                      <div class="name_doctor">
                      <h2 class="name"> ' . $row['name'] . '</h2>
                      <p class="description_doctor clearfix">' . getDoctorType($row["type"]) . '. 
                      Години прийому: ' . $row["start"] . ' - 00 - ' . $row["finish"] . ' - 00
                      <a href="' . cabinet .'?id_doctor=' . $row['id'] .'">Записатися</a></p>
                      </div>
                    ';
                  }
                  ?>
                </div>
                <div class="specifics">
              <?php
                  $strSQL = "select * from doctors where type = 3 and hospital_id=" . $hospital_id . ";";
                  $rs = mysql_query($strSQL);
                  while ($row = mysql_fetch_array($rs)){
                    echo '
                      <div class="name_doctor">
                      <h2 class="name"> ' . $row['name'] . '</h2>
                      <p class="description_doctor clearfix">' . getDoctorType($row["type"]) . '. 
                      Години прийому: ' . $row["start"] . '-00-' . $row["finish"] . '-00
                      <a href="' . cabinet .'?id_doctor=' . $row['id'] .'">Записатися</a></p>
                      </div>
                    ';
                  }
                  ?>
                </div>
            </div>
              
      </div>
    </div>
    
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>
</html>