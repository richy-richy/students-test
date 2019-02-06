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
					<a class="navbar-brand" href="#">Редактирование/Добавление студента</a>
				</div>
		
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><u>Вернуться к списку студентов >></u></a></li>
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
				$id = $_GET['student_id'];
				$group_id = $_GET['group_id'];
				if($id){
					$student =  getStudentById($db, $id);
					$groups = getOtherGroups($db,$group_id);
			}
			else {
				$groups = getAllGroups($db,$group_id);
			} 	
			?>

			<form action="save.php" method="post" id="form">
				<input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
				<div class="form-group">
					<label for="surname">Фамилия</label>
					<input type="text" class="form-control" id="surname" name="surname" value="<?php echo $student['surname']; ?>">		
				</div>
				<div class="form-group">
					<label for="name">Имя</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $student['name']; ?>">		
				</div>
				<div class="form-group">
					<label for="patronymic">Отчество</label>
					<input type="text" class="form-control" id="patronymic" name="patronymic" value="<?php echo $student['patronymic']; ?>">		
				</div>
				<div class="form-group">
			      <label for="group_id">Группа</label>
			      <select name="group_id" id="group_id" class="form-control">
			      	<?php 
			      		
			      			echo "<option value=".$student['id'].">".$student['number']."</option>";
			      		foreach ($groups as $key => $value) {
			      			echo "<option value=".$value['id'].">".$value['number']."</option>";
			      		}
			      	?>
			      </select>
			    </div>
				<button type="submit" class="btn btn-default">Сохранить</button>
				<button type="reset" class="btn btn-primary" onclick="clearform()">Удалить</button>
			</form>
		</div>
	</div>
	<footer>
		
	</footer>

	<script type="text/javascript" src ="scripts/clear.js" ></script>
</body>
</html>