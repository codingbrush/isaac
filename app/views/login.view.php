<?php
$title = "E-Extension";
include "partials/frontend/header.php"; ?>

<section class="h-100 mt-5">
    <div class="ml-auto mr-auto container">
        <form action="/login" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp">
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="passwordInput" class="form-control">
            </div>
            <button type="submit" class="btn btn-block-md btn-outline-primary text-center">Submit</button>
        </form>
    </div>
</section>

<?php include "partials/frontend/footer.php"; ?>