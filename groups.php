<!DOCTYPE html>
<html>
<head>
	<meta  http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Группы</title>
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
					<a class="navbar-brand" href="#">Список групп</a>
				</div>
		
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><u>Cтуденты</u></a></li>
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
				$groups = getAllGroups($db);
			?>
			<a href="edit_group.php">+<u>Добавить группу</u></a>
			<table class="table table-bordered">
				<tr>
					<th>Группа</th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach ($groups as $groups) { ?>
					<tr>
						<td><?php echo $groups['number']; ?></td>
						<td><a href="edit_group.php?id=<?php echo $groups['id'];?>"><u>Ред.</u></a></td>
						<td><a href="delete.php?id=<?php echo $groups['id'];?>"><u>Удал.</u></a></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>