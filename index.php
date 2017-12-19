<html>
<head>
<Title>Registration Form</Title>
<style type="text/css">
body { background-color:
#fff; border-top: solid 10px #000;
color: #333; font-size: .85em;
margin: 20; padding: 20;
font-family: "Segoe UI",
Verdana, Helvetica, Sans-Serif;
}
h1, h2, h3,{ color: #000;
margin-bottom: 0; padding-bottom: 0; }
h1 { font-size: 2em; }
h2 { font-size: 1.75em; }
h3 { font-size: 1.2em; }
table { margin-top: 0.75em; }
th { font-size: 1.2em;
text-align: left; border: none; padding-left: 0; }
td { padding: 0.25em 2em 0.25em 0em;
border: 0 none; }
</style>
</head>
<body>
<h1>Register here!</h1>
<p>Fill in your name and
email address, then click <strong>Submit</strong>
to register.</p>
<form method="post" action="index.php"
enctype="multipart/form-data" >
Name <input type="text"
name="name" id="name"/></br>
Email <input type="text"
name="email" id="email"/></br>

<input type="submit"
name="submit" value="Submit" />
</form>

<?php
$dsn = "sqlsrv:server =  tcp:ramil.database.windows.net,1433; Database = Tat", "ramil";
$username = "ramil";
$password = "Rosbank1997";

try {
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST["clear"])) {
$sql1 = "DELETE FROM registration_on";
$conn->query($sql1);
}
}
catch (PDOException $e) {
print("Ошибка подключения к SQL Server.");
die(print_r($e));
}

$conn = null;

?>

<?php

$dsn = "sqlsrv:server =  tcp:ramil.database.windows.net,1433; Database = Tat", "ramil";
$username = "ramil";
$password = "Rosbank1997";
try {
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
print("Ошибка подключения к SQL Server.");
die(print_r($e));
}
if(!empty($_POST)) {
try {
$name = $_POST['name'];
$email = $_POST['email'];
$date = date("Y-m-d");
$gender = $_POST['gender'];
$age = $_POST['age'];
$country = $_POST['country'];
$birthday = $_POST['birthday'];

if ($name == "" || $email == "") {
echo "<h3>Не заполнены поля name и email.</h3>";
}
else {
$sql_insert ="INSERT INTO registration_on (name, email, date, gender, age, country, birthday) VALUES (?,?,?,?,?,?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindValue(1, $name);
$stmt->bindValue(2, $email);
$stmt->bindValue(3, $date);
$stmt->bindValue(4, $gender);
$stmt->bindValue(5, $age);
$stmt->bindValue(6, $country);
$stmt->bindValue(7, $birthday);
$stmt->execute();

echo "<h3>Вы зарегистрировались!</h3>";
}
}
catch(Exception $e) {
die(var_dump($e));
}

}

$conn = null;

?>

<?php

$dsn = "sqlsrv:server =  tcp:ramil.database.windows.net,1433; Database = Tat", "ramil";
$username = "ramil";
$password = "Rosbank1997";
try {
$conn = new PDO($dsn, $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
print("Ошибка подключения к SQL Server.");
die(print_r($e));
}

$sql_select = "SELECT * FROM registration_on";
$stmt = $conn->query($sql_select);
$stmt->execute();
if(isset($_POST['filter'])) {
$gender = $_POST['gender'];
$sql_select = "SELECT * FROM registration_on WHERE gender like :gender";
$stmt = $conn->prepare($sql_select);
$stmt->execute(array(':gender'=>$gender.'%'));
}
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
echo "<h2>Люди, которые зарегистрированы:</h2>";
echo "<table>";
echo "<tr><th>Name</th>";
echo "<th>Email</th>";
echo "<th>Gender</th>";
echo "<th>Age</th>";
echo "<th>Country</th>";
echo "<th>Birthday</th>";
echo "<th>Date</th></tr>";
foreach($registrants as $registrant) {
echo "<td>".$registrant['name']."</td>";
echo "<td>".$registrant['email']."</td>";
echo "<td>".$registrant['gender']."</td>";
echo "<td>".$registrant['age']."</td>";
echo "<td>".$registrant['country']."</td>";
echo "<td>".$registrant['birthday']."</td>";
echo "<td>".$registrant['date']."</td></tr>";
}
echo "</table>";
}
else {
echo "<h3>В настоящее время никто не зарегистрирован.</h3>";
}

?>

