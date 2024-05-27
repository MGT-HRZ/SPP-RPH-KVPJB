<?php

    include_once '../config.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM pelajar WHERE id_pelajar = '$id';";
	$result = mysqli_query($connect, $sql);

	if ($result) {
		header('Location: ../dashboard.php?DELETE-SUCCESS');
	}

	else {
		header('Location: ../dashboard.php?DELETE-FAIL');
	}

?>