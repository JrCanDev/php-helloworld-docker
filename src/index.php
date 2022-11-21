<?php
// $db = mysqli_connect('database', 'test', '1234567abc', 'testdb') or die('Could not find a database server @\'database\'');
$username = $_ENV['database__connection__user'];
$password = $_ENV['database__connection__password'];
$database = $_ENV['database__connection__database'];
$pdo = new PDO('mysql:host=www_db;port=3306;dbname=testdb', $username, $password) or die('cannot instantiate PDO instance');

$sql = "CREATE TABLE IF NOT EXISTS Data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    some_string varchar(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP); ENGINE=INNODB";
$pdo->exec($sql);

// INSERT
if (isset($_POST['message'])) {
    $stmt = $pdo->prepare('SELECT * FROM Data');
    $stmt->execute(array());
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($results) < 15) {
        $sql = "INSERT INTO Data(some_string) values (:message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array('message' => $_POST['message']));
    }
}

// UPDATE
if (isset($_GET['remove']) && isset($_GET['id'])) {
    $sql = "DELETE FROM Data WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('id' => $_GET['id']));
}


// GET Data
$stmt = $pdo->prepare('SELECT * FROM Data');
$stmt->execute(array());
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Format Data
$rows = '<table>';
foreach($results as $key => $value) {
    $rows .= "<tr><th> {$value['id']} </th><td> {$value['some_string']} </td><td> {$value['created_at']} </td>";
    $rows .= '<td class="remove"><a href="?remove&id=' . $value['id'] . '">❌</a></td>';
    $rows .= '</tr>';
}
$rows .= '</table>';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>JrCanDev PHP + MySQL Test</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="bg4">
        <div class="container">
        <div class="title">
            <p><a href="https://jrcan.dev.netlib.re/"><img src="img/logo_JrCanDev.svg"></a></p>
        </div>
        <div class="main-container">
            <div>
            <?= $rows ?>
            </div>
            <div>
                <form action ="#" method="POST" class="message_form">
                <fieldset>
                    <legend>Add one</legend>
                    <label for id="input_some_string">Message:</label> 
                    <input type="text" name="message">
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
    </body>
</html>


