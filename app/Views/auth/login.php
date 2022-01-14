<?= $this->extend('layouts/user_layout')?>
<?= $this->Section('content')?>
<header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Login</h1>
                            <span class="subheading">Login to your credentials</span>
                        </div>
                    </div>
                </div>
            </div>
        </header> 
        <div class="container">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-4 col-md offset-4">
                <form action="<?=base_url('/check');?>" method="post">
                <?php if(!empty(session()->getFlashdata('fail'))):?>
                    <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
                    <?php endif;?>
                    <?php if(!empty(session()->getFlashdata('success'))):?>
                    <div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
                    <?php endif;?>    
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
                    <div class="form-group mb-3 text-center">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <br>
                    <a href="<?= base_url('/register')?>">Have no account, create new account</a>
                </form>
            </div>
        </div>
    </div>



<?= $this->endSection();?>