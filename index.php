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

