<?= $this->extend('layouts/user_layout')?>
<?= $this->Section('content')?>
            <!-- Page Header-->
         <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Blog Site</h1>
                            <span class="subheading">A Blog Site</span>
                        </div>
                    </div>
                </div>
            </div>
        </header> 
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                                        <?php endif; ?>
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="post-preview">
                        <?php foreach($posts as $key=>$post):?>
                            <a href="<?=base_url('posts/view/'.$post['slug'])?>">
                            <h2 class="post-title"><?=  $post['title'] ?></h2></a>        
                            <?= $post['content']?>
                    <p class="post-meta">
                            Posted by
                            <?= $post['name'] ?>
                            on <?= date('F d, Y', strtotime($post['created_at']));?>
                        </p>
                        <?php endforeach; ?>
                    </div>
                </div>   
            </div>
        </div>

<?= $this->endSection();?>