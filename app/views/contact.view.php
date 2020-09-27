<?php
$title = "E-Extension";
include "partials/frontend/header.php"; ?>

<div class="w-100 position-relative text-center mb-4">

    <img src="<?php echo URLROOT . '/public/assets/imgs/headers.png'?>" class="img-fluid position-relative" alt="Photo by Dan Meyers on Unsplash">
    <h2 class="position-absolute " style="top:50%;left:50%;color:white;transform: translate(-50%, -50%);">
        YOUR ONE STOP SHOP FOR NEWS AND INFORMATION ON AGRICULTURE IN GHANA.
    </h2>
</div>
<div class="container pb-3">
    <form method="post" action="/contact">
    <div class="mb-3">
            <label for="fullname" class="form-label">Full Name *</label>
            <input type="email"  name="fullname" class="form-control" id="fullname" aria-describedby="emailHelp">
            <div id="fullnameHelp" class="form-text">We'll never share your name with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email address *</label>
            <input type="text" class="form-control" name="email" id="" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Message *</label>
            <textarea class="form-control" rows="10" cols="10" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include "partials/frontend/footer.php"; ?>