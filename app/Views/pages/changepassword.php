<?= $this->extend('layouts/user_layout') ?>
<?= $this->Section('content') ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>change password</h1>
                    <span class="subheading">change old password to new password</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row" style="margin-top:45px;">
        <div class="col-md-4 col-md offset-4">
            <form action="<?= base_url('/updatepassword') ?>" method="post">
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
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>