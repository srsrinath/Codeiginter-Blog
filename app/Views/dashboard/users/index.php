<?= $this->extend('layouts/dashboard_layout') ?>
<?= $this->Section('content') ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        <h4 class="page-title">Users</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">list of Categories</li>
                        </ol>
                        <div class="table-responsive">
                            <table class=" table table-bordered table-hover mb-0" id="tabledata">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $row) : ?>
                                        <tr>
                                            <td><?php echo $row['u_id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td>
                                                <a href="<?= base_url('users/edit/'.$row['u_id']); ?>" class="btn btn-success btn-sm">Edit</a>
                                                <a href="<?= base_url('delete/' . $row['u_id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div>
</div>
</div>
<?= $this->endSection(); ?>