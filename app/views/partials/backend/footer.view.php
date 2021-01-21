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
<script src="/public/jquery.min.js"></script>
<script src="/public/ckeditor/ckeditor.js"></script>
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
<?php if(is('/announcements') == 'true'): ?>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'content' );
    </script>
    <script>
 $(document).on('click', '#submit', function (event) {
    event.preventDefault();
    const editorData = editor.getData();
    console.log(editorData);
    $.post('/announcements', {content: editorData}, function (data, status, jqXHR) {
        console.log(data);
        $('.msg').html("Data saved successfully");
    }).fail(function (response) {
        $('.msg').html("Opps  Unable to save data");
 });
});     
</script>
<?php endif; ?>
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>