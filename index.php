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
					<a class="navbar-brand" href="#">Список студентов</a>
				</div>
		
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><b>Cтуденты</b></a></li>
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
				$numperpage = 2;
				$students = getAllStudents($db,$numperpage);
			?>
			<p><a href="edit_student.php">+<u>Добавить студента</u></a></p>
			<table class="table table-bordered">
				<tr>
					<th>ФИО</th>
					<th>Группа</th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach ($students as $students) { ?>
					<tr>
						<td><?php echo $students['surname'] . " " . $students['name'] .  " " . $students['patronymic'] ; ?></td>
						<td><?php echo $students['number']; ?></td>
						<td><a href="edit_student.php?student_id=<?php echo $students['student_id']?>&group_id=<?php echo $students['group_id'];?>"><u>Ред.</u></a></td>
						<td><a href="delete.php?student_id=<?php echo $students['student_id'];?>"><u>Удал.</u></a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>