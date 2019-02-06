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
					<a class="navbar-brand" href="#">Редактирование/Добавление группы</a>
				</div>
		
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="groups.php"><u>Вернуться к списку групп >></u></a></li>
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
				$id = $_GET['id'];
				if($id){
					$group =  getGroupById($db, $id);
			} 
				
			?>

			<form action="save.php" method="post" id="form">
				<input type="hidden" name="id" value="<?php echo $group['id']; ?>">
				<div class="form-group">
					<label for="number">Номер группы</label>
					<input type="number" class="form-control" id="number" name="number" value="<?php echo $group['number']; ?>">		
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