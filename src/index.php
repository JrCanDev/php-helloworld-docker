<?php
// $db = mysqli_connect('database', 'test', '1234567abc', 'testdb') or die('Could not find a database server @\'database\'');
$pdo = new PDO('mysql:host=database;port=3306;dbname=testdb', 'test', '1234567abc') or die('cannot instantiate PDO instance');


$sql = "CREATE TABLE IF NOT EXISTS Data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    some_string varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP); ENGINE=INNODB";

$pdo->exec($sql);

$stmt = $pdo->prepare('SELECT * FROM Data');
$stmt->execute(array());
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($results) == 0)  {
    $sql = "INSERT INTO Data(some_string) values 'Hello MySQL'";
    $pdo->exec($sql);
    $stmt = $pdo->prepare('SELECT * FROM Data');
    $res = $stmt->execute(array());
}

$rows = '';

foreach($results as $key => $value) {
    $row .= "<p><strong>$key</strong> {$_value['some_string']}</p>";
    $rows[] = $row;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>JrCanDev PHP + MySQL Test</title>
    </head>
    <body>
        <p>Hello from <a href="https://jrcan.dev.netlib.re/">JrCanDev</a></p>
        <p><img src="https://www.docker.com/sites/default/files/horizontal.png"></p>

        <?= $rows ?>
    </body>
</html>


<?php




?>

