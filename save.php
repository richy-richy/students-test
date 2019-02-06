<!DOCTYPE html>
<html>
<head>
	<meta  http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Студенты</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
	<header>
		<div id="content">	
		</div>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Сохранение изменений</a>
				</div>
		
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><u>Cтуденты</u></a></li>
						<li><a href="groups.php"><u>Группы</u></a></li>
					</ul>
					
				</div>
			</div>
		</nav>	
	</header>
	
	<div id="content">
		<div class="container-fluid">
			<?php include 'db.php'; ?>
			<?php include 'api.php'; ?>
			<?php 
				if(!empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['patronymic']) && !empty($_POST['student_id']) && !empty($_POST['group_id'])){
					$surname = $_POST['surname'];
					$name = $_POST['name'];
					$patronymic = $_POST['patronymic'];
					$student_id = $_POST['student_id'];
					$group_id = $_POST['group_id'];
					saveStudent($db, $surname, $name, $patronymic, $student_id, $group_id); 
				} else if(!empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['patronymic']) && !empty($_POST['group_id']) && empty($_POST['student_id'])){

					$surname = $_POST['surname'];
					$name = $_POST['name'];
					$patronymic = $_POST['patronymic'];
					$group_id = $_POST['group_id'];
					addStudent($db, $surname, $name, $patronymic, $group_id);
					}
				else if(!empty($_POST['number']) && !empty($_POST['id'])){
					$groups = getAllGroups($db);
					foreach ($groups as $groups) {
						if($groups['number'] == $_POST['number']){
							echo "<h1>Ошибка сохранения данных. Группа с таким номером уже существует!</h1>";
							exit();
						}
					}
					$number = $_POST['number'];
					$id = $_POST['id'];
					saveGroup($db, $number, $id); 
				} else if(!empty($_POST['number']) && empty($_POST['id'])){
					$groups = getAllGroups($db);
					foreach ($groups as $groups) {
						if($groups['number'] == $_POST['number']){
							echo "<h1>Ошибка сохранения данных. Группа с таким номером уже существует!</h1>";
							exit();
						}
					$number = $_POST['number'];
					addGroup($db, $number); 
					} 
				} 	
					else{
					echo "<h1>Ошибка сохранения данных</h1>";
					exit();
				}
			?>
		</div>
		<?php
		echo "<h1>Сохранение прошло успешно</h1>"
		?>
	</div>
	<footer>
		
	</footer>
</body>
</html>
