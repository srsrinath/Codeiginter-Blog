<?= $this->extend('layouts/user_layout')?>
<?= $this->Section('content')?>
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Register</h1>
                            <span class="subheading">Sign Up now</span>
                        </div>
                    </div>
                </div>
            </div>
        </header> 
        <div class="container">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-4 col-md offset-4">
                <form action="<?=base_url('/save')?>" method="post">
                    <div class="form-group mb-3">
                        <label for="Name" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                        <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'name'): '' ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter Your email">
                        <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'email'): '' ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'password'): '' ?>
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cpassword" class="form-label">confirmpassword:</label>
                        <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                        <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'cpassword'): '' ?>
                        </span>
                    </div>
                    <div class="form-group mb-3 text-center">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <br>
                    <a href="<?= base_url('/login')?>">I already have account, login now</a>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection();?>