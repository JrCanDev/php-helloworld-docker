<?php



echo 'Hello from <a href="https://jrcan.dev.netlib.re/">JrCanDev</a> <br>';
echo '<img src="https://www.docker.com/sites/default/files/horizontal.png">';
echo '<p>update : 05 oct. 2021 </p>';


$db = mysqli_connect($_ENV['DB_HOST'], 'test', '1234567abc', 'testdb');

var_dump($db);

?>

