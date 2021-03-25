<?php
$title = "User ". $data[0]->firstname;
//var_dump($data[0]->firstname);
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
<!--            end of the session message-->
            <div class="container w-70">
                <div class="row">
                    <div class="col" style="width:100vw;">
                    <a href="/farmers" class="btn btn-primary mb-3">
                    <i class="feather icon-arrow-left mb-4 text-white font-medium-5"></i>
                    BACK
                    </a>
                        <form action="/farmers/update/<?php echo $data[0]->id?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputPassword1">First Name</label>
                                <input type="text" class="form-control" name="firstname" id="exampleInputPassword1" value="<?php echo $data[0]->firstname ?? ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Last Name</label>
                                <input type="text" class="form-control" name="lastname" id="exampleInputPassword1" value="<?php echo $data[0]->lastname ?? ''; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $data[0]->email ?? ''; ?>" aria-describedby="emailHelp" required>
                            </div>

                            <div class="form-group">
                                <label for="role">ROLE</label>
                                <select id="role" class="form-control" name="role" required>
                                    <option value="-1">SELECT ROLE</option>
                                    <option value="4" <?php echo ($data[0]->role_id === '4')?  'selected': ''; ?>>FARMER</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once __DIR__.'../../partials/backend/footer.view.php'; ?>
