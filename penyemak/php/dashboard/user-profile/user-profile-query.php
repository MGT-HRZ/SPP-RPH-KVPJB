<?php

    // Uploads profile image to github folder
    require_once 'up-propic-github.php';

?>

<?php

    require_once '../../config.php';

    if (isset($_POST['save'])) {

        $id_pensyarah = $_POST['id_pensyarah'];
        $nama_pensyarah = $_POST['name'];
        $username = $_POST['noic'];
        $sesi = $_POST['session'];
        $email = $_POST['email'];
        $notel = $_POST['notel'];
        $pro_image = $_POST['pro_image'];

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
                    if ($propic_name == $pro_image) {
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
                        echo 'File name deosn\'t match';

                        $propic_name = $pro_image;
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
            $propic_name = $pro_image;
        }
        
        //  Insert all data to the database
        $sql_upt_pro_lec = "UPDATE pensyarah SET
            nama_pensyarah = '$nama_pensyarah',
            username = '$username',
            sesi = '$sesi',
            email = '$email',
            no_tel = '$notel',
            pro_image = '$propic_name'
            WHERE id_pensyarah = '$id_pensyarah'
        ;";
 
        try {

            $result = mysqli_query($connect, $sql_upt_pro_lec);

            if ($result) {
                header('Location: ../../dashboard.php?UPT-YR-PRO-SUCCESS');
            }
    
            else {
                header('Location: ../../dashboard.php?UPT-YR-PRO-FAIL');
            }

        } 
        
        catch (mysqli_sql_exception $e) {

            //  This code check if there's a duplicate key
            $error_code = $e -> getCode();

            if ($error_code === 1062) {
                header('Location: ../../dashboard.php?DUPLICATE-KEY');   
            }

            else {
                header('Location: ../../dashboard.php?UPT-YR-PRO-FAIL');
            }

        }

    }

?>