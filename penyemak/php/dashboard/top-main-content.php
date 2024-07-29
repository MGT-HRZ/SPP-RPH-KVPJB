<?php

    $sql_total_lec = "SELECT count(pensyarah) AS jum_pensyarah
                    FROM penyemak 
                    WHERE penyemak = '$id_pensyarah';
    ";

    $result_total_lec = mysqli_query($connect, $sql_total_lec);

    $row_total_lec = mysqli_num_rows($result_total_lec);

    $row_total_lec = mysqli_fetch_assoc($result_total_lec);

?>

<style>
    #mini-top-main-content {
        transition: 0.5s ease-in-out;
        cursor: pointer;
    }

    #mini-top-main-content:hover {
        transform: scale(1.05);
    }
</style>

<div class="col-xl-3 col-md-6 mb-4 border-none " id="mini-top-main-content">
    <div class="card shadow h-100 py-2 rounded-pill" style="border: 1px solid #009688; background-color: #009688;">
        <div class="card-body rounded-pill" data-bs-toggle="modal" data-bs-target="#listlecturer">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Total of Lecturers
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-white">
                        <?= $row_total_lec['jum_pensyarah'] ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-people-group fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    if ($id_roles == 1 || $id_roles == 2) {
        $sql_total_rev = "SELECT nama_pensyarah, count(id_pensyarah) AS jum_penyemak
                        FROM pensyarah
                        WHERE id_roles IN(2, 3, 4)
        ;";

        $result_total_rev = mysqli_query($connect, $sql_total_rev);

        $row_total_rev = mysqli_num_rows($result_total_rev);

        $row_total_rev = mysqli_fetch_assoc($result_total_rev);

        echo '
            <div class="col-xl-3 col-md-6 mb-4 " id="mini-top-main-content">
                <div class="card shadow h-100 py-2 rounded-pill" style="border: 1px solid #01bcd6; background-color: #01bcd6;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Total of Reviewers
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white">
                                    '.$row_total_rev['jum_penyemak'].'
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-magnifying-glass fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';

    }

    else {
        $sql_total_rev = "SELECT COUNT(id_pensyarah) AS jum_penyemak
                        FROM pensyarah
                        WHERE kod_jabatan = '$kod_jabatan' && id_roles IN(3, 4)
        ;";



        $result_total_rev = mysqli_query($connect, $sql_total_rev);

        $row_total_rev = mysqli_num_rows($result_total_rev);

        $row_total_rev = mysqli_fetch_assoc($result_total_rev);

        echo '
            <div class="col-xl-3 col-md-6 mb-4 " id="mini-top-main-content">
                <div class="card shadow h-100 py-2 rounded-pill" style="border: 1px solid #01bcd6; background-color: #01bcd6;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Total of Reviewers
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-white">
                                    '.$row_total_rev['jum_penyemak'].'
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa-solid fa-magnifying-glass fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }

?>



<div class="col-xl-3 col-md-6 mb-4" id="mini-top-main-content">
    <div class="card shadow h-100 py-2 rounded-pill" style="border: 1px solid #04a9f3; background-color: #04a9f3;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Week</div>
                    <div class="h5 mb-0 font-weight-bold text-white">
                        <?php echo $week_of_month; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar-week fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4" id="mini-top-main-content">
    <div class="card shadow h-100 py-2 rounded-pill" style="border: 1px solid #3f51b6; background-color: #3f51b6;">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        Date</div>
                    <div class="h5 mb-0 font-weight-bold text-white">
                        <?php echo $date_typ2; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-white"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2 rounded-pill">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tasks
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div> -->
