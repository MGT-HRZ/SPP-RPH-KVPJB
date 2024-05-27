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
$sql = "SELECT * FROM pelajar WHERE id_encrypt_key = '$id';";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {

	$val_id = $_POST['id'];
	$val_noic = $_POST['noic'];
	$val_name = $_POST['name'];
	$val_address = $_POST['address'];
	$val_city = $_POST['city'];
	$val_state = $_POST['state'];
	$val_postcode = $_POST['postcode'];
	$val_notel = $_POST['notel'];
	$val_course = $_POST['course'];
	$val_email = $_POST['email'];

	$sql = "UPDATE pelajar SET 
            id_pelajar = '$val_id', 
            noic = '$val_noic', 
            nama = '$val_name',
            alamat = '$val_address',
            bandar = '$val_city',
            negeri = '$val_state',
            poskod = '$val_postcode',
            notel = '$val_notel',
            kursus = '$val_course', 
            email = '$val_email'
        
        WHERE id_encrypt_key = '$id';";

	$redir = mysqli_query($connect, $sql);

	if ($redir) {
		header('Location: ../dashboard.php?UPDATE-SUCCESS');
	} else {
		header('Location: ../dashboard.php?UPDATE-FAIL');
	}
}
