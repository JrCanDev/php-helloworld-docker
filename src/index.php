<?php

echo 'Hello from <a href="https://jrcan.dev.netlib.re/">JrCanDev</a> <br>';
echo '<img src="https://www.docker.com/sites/default/files/horizontal.png">';
echo '<p>update : 05 oct. 2021 </p>';
echo '<a href="http://phddb.jrcandev.netlib.re:9123/hooks/b3b981be">refresh</a>';

echo '<p>$_ENV</p>';
print_r($_ENV);
echo '<p>DB_HOST</p>';
var_dump($_ENV['DB_HOST']);

$db = mysqli_connect('db', 'test', '1234567abc', 'testdb');

var_dump($db);

?>

