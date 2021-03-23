<?php
is_route('/profile/create') ?  $title = 'Create Report' : $title = 'Edit Report';
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
                    <a href="/profile" class="btn btn-primary mb-3">
                    <i class="feather icon-arrow-left mb-4 text-white font-medium-5"></i>
                    BACK
                    </a>
                    <form action="<?php $id = $data[0]->id ?? ''; echo (is_route('/profile/create')) ? '/profile' :  '/profile/update/'.$id; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <div class="form-group">
                            <label for="exampleInputPassword1">First Name:</label>
                            <input type="text" class="form-control" name="firstname" id="firstnameinput" value="<?php echo $data[0]->firstname ?? ''; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name:</label>
                            <input type="text" class="form-control" name="lastname" id="lastnameinput" value="<?php echo $data[0]->lastname ?? ''; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Email:</label>
                            <input type="email" class="form-control" name="email" id="emailInput" value="<?php echo $data[0]->email ?? ''; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Password:</label>
                            <input type="password" class="form-control" name="password" id="passwordInput" min="8">
                        </div>

                        <div class="form-group mb-2">
                            <label for="exampleInputPassword1">Image Upload:</label>
                            <input type="file" class="form-control" name="avatar" id="avatar" >
                            <span>Current Image Name: <?php echo $data[0]->avatar ?? ''; ?></span>
                        </div>

                        <button type="submit" class="btn btn-block-md btn-lg btn-primary text-center" id="buttonpost">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->


<?php include_once __DIR__.'../../partials/backend/footer.view.php'; ?>