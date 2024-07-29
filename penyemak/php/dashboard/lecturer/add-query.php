<?php

    // Uploads profile image to github folder
    require_once 'add-propic-github.php';

?>

<?php

    require_once '../../config.php';

    if (isset($_POST['add'])) {

        $nama_pensyarah = strtoupper($_POST['name']);
        $username = $_POST['noic'];
        $sesi = $_POST['session'];
        $kod_jabatan = $_POST['department_code'];
        $kod_program = $_POST['program_code'];
        $email = $_POST['email'];
        $notel = $_POST['notel'];

        $pass = 'password';
        $pass_encrypt = md5(md5($pass));
        $roles = 5;

        $propic = $_FILES['file'];

        // Check if a file is uploaded
        if (!empty($propic['name']) && $propic['size'] < 300000) {
            // File is uploaded

            // Uncomment the next line for testing purposes
            // print_r($propic);

            // Extract information about the uploaded file
            $propic_name = $propic['name'];
            $propic_tmpname = $propic['tmp_name'];
            $propic_size = $propic['size'];
            $propic_error = $propic['error'];
            $propic_type = $propic['type'];

            // Extract the file extension
            $file_ext = explode('.', $propic_name);
            $file_actualext = strtolower(end($file_ext));

            // Allowed file extensions
            $allow = array('jpg', 'jpeg', 'png');

            // Check if the file extension is allowed
            if (in_array($file_actualext, $allow)) {
                // Check for upload errors
                if ($propic_error === 0) {
                    // Check if the file size is within the limit
                    if ($propic_size < 300000) {
                        // Uncomment the next line if you want to generate a unique name
                        // $propic_newname = uniqid('', true).'.'.$file_actualext;

                        // Define the file location on the server
                        $file_location = '../../../../images/lecturer-profile/'.$propic_name;

                        // Move the uploaded file to the specified location
                        move_uploaded_file($propic_tmpname, $file_location);

                    } 
                    
                    else {
                        // File size exceeds the limit
                        echo 'File is too big!';
                    }
                } 
                
                else {
                    // An error occurred during the file upload
                    echo 'Something went wrong uploading the image';
                }
            } 
            
            else {
                // File type not supported
                echo 'File type not supported';
            }
        } 
        
        else {
            // File is not uploaded, set a default value
            $propic_name = 'default.png';
        }
        
        // Insert all data to the database
        $sql = "INSERT INTO pensyarah (
                    nama_pensyarah,
                    username,
                    password,
                    pass_encrypt,
                    sesi,
                    kod_jabatan,
                    kod_program,
                    email,
                    no_tel,
                    id_roles,
                    pro_image
                ) 
                
                VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                );";
        
        try {
            // Prepare the SQL statement
            $stmt = mysqli_prepare($connect, $sql);
            
            if ($stmt) {
                // Bind parameters
                mysqli_stmt_bind_param($stmt, "sssssssssss", $nama_pensyarah, $username, $pass, $pass_encrypt, $sesi, $kod_jabatan, $kod_program, $email, $notel, $roles, $propic_name);
                
                // Execute the statement
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                    header('Location: ../../dashboard.php?ADD-LEC-SUCCESS');
                } else {
                    header('Location: ../../dashboard.php?ADD-LEC-FAIL');
                }
            } else {
                throw new Exception("Failed to prepare statement.");
            }

        } 
        
        catch (Exception $e) {
            // Handle exceptions
            header('Location: ../../dashboard.php?ADD-LEC-FAIL');
        }

    }

?>