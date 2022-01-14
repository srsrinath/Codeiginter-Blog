<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->Section('content') ?>
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Welcome to Dashboard</li>
                                </ol>
                                <h3>Here is your Admin Dashboard</h3>
                            </div>
                        </div>
                    </div><!-- end row -->
                </div>
            </div>
        </div>
<?= $this->endSection(); ?>