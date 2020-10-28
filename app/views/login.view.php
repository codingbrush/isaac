<?php
$title = "E-Extension";
include "partials/frontend/header.php";?>

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
<section class="container h-100 mt-5">
    <div class="ml-auto mr-auto w-50">
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" aria-describedby="emailHelp" value="<?php echo $data['email'] ?? ''; ?>" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" >
                <span class="invalid-feedback"><?php echo $data['email_err'] ?? ''; ?></span>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" value="<?php echo $data['password'] ?? ''; ?>" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" >
                <span class="invalid-feedback"><?php echo $data['password_err'] ?? ''; ?></span>
            </div>
            <button type="submit" class="btn btn-block-md btn-outline-primary text-center">Submit</button>
        </form>
    </div>
</section>

<?php include "partials/frontend/footer.php";?>