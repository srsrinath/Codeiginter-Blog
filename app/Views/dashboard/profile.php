<?= $this->extend('layouts/dashboard_layout') ?>
<?= $this->Section('content') ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Profile:-</h4>
                        <div class="container">
                            <div class="row" style="margin-top:30px;">
                                <div class="col-md-4 col-md offset-2">
                                    <form action="<?= base_url('/store/'.$users['u_id'])?>" method="post">
                                        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                                        <?php endif; ?>
                                        <div class="form-group mb-3">
                                            <label for="Name" class="form-label">Name:</label>
                                            <input type="text" name="name" value="<?= $users['name']?>" class="form-control" placeholder="Enter Your Name">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'name') : '' ?>
                                            </span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="text" name="email" value="<?= $users['email']?>" class="form-control" placeholder="Enter Your email">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'email') : '' ?>
                                            </span>
                                        </div>
                                        <div class="form-group mb-3 text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Save</button>
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