<?php
$title = 'Create Report';
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
                    <form action="/reports" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Title of Report</label>
                            <input type="text" class="form-control" name="title" id="titleinput" value="<?php echo $data[0]->title ?? ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Report Date</label>
                            <input type="date" class="form-control" name="report_date" id="report_date" value="<?php echo $data[0]->report_date ?? ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="Content">Content</label>
                            <textarea id="tinymceeditor" name="content" onsubmit="var content = tinymce.activeEditor.getContent();">
                                <?php if(is('/reports/{id}')): ?>
                                    
                                <?php endif; ?>
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


<?php include_once __DIR__.'../../partials/backend/footer.view.php'; ?>