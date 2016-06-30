<?php

$con = new PDO('mysql:host=localhost;dbname=reminders;charset=utf8', 'root', 'sfsp22wd');

if (!$con) {
    echo "Error connecting to database.";
}



// prepared statements
//if (!$stmt = $con->prepare("INSERT INTO tablename (name, email) VALUES (:name, :email)")) {
//	echo "Prepared failed: (".$con->errno.") ".$con->error;
//}
//
//$stmt->execute([
//	'name' => $name,
//	'email' => $email
//]);

?>
