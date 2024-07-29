<!-- Area Chart -->
<div class="card shadow mb-4" id="modal-form">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" id="modal-form">
        <h6 class="m-0 font-weight-bold text-primary">Lecturer e-RPH Delivery Status</h6>
        <div class="dropdown no-arrow">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-expanded="false">
                Filter
                <i class="fa-solid fa-angle-down fa-xs"></i>
            </button>
            
            <!-- Modal -->
            <form action="" method="">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Filter</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body row g-3 p-4">
                                <div class="col-md-12">
                                    <label class="form-label">Email address</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                                <div class="col-9">
                                    <label class="form-label">Session</label>
                                    <select class="form-select" name="">
                                        <option id="block" value="">Select Session</option>
                                        <option value="">SVM</option>
                                        <option value="">DVM</option>
                                        <option value="">Both</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Year</label>
                                    <select class="form-select" name="">
                                        <option id="block" value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Week</label>
                                    <select class="form-select" name="">
                                        <option id="block" value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-block">Set</button>
                            </div>   
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
        </div>
    </div>
</div>