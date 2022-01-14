<?= $this->extend('layouts/user_layout') ?>
<?= $this->Section('content') ?>
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Contact Me</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form method="post" action="<?= base_url('send');?>">
            <?php if(!empty(session()->getFlashdata('fail'))):?>
                    <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
                    <?php endif;?>
                    <?php if(!empty(session()->getFlashdata('success'))):?>
                    <div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
                    <?php endif;?>
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'name'): '' ?>
                        </span>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number:</label>
                    <input type="phone" class="form-control" id="phone" name="phone">
                    <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'phone'): '' ?>
                        </span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'email'): '' ?>
                        </span>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                    <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'subject'): '' ?>
                        </span>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea class="form-control" type="text" name="message" rows="3"></textarea>
                    <span class="text-danger">
                        <?= isset($validation) ? display_error($validation,'message'): '' ?>
                        </span>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">SEND</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>