<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->Section('content') ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit User:-</h4>
                        <div class="container">
                            <div class="row" style="margin-top:30px;">
                                <div class="col-md-4 col-md offset-2">
                                    <form action="<?=base_url('users/update/'.$user["u_id"]);?>" method="post">
                                        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                                        <?php endif; ?>
                                        <div class="form-group mb-3">
                                            <label for="Name" class="form-label">Name:</label>
                                            <input type="text" name="name" class="form-control" value="<?=$user['name'];?>" placeholder="Enter Your Name" >
                                            
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'name') : '' ?>
                                            </span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="text" name="email" value="<?=$user['email'];?>" class="form-control" placeholder="Enter Your email">
                                            
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'email') : '' ?>
                                            </span>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password" class="form-label">Password:</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'password') : '' ?>
                                            </span>
                                            
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="cpassword" class="form-label">confirmpassword:</label>
                                            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                                            <span class="text-danger">
                                                <?= isset($validation) ? display_error($validation, 'cpassword') : '' ?>
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