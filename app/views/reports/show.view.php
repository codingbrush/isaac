<?php
//dd($_SESSION);
echo $title = $data[0]->title;
require __DIR__.'../../partials/backend/header.view.php';
//var_dump($data);
?>

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
            
                <div class="col" style="width:100vw;">
                    <div class="card">
                    
                    <div class="card-header d-flex justify-content-between pb-0">
                                    <h2 class="card-title">
                                    Title: <?php echo $data[0]->title;?>
                                    </h2>
                                    <div class="dropdown chart-dropdown">
                                        <a href="/reports" class="btn square btn-primary btn-icon">BACK</a>
                                        <a href="/reports/<?php echo $data[0]->id;?>" class="btn btn-info btn-icon square"><i class="feather icon-edit"></i></a>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <div class="row pt-4 p-3">
                                            <h4><span>Writer : <?php echo $_SESSION['name']; ?></span></h4>
                                        </div>
                                        <div class="row p-3">
                                       
                                         <p class="mt-2"><?php echo html_entity_decode($data[0]->content); ?></p>                      
                                        </div>
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