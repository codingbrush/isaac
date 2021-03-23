<?php
$title = 'Report List';
require __DIR__.'../../partials/backend/header.view.php';
//var_dump($data);
?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-body">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <!--            show the session message    -->
                    <?php if (isset($_SESSION['status'])): ?>
                    <div class="container w-50">
                        <div class=" alert alert-<?php echo $_SESSION['status']; ?> alert-dismissible fade show"
                            role="alert">
                            <p class="text-center"> <?php session_show();?> </p>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                    </div>
                    <?php endif;?>
                    <!--            end of session message-->
                    <!-- <a class="btn btn-primary" href="/reports/create">
                        <i class="feather icon-plus"></i> Add New
                    </a> -->

                    <div class="card mt-2" >
                        <div class="card-header mx-auto pb-0">
                            <div class="row m-0">
                                <div class="col-sm-12 text-center">
                                    <h4><strong><?php echo $_SESSION['name']; ?></strong></h4>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <p class=""><?php echo $data[0]->title; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body text-center mx-auto">
                                <div class="avatar">
                                <?php if(!$data[0]->avatar): ?>
                                    <img class="img-fluid"
                                        src="/public/imgs/avataaars.png"
                                        alt="img placeholder">
                                <?php else: ?>
                                    <img class="img-fluid"
                                        src="/public/imgs/<?php echo $data[0]->avatar; ?>"
                                        alt="img placeholder">
                                <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-around mt-2">
                                    <div class="uploads">
                                        <p class="font-weight-bold font-medium-2 mb-0"><?php echo $data[0]->email; ?></p>
                                        <span class="">EMAIL</span>
                                    </div>
                                   
                                    <div class="following">
                                        <p class="font-weight-bold font-medium-2 mb-0">
                                            <a href="/profile/<?php echo $data[0]->id; ?>" class="btn btn-md btn-primary btn-block">
                                            <i class="feather icon-edit"></i>
                                            </a>
                                        </p>
                                        <span class="">EDIT</span>
                                    </div>
                                </div>
                                <!-- <button
                                    class="btn gradient-light-primary btn-block mt-2 waves-effect waves-light">Follow</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- END: Content-->

<?php include_once __DIR__.'../../partials/backend/footer.view.php'; ?>