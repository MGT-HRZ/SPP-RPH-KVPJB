<?php

    //  Select all data from the database
    $sql = "SELECT * FROM pelajar;";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $numid = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    
    <div class="place2">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="card-title" id="sec_card_title">
                <label>Profile List</label>
            </h2>
            <div class="card" id="entire-tbl">
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" id="tbl-header">ID</th>
                            <th scope="col" id="tbl-header">Name</th>
                            <th scope="col" id="tbl-header">No. IC</th>
                            <th scope="col" id="tbl-header">Options</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    <?php 

                        //  Continue looping to display data from the database
                        while($row = mysqli_fetch_assoc($result)) { 
                            
                    ?>
                        <tr>
                            <th id="row-content" scope="row"><?= $row['id_pelajar'] ?></th>
                            <td id="row-content"><?= $row['nama'] ?></td>
                            <td id="row-content"><?= $row['noic'] ?></td>
                            <td id="row-content">
                                <a href="crud/profile.php?id=<?= $row['id_encrypt_key'] ?>" class="btn btn-warning me-2" id="view">View</a>
                                <a href="crud/delete.php?id=<?= $row['id_pelajar'] ?>" class="btn btn-danger me-2" id="delete">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        </div>
    </div>

</body>
</html>