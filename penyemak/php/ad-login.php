<?php

    if ($num_of_dir == 0) {
        $url_0 = 'penyemak/php/';
        
        $url_dns = $url_0.'log.php';

    }

    else {
        $url_0 = 'php/';
        
        $url_dns = $url_0.'log.php';

    }

?>

<!-- Modal -->
<form action="<?php echo $url_dns; ?>" method="post">
<div class="modal fade" id="adlog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-5">
            <div class="modal-header rounded-4" style="background-color: #262262;">
                <h1 class="modal-title text-white fs-5" id="exampleModalLabel">Admin Log</h1>
                <button type="button" class="btn-close bg-white rounded-circle" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <fieldset>
                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label text-dark">Username</label>
                        <input type="text" id="textInput" name="user" class="form-control text-dark rounded-pill" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="textInput" class="form-label text-dark">Password</label>
                        <input type="password" id="textInput" name="pass" class="form-control text-dark rounded-pill" required>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer rounded-4" style="background-color: #262262;">
                <button type="reset" class="btn btn-danger rounded-pill">Reset</button>
                <button type="submit" name="login" class="btn btn-primary rounded-pill">Enter</button>
            </div>
        </div>
    </div>
</div>
</form>