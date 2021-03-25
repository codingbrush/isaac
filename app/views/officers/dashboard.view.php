<?php
$title = 'Dashboard';
require_once __DIR__.'../../partials/backend/header.view.php'; ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0">
                                        <?php echo $data['count_extensions']->extension_officers;?></h2>
                                    <p>Extension Officers</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-user text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0"><?php echo $data['count_farmers']->farmers; ?></h2>
                                    <p>Farmers</p>
                                </div>
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-user-check text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h2 class="text-bold-700 mb-0"><?php echo $data['count_reports']->reports; ?></h2>
                                    <p>Reports</p>
                                </div>
                                <div class="avatar bg-rgba-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-file text-warning font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                <div class="col-lg-3 col-sm-6 col-12">-->
                    <!-- <div class="card">
                        <div class="card-header d-flex align-items-start pb-0">
                            <div>
                                <h2 class="text-bold-700 mb-0">13</h2>
                                <p>Issues Found</p>
                            </div>
                            <div class="avatar bg-rgba-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-alert-octagon text-warning font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!--                </div>-->

                </div>
                <div class="row mt-3">
                    <div class="col-md-12 col-12">
                    
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ANNOUCEMENTS!!</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    THE LATEST ANNOUCEMENTS ARE AT THE TOP
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Author</th>
                                                <th>Modify</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($data['announcements'] as $announcement): ?>
                                            <tr class="">
                                                <td >
                                                <img class="rounded-circle" style="width:50px;height:50px;background-size:contain" src="/public/imgs/<?php echo $announcement->image?>" alt="announcement image">
                                                </td>
                                                <td><h5 ><?php echo html_entity_decode($announcement->title); ?></h5></td>
                                                <td><?php echo ucfirst($announcement->firstname)." ".ucfirst($announcement->lastname); ?></td>
                                                <td>
                                                <a href="/announcements/detail/<?php echo $announcement->id?>" class="btn btn-primary btn-icon square" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tooltip on top"><i class="feather icon-file"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

<?php require_once __DIR__.'../../partials/backend/footer.view.php';?>