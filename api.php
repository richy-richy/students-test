<?php  

function getAllStudents($db,$numperpage){

	$page = $_GET['page'];
	$real_page = $page + 1;
	if(!$page || $page < 0){
		$page = 0;
	}
	$start = $page * $numperpage;
	$countsql = $db->prepare("SELECT COUNT(student_id) from students");
	$countsql->execute();
	
	$pag_row = $countsql->fetch();

	$numrecords = $pag_row[0];
	$numlinks = ceil($numrecords/$numperpage);

	echo 'Страница ' .$real_page. ' из ' .$numlinks. '. ';

	for($i = 0, $flag = 0;$i < $numlinks; $i++){
		$j = $i + 1;
		if($i == $page){
			echo '<a href="index.php?page=' .$i. '"><b>' .$j. '</b></a> ';
		}
		else if($i == 0 || $i == ($numlinks - 1) || (($i >= ($page -2)) && ($i <= ($page + 2)))){
			echo '<a href="index.php?page=' .$i. '"><u>' .$j. '</u></a> ';
		}
		else if(!$flag) {
			echo '...';
			$flag = 1;
		}
		else{}
	}

	$sql = "SELECT * FROM students 
			INNER JOIN groups ON students.group_id = groups.id
			ORDER BY groups.number
			LIMIT :start, :numperpage;";
	$result = array();

	$stmt = $db->prepare($sql);
	$stmt->bindValue(':numperpage', $numperpage, PDO::PARAM_INT);
	$stmt->bindValue(':start', $start, PDO::PARAM_INT);
	$res = $stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$result[$row['student_id']] = $row;
	}

	return $result;
}

function getAllGroups($db){
	$sql = "SELECT * FROM groups";
	$result = array();

	$stmt = $db->prepare($sql);

	$res = $stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$result[$row['id']] = $row;
	}

	return $result;
}

function getStudentById($db, $id){
	$sql = "SELECT * FROM students 
			INNER JOIN groups ON students.group_id = groups.id
			WHERE student_id = :student_id;";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':student_id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}

function saveStudent($db, $surname, $name, $patronymic, $student_id, $group_id){
	$sql = "UPDATE students
			SET  surname = :surname, name = :name, patronymic = :patronymic, group_id = :group_id
			WHERE student_id = :student_id;";

	$stmt = $db->prepare($sql);
	$stmt->bindValue(':surname', $surname, PDO::PARAM_STR);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->bindValue(':patronymic', $patronymic, PDO::PARAM_STR);
	$stmt->bindValue(':student_id', $student_id, PDO::PARAM_INT);
	$stmt->bindValue(':group_id', $group_id, PDO::PARAM_INT);

	$stmt->execute();
}

function getGroupById($db, $id){
	$sql = "SELECT * FROM groups
			WHERE id = :id;";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}

function saveGroup($db, $number, $id){
	$sql = "UPDATE groups
			SET  number = :number
			WHERE id = :id";

	$stmt = $db->prepare($sql);
	$stmt->bindValue(':number', $number, PDO::PARAM_INT);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);

	$stmt->execute();
}

function addStudent($db, $surname, $name, $patronymic, $group_id){
	$sql = "INSERT INTO students(surname, name, patronymic, group_id) 
			VALUES(:surname, :name, :patronymic, :group_id);
			";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':surname', $surname, PDO::PARAM_STR);
	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
	$stmt->bindValue(':patronymic', $patronymic, PDO::PARAM_STR);
	$stmt->bindValue(':group_id', $group_id, PDO::PARAM_INT);
	$stmt->execute();
}

function addGroup($db, $number){
	$sql = "INSERT INTO groups(number) 
			VALUES(:number);
			";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(':number', $number, PDO::PARAM_INT);
	$stmt->execute();
}


function deleteStudent($db, $student_id){

	$sql = "DELETE FROM students
			WHERE student_id = :student_id;
			";

	$stmt = $db->prepare($sql);
	$stmt->bindValue(':student_id', $student_id, PDO::PARAM_INT);
	$stmt->execute();
}

function deleteGroup($db, $id){
	$sql = "DELETE FROM groups
			WHERE id = :id;
			";

	$stmt = $db->prepare($sql);
	$stmt->bindValue('id', $id, PDO::PARAM_INT);
	$stmt->execute();
}

function getOtherGroups($db, $id){
	$sql = "SELECT * FROM groups
			WHERE id != :id;
			";

	$result = array();

	$stmt = $db->prepare($sql);
	$stmt->bindValue(':id', $id, PDO::PARAM_INT);

	$res = $stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		$result[$row['id']] = $row;
	}

	return $result;
}

