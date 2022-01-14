<?= $this->extend('layouts/profile_layout') ?>
<?= $this->Section('content') ?>
<header class="masthead" style="background-image: url('<?=base_url("assets/img/about-bg.jpg")?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Profile</h1>
                    <span class="subheading">Welcome to your profile</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container-lg-2">
    <div class="row jumbotron">
        <div class="col-lg-3">
            <div class="accordion " id="accordionExample">
                <div class="la">
                    <div class="la1 rs">
                        <div class="la2">
                            <div>
                                <div class="la3">
                                    <div class="la4 rs"><span class="l1 fs-6">hello,<b class="fs-5"><?= session()->get('name'); ?></b></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="la">
                    <div class="la1 rs">
                        <div class="la2">
                            <div>
                                <div class="la3">
                                    <div class="la5 rs">
                                        <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <span><i class="fas fa-clipboard" style="color:blue"></i><a href="<?= base_url('/viewpost') ?>" class="la33 fs-6"> Your Posts</a></span>
                                            <i class="fa fa-angle-right toggle"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-9">
            <div style="background-color: white;">

                <h6 class="change">Personal information:</h6>
                <div class="container">
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                                        <?php endif; ?>
                <div class="row" style="margin-top:30px;">
                        <div class="col-md-4 col-md offset-2">
                        <form action="<?=base_url('/savedetails');?>" method="post">    
                        <div class="form-group mb-3">
                                <label for="Name" class="form-label">Name:</label>
                                <input type="text" name="name" value="<?= $users['name'] ?>" class="form-control" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" name="email" value="<?= $users['email'] ?>" class="form-control" placeholder="Enter Your email">
                            </div>
                            <div class="form-group mb-3">
                                <button  type="submit" class="btn btn-primary">Save</button>
                                
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>


<?= $this->endSection(); ?>