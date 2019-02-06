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
						<li><a href="students.php"><u>Cтуденты</u></a></li>
						<li><a href="groups.php"><b>Группы</b></a></li>
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
				if(!empty($_POST['number']) && !empty($_POST['id'])){
					$number = $_POST['number'];
					$id = $_POST['id'];
					saveGroup($db, $number, $id); 
				} else if(!empty($_POST['number']) && empty($_POST['id'])){
					$number = $_POST['number'];
					addGroup($db, $number); 
				} 
				else{
					echo "<h1>Ошибка сохранения данных.</h1>";
				}

			?>
		</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>
