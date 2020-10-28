<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer fixed-footer footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020 All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="/public/app-assets/vendors/js/vendors.min.js"></script>
<script src="/public/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/public/app-assets/vendors/js/ui/prism.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/public/app-assets/js/core/app-menu.js"></script>
<script src="/public/app-assets/js/core/app.js"></script>
<script src="/public/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<?php if(is('/users')): ?>
    <script src="/public/assets/js/user.js"></script>
<?php endif;?>
<?php if(is('/reports') == 'true' ): ?>

    <script src="/public/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tinymceeditor'
        });
    </script>
<?php endif; ?>
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>