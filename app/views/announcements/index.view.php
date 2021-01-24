<?php
$title = 'Announcement List';
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
            <a class="btn btn-primary" href="/announcements/create">
                <i class="feather icon-plus"></i> Add New
            </a>

            <div class="row mt-1">
                <div class="col">
                    <table class="table table-hover-animation table-bordered thead-dark">
                        <thead>
                            <th>AUTHOR</th>
                            <th>TITLE</th>
                            <!-- <th>REPORT DATE</th> -->
                            <th>Modify</th>
                        </thead>
                        <tbody>
                            <?php foreach($data as $announcement): ?>
                            <tr style="td:hover:transform:ease-out;">
                                <td><?php echo ucfirst($announcement->firstname)." ".ucfirst($announcement->lastname); ?></td>
                                <td><?php echo html_entity_decode($announcement->title); ?></td>
                                <!-- <td></td> -->
                                <td class="d-flex">
                                    <a href="/announcements/<?php echo $announcement->id;?>" class="btn btn-icon square btn-primary"><i
                                            class="feather icon-edit"></i></a>
                                    <form action="/announcements/<?php echo $announcement->id;?>" method="post" class="pl-1">
                                    <button type="submit" class="btn btn-icon btn-round btn-danger"><i
                                    class="feather icon-trash-2"></i></button>
                                    </form>
                                    
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