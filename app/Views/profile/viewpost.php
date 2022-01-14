<?= $this->extend('layouts/profile_layout') ?>
<?= $this->Section('content') ?>
<header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Your Posts</h1>
                    <span class="subheading">Welcome to your posts</span>
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
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                                        <?php endif; ?>
            <div>
                <a href="<?= base_url('posts/create') ?>"><button type="submit" class="btn btn-primary btn-sm la44 fs-6">Create Post</button></a>
            </div>
            <div class="row">
                <?php foreach ($posts as $key => $post) : ?>
                    <div class="card">
                        <div class="row">
                            <div class="col pt-4">
                                <img src="<?= 'uploads/posts/' . $post['image']; ?>" height="60px" width="60px">
                            </div>
                            <div class="col pt-1  m-2 fs-6 text-break">
                                <?= $post['title']; ?>
                            </div>
                            <div class="col pt-1  m-2 fs-6">
                                <?= $post['content']; ?>
                            </div>
                            <div class="col pt-1  m-4 fs-6">
                                <?= $post['name']; ?>
                            </div>
                            <div class="col pt-1  m-4 fs-6">
                                <?= $post['created_at']; ?>
                            </div>
                            <div class="col pt-4  m-1">
                                <a href="<?=base_url('posts/view/'.$post['slug'])?>" class="btn btn-success btn-sm"><i class="far fa-eye"></i></a>
                                <a href="<?= base_url('edit/' . $post['p_id']) ?>" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                <a href="<?= base_url('delete/'.$post['p_id'])?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

        </div>
    </div>

    <?= $this->endSection(); ?>