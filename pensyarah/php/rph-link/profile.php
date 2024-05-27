<?php 

    /** 
     *  Connects with js/to_main.js & js/dashboard.js
     *  Also connects with the css & bootstarp
     *  The variable determines the js files directory location
     */
    $num_of_dir = 3;
    $page_dir = "profile";

    //  Connects with php/logout/to_logout.php
    $num_of_dir_logout = 2;

    //  Connects with php/logout/logout_verify.php
    $end_session = "logout";

    require_once '../config.php';
    require_once '../imports.php';
    require_once '../images.php';
    require_once '../logout/logout.php';
    require_once '../logout/logout-verify.php';
    require_once 'update.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php conn_css($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_bootstrap($num_of_dir); ?>">
    <link rel="stylesheet" href="<?php conn_btm_nav_css($num_of_dir); ?>">
    <link rel="shortcut icon" href="<?php icon_site($num_of_dir, $page_dir); ?>" type="image/x-icon">
    <title><?= $row['nama'] ?>'s Profile | JTM | KVPJB</title>
</head>
<body>

    <div id="adjt-navbar">
        <?php require_once '../header.php'; ?>
    </div>

    <div class="place1">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="update-form">
                <div class="card-body">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <fieldset>
                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">ID</label>
                        <input type="text" id="textInput" name="id" class="form-control" value="<?= $row['id_pelajar'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">No. IC</label>
                        <input type="text" id="textInput" name="noic" class="form-control" value="<?= $row['noic'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">Name</label>
                        <input type="text" id="textInput" name="name" class="form-control" value="<?= $row['nama'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">Address</label>
                        <input type="text" id="textInput" name="address" class="form-control" value="<?= $row['alamat'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">City</label>
                        <input type="text" id="textInput" name="city" class="form-control" value="<?= $row['bandar'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">State</label>
                        <input type="text" id="textInput" name="state" class="form-control" value="<?= $row['negeri'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">Postcode</label>
                        <input type="text" id="textInput" name="postcode" class="form-control" value="<?= $row['poskod'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">No. Tel</label>
                        <input type="text" id="textInput" name="notel" class="form-control" value="<?= $row['notel'] ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">Course</label>
                        <input type="text" id="textInput" name="course" class="form-control" value="<?= $row['kursus'] ?>">
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label">E-mail</label>
                        <input type="text" id="textInput" name="email" class="form-control" value="<?= $row['email'] ?>">
                    </div>

                    <div class="d-grid mx-auto">
                        <br>
                        <button type="submit" name="update" class="btn btn-success btn-block"><b>Update</b></button>
                        <br>
                        <button type="reset" name="reset" class="btn btn-danger btn-block">Reset</button>
                        <br>
                        <a href="../dashboard.php" class="btn btn-primary btn-block">Back</a>
                    </div>
                </fieldset>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <?php include_once '../footer.php'; ?>
    
</body>
    <!-- Connects links to the main page -->
    <script src="../../js/to_main.js"></script>
    <!-- Connects links to the about us page -->
    <script src="../../js/to_about us.js"></script>
    <!-- Connects links to the dashboard page -->
    <script src="../../js/to_dashboard.js"></script>
    <!-- Connects links to the lecturer's profile page -->
    <script src="../../js/to_lec-pro.js"></script>
    <!-- Connects links to the feedback page -->
    <script src="../../js/to_feedback.js"></script>

    <script src="../../js/to_logout.js"></script>
    <script>
        let none = "none";

        //  Hides other button
        document.getElementById("show1").style.display = none;
        document.getElementById("show2").style.display = none;
        document.getElementById("show3").style.display = none;
    </script>
</html>