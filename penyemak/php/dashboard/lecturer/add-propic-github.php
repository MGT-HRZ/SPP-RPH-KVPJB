<?php

    include_once '../../../../env.php';

    $up_file = $_FILES['file'];

    if (!empty($up_file['name']) && $up_file['size'] < 300000) {

        // File is uploaded

        // Uncomment the next line for testing purposes
        // print_r($up_file);

        // Extract information about the uploaded file
        $up_file_name = $up_file['name'];
        $up_file_tmpname = $up_file['tmp_name'];
        $up_file_size = $up_file['size'];
        $up_file_error = $up_file['error'];
        $up_file_type = $up_file['type'];

        // Extract the file extension
        $file_ext = explode('.', $up_file_name);
        $file_actualext = strtolower(end($file_ext));

        // Allowed file extensions
        $allow = array('jpg', 'jpeg', 'png');

        // Check if the file extension is allowed
        if (in_array($file_actualext, $allow)) {
            // Check for upload errors
            if ($up_file_error === 0) {
                // Check if the file size is within the limit
                if ($up_file_size < 300000) {

                    $githubUsername = $GITHUB_USER;
                    $repositoryName = $GITHUB_REPO;
                    $personalAccessToken = $GITHUB_ACCESS_TOKEN;

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $subdirectory = 'lecturer-profile';
                        $uploadedFile = $_FILES['file'];

                        if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
                            $fileContents = file_get_contents($uploadedFile['tmp_name']);

                            // GitHub API endpoint with subdirectory path
                            $url = "https://api.github.com/repos/{$githubUsername}/{$repositoryName}/contents/{$subdirectory}/{$uploadedFile['name']}";

                            // Prepare data for GitHub commit
                            $data = [
                                'message' => 'Add ' . $uploadedFile['name'],
                                'content' => base64_encode($fileContents),
                            ];

                            // Create HTTP headers
                            $headers = [
                                'Authorization: token ' . $personalAccessToken,
                                'Content-Type: application/json',
                                'User-Agent: PHP-File-Upload',
                            ];

                            // Make the GitHub API request
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                            $response = curl_exec($ch);
                            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                            curl_close($ch);

                            if ($httpCode === 200 || $httpCode === 201) {
                                echo 'File uploaded and committed to GitHub.';
                            } else {
                                echo 'Error uploading file to GitHub.';
                            }
                        } else {
                            echo 'Error uploading file.';
                        }
                    }

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
        echo 'empty';
    }

?>