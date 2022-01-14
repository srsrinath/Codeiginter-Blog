<?= $this->extend('layouts/user_layout') ?>
<?= $this->Section('content') ?>
<header class="masthead" style="background-image:url('<?= base_url('assets/img/about-bg.jpg') ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Create Post</h1>
                    <span class="subheading">Create your posts here!</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <form class="mt-5 mb-5" action="<?= base_url('update/' . $posts['p_id']); ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3 text-center form-group">
            <label for="categories" class="form-label"><b>Categories:-</b></label>
            <select name="c_id">
                <?php foreach ($category as $cat): ?>
                    <option class="form-control"value="<?=$cat['c_id']?>" <?=($posts['c_id']==$cat['c_id'])? 'selected':''?>><?=$cat['name']?></option>
                <?php endforeach; ?>
            </select>
        </div>


</select>

        <div class="mb-3 text-center form-group">
            <label for="formFile" class="form-label"><b>Title:</b></label>
            <input class="form-control" type="text" name="title" value="<?= $posts['title'] ?>">
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'title') : '' ?>
            </span>
        </div>
        <div class="mb-3 text-center form-group">
            <label for="formFile" class="form-label"><b>Upload a image:</b></label>
            <input class="form-control" type="file" name="image" id="formFile">

            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'image') : '' ?>
            </span>
            <img src="<?="../uploads/posts/".$posts['image']; ?>" height="100px" width="100px">
        </div>
        <div class="mb-3 text-center form-group">
            <label for="formFile" class="form-label"><b>Description:</b></label>
            <textarea class="form-control" type=" text" name="content" rows="3"><?= $posts['content'] ?></textarea>
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'content') : '' ?>
            </span>
        </div>

        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>