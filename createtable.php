<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:ramil.database.windows.net,1433; Database = Tat", "ramil", "Rosbank1997");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
    $sql = "CREATE TABLE registration_tb(
    id INT NOT NULL IDENTITY(1,1) 
    PRIMARY KEY(id),
    name VARCHAR(30),
    email VARCHAR(30),
    country VARCHAR(30),
    date DATE)";
    $conn->query($sql);

echo "Все тип-топ!"
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}
