<?php
$title = 'User List';
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
                <i class="feather icon-plus"></i> Add New
            </button>

            <div class="row mt-1">
                <div class="col">
                    <table class="table table-bordered table-hover-animation thead-dark">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Activated</th>
                        <th>Modify</th>
                        </thead>
                        <tbody>
                        <?php foreach($data['users'] as $user): ?>
                        <tr>
                            <td><?php echo $user->firstname.' '.$user->lastname; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <?php if($user->activated == '1' ): ?>
                                <td><button type="button" class="btn btn-icon rounded-circle btn-success mr-1 mb-1 waves-effect waves-light"><i class="feather icon-check"></i></button></td>
                            <?php else: ?>
                            <td><button type="button" class="btn btn-icon rounded-circle btn-warning mr-1 mb-1 waves-effect waves-light"><i class="feather icon-x"></i></button></td>
                            <?php endif; ?>
                            <td id="modify" class="d-flex">
                                <a href="/users/<?php echo $user->id; ?>" class="btn btn-icon square btn-primary" id="edit"><i class="feather icon-edit none"></i></a>
                                <form action="/users/delete/<?php echo $user->id; ?>" method="post" class="pl-1">
                                    <button class="btn btn-icon btn-round btn-danger" type="submit"><i class="feather icon-trash-2 none"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title text-center" id="myModalLabel2">Create New User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col" style="width:100vw;">
                            <form action="/create" method="post">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">First Name</label>
                                    <input type="text" class="form-control" name="firstname" id="exampleInputPassword1" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" id="exampleInputPassword1" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                                </div>

                                <div class="form-group">
                                    <label for="role">ROLE</label>
                                    <select id="role" class="form-control" name="role" required>
                                        <option value="-1">SELECT ROLE</option>
                                        <option value="2">EXTENSION OFFICER</option>
                                        <option value="3">DISTRICT OFFICER</option>
                                        <option value="4">FARMER</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            </div>
                            </div>
                        </div>

                    </div><!-- modal-content -->
                </div><!-- modal-dialog -->
            </div><!-- modal -->

        </div>
    </div>
</div>
<!-- END: Content-->

<?php include_once __DIR__.'../../partials/backend/footer.view.php'; ?>