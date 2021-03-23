<?php
is_route('/announcements/create') ?  $title = 'Create Announcement' : $title = 'Edit Announcement';
// if(is('/announcements/create') && empty($data))
// {
   // $title = 'Create Announcement';
// }else{
//     $title = 'Edit Announcement';
// }
require __DIR__ . '../../partials/backend/header.view.php';
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
                    <a href="/announcements" class="btn btn-primary mb-3">
                    <i class="feather icon-arrow-left mb-4 text-white font-medium-5"></i>
                    BACK
                    </a>
                    <form action="<?php $id = $data[0]->id ?? ''; echo (is_route('/announcements/create')) ? '/announcements' :  '/announcements/update/'.$id; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Title of Report</label>
                            <input type="text" class="form-control" name="title" id="titleinput" value="<?php echo html_entity_decode($data[0]->title) ?? ''; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Image:</label>
                            <input type="file" class="form-control" name="image" id="image" value="<?php echo $data[0]->image ?? ''; ?>" >
                            <span><?php echo $data[0]->image ?? ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" id="editor1" rows="10" cols="80">
                               <?php if (is('/announcements')): ?>
                                    <?php echo ($data[0]->content ?? ''); ?>
                               <?php endif;?>
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-block-md btn-lg btn-primary text-center">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->


<?php include_once __DIR__ . '../../partials/backend/footer.view.php';?>