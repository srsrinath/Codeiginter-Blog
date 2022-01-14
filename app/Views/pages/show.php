<?= $this->extend('layouts/profile_layout') ?>
<?= $this->Section('content') ?>
<header class="masthead" style="background-image: url('<?= base_url("assets/img/about-bg.jpg"); ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>View Details</h1>
                    <span class="subheading">Details of your posts</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-3 p-2 m-3">
            <div class="card h-100" style="width: 18rem;">
                <img src="<?= '../uploads/posts/' . $post['image']; ?>" class=" card-img-top" alt="Image">
                <div class="card-body">
                    <p class="card-text">
                    <h4>Title:</h4><?= $post['title'] ?></p>
                    <p class="card-text">
                    <h4>Content:</h4><?= $post['content'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>