<?php
// DB connection info
$host = "localhost\sqlexpress";
$user = "user name";
$pwd = "password";
$db = "registration";
try{
    $ $conn = new PDO("sqlsrv:server = tcp:ramil.database.windows.net,1433; Database = Tat", "ramil", "Rosbank1997");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE registration_tbl(
    id INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
    name VARCHAR(30),
    email VARCHAR(30),
    date DATE)";
    $conn->query($sql);
}
catch(Exception $e){
    die(print_r($e));
}
echo "<h3>Table created.</h3>";
?>
