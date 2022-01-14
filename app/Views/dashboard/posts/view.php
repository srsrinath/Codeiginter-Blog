<?= $this->extend('layouts/user_layout') ?>
<?= $this->Section('content') ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?= base_url('uploads/posts/'.$post['image']) ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?= $post['title']; ?></h1>
                    <span class="subheading">
                        <p class="post-meta">
                            Posted by
                            <?= $post['name'] ?>
                            on <?=date('F d, Y', strtotime($post['created_at']));?>
                        </p>
                    </span>

                </div>
            </div>
        </div>
    </div>
</header>
<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <p> <?= $post['content'] ?></p>
                </div>   
            </div>
        </div>


<?= $this->endSection(); ?>