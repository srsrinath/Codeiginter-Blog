<?= $this->extend('layouts/dashboard_layout') ?>
<?= $this->Section('content') ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Change Passoword:-</h4>
                        <div class="container">
                            <div class="row" style="margin-top:30px;">
                                <div class="col-md-4 col-md offset-2">
                                    <form action="<?= base_url('/update') ?>" method="post">
                                        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                                        <?php endif; ?>

                                        <div class="form-group mb-3">
                                            <label for="oldpassword">old password:</label>
                                            <input type="password" name="oldpassword" class="form-control" placeholder="Enter old password">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'oldpassword') : '' ?>
                                            </span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="newpassword">New password:</label>
                                            <input type="password" name="newpassword" class="form-control" placeholder="Enter New password">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'newpassword') : '' ?>
                                            </span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="confirm_password">Re-enter password:</label>
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Re-Enter new password">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'confirm_password') : '' ?>
                                            </span>
                                        </div>
                                        <div class="form-group mb-3 text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                                        </div>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div>
    </div>
</div>
<?= $this->endSection(); ?>