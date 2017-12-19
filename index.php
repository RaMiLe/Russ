<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Регистрационная форма</title>
<link rel ="stylesheet" href ="/style.css">
<link rel ="stylesheet" href ="/form.css">
</head>
<body>
<h1>Зарегистрироваться здесь!</h1>
<p>Введите свое имя и адрес электронной почты и нажмите кнопку <strong>Отправить</strong> для регистрации.</p>
<form action="index.php" method="post">
<div>
<input type ="text" name ="name" id ="name" placeholder ="Введите ваше имя">
<input type ="text" name ="email" id ="email" placeholder ="Ваш еmail..">
<input type ="text" name ="age" id ="age" placeholder ="Ваш возраст..">
<input type ="text" name ="country" id ="country" placeholder ="Страна">
<input type ="date" name ="birthday" id ="birthday" placeholder ="Дата рождения">
<div>
<input type ="submit" name ="submit" class ="btn" value ="Отправить">
<input type ="submit" name ="clear" class ="btn" id = "clr" value ="Очистить"></pre>
</div>
</div>
<div>
<select name ="gender" class ="gen">
<option value ="">All</option>
<option value ="Man" <?php if($gender == 'Man'){echo 'selected';}?»Man</option>
<option value ="Woman" <?php if($gender == 'Woman'){echo 'selected';}?»Woman</option>
</select>
<input type="submit" name="filter" class="btn" value="Фильтр">
</div>
</form>
</body>
</html>

<?php
try {
$conn = new PDO("sqlsrv:server = tcp:ramil.database.windows.net,1433; Database = Tat", "ramil", "Rosbank1997");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
print("Error connecting to SQL Server.");
die(print_r($e));
}
if(!empty($_POST)) {
try {
$name = $_POST['name'];
  $name = $_POST['name'];
$email = $_POST['email'];
$date = date("Y-m-d");

// Insert data
$sql_insert =
"INSERT INTO registration_too (name, email, date)
VALUES (?,?,?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bindValue(1, $name);
$stmt->bindValue(2, $email);
$stmt->bindValue(3, $date);

$stmt->execute();
}
catch(Exception $e) {
die(var_dump($e));
}
echo "<h3>Your're registered!</h3>";
}
$sql_select = "SELECT * FROM registration_too";
$stmt = $conn->query($sql_select);
$registrants = $stmt->fetchAll();
if(count($registrants) > 0) {
echo "<h2>People who are registered:</h2>";
echo "<table>";
echo "<tr><th>Name</th>";
  echo "<tr><th>Name</th>";
echo "<th>Email</th>";
echo "<th>Date</th></tr>";

foreach($registrants as $registrant) {
echo "<tr><td>".$registrant['name']."</td>";
  echo "<tr><td>".$registrant['name']."</td>";
echo "<td>".$registrant['email']."</td>";
echo "<td>".$registrant['date']."</td></tr>";
}
echo "</table>";
} else {
echo "<h3>No one is currently registered.</h3>";
}
?>
</body>
</html>

