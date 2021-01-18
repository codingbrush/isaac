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
            <!--            show the session message    -->
            <?php if (isset($_SESSION['status'])): ?>
            <div class="container w-50">
                <div class=" alert alert-<?php echo $_SESSION['status']; ?> alert-dismissible fade show" role="alert">
                    <p class="text-center"> <?php session_show();?> </p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            </div>
            <?php endif;?>
            <!--            end of session message-->
            <a class="btn btn-primary" href="/reports/create">
                <i class="feather icon-plus"></i> Add New
            </a>

            <div class="row mt-1">
                <div class="col">
                    <table class="table table-hover-animation table-bordered thead-dark">
                        <thead>
                            <th>AUTHOR</th>
                            <th>TITLE</th>
                            <th>REPORT DATE</th>
                            <th>Modify</th>
                        </thead>
                        <tbody>
                            <?php foreach($data as $report): ?>
                            <tr style="td:hover:transform:ease-out;">
                                <td><?php echo ucfirst($report->firstname)." ".ucfirst($report->lastname); ?></td>
                                <td><?php echo $report->title; ?></td>
                                <td><?php echo $report->report_date; ?></td>
                                <td>
                                    <a href="/reports/<?php echo $report->id;?>" class="btn btn-icon square btn-primary"><i
                                            class="feather icon-edit"></i></a>
                                    <a href="/reports/<?php echo $report->id;?>" class="btn btn-icon btn-round btn-danger"><i
                                            class="feather icon-trash-2"></i></a>
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
<!-- END: Content-->

<?php include_once __DIR__.'../../partials/backend/footer.view.php'; ?>