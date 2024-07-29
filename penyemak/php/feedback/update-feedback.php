<?php

// IMPORTANT_TO_KNOW_FOR_UPDATE :

/**
 *  1. Check the SQL syntax for update & connection to the database
 *  2. After connection to the database, use variabel $_GET
 *  3. Put <?php $_SERVER['PHP_SELF']?> in the <form> tag\
 *  4. Put <?=$row_read['column_name']?> in every <input> tag to pull back the data
 *  5. Don't forget to put <name="update"> in the submit / register / update in the <button> tag
 */

$id = $_GET['id'];
$sql = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id';";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

	$val_id = $_POST['idpelanggan'];
	$val_name = $_POST['name'];
	$val_noic = $_POST['noic'];
	$val_notel = $_POST['notel'];
	$val_address = $_POST['address'];
	$val_feedback = $_POST['feedback'];

	$sql = "UPDATE pelanggan SET 
            id_pelanggan = '$val_id', 
            nama = '$val_name',
            noic = '$val_noic', 
            notel = '$val_notel',
			alamat = '$val_address',
            aduan = '$val_feedback'
        
        WHERE id_pelanggan = '$id';";

	$redir = mysqli_query($connect, $sql);

	if ($redir) {
		header('Location: ../dashboard.php?UPDATE-FEEDBACK-SUCCESS');
	} else {
		header('Location: ../dashboard.php?UPDATE-FEEDBACK-FAIL');
	}
}
