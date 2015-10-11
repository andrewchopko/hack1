<?php
$email = $_POST["email"];
$text = $_POST["text"];

mail($email,"Пропозиції користувачів",$text);
echo "OK";
?>