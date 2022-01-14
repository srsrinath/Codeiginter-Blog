<?= $this->extend('layouts/dashboard_layout') ?>
<?= $this->Section('content') ?>
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Categories</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">list of Categories</li>
                        </ol>
                        <div class="card">
                            <div class="card-header">
                                <h4> Add category
                                    <a href="#" data-toggle="modal" data-target="#addModal" class="btn btn-primary float-right">Add</a>
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="tabledata">

                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- end row -->
        </div>
    </div>
</div>
</div>
<!-- save modal-->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Test Data</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name:</label>
                    <span id="error_name" class="text-danger ms-3"></span>
                    <input type="text" class="form-control name" placeholder="Enter Category Name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-save">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal-->

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Edit Data</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" id="name" class="form-control name" placeholder="Enter Your Full Name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-update">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Delete Data</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="c_id">
                <h4>Are You sure want to delete this data?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete">Yes. Delete</button>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>

<?= $this->Section('scripts') ?>
<script>
    $(document).ready(function() {
        //alert('hello');
        getData();
    });

    function getData() {
        $.ajax({
            url: "<?= base_url('categories/get-data'); ?>",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log(response);
                $("#tabledata").html(response);
                // alert('hi');
            }
        });
    }


    $('#addModal').on('click', '.btn-save', function() {

        if ($.trim($('.name').val()).length == 0) {
            error_name = '*Please enter Category name';
            $('#error_name').text(error_name);
        } else {
            error_name = '';
            $('error_name').text(error_name);
        }
        if (error_name != '') {
            return false;
        } else {
            //alert('hello');
            var data = {
                "name": $(".name").val(),
            };
            $.ajax({
                url: "<?= base_url('categories/create'); ?>",
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    //console.log(response);
                    if (response.status == "success") {
                        $('#addModal').modal('toggle');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        getData();
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(response.message);
                    } else {
                        $('#addModal').modal('toggle');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        console.log(response.message);

                    }
                }

            });
        }
    });
    $(document).on('click', '.edit-btn', function() {
        //alert('hello');
        var id = $(this).data('id');
        //alert(id);
        //console.log($(this));
        $.ajax({
            method: "GET",
            url: "<?= base_url('categories/edit'); ?>/" + id,
            dataType: 'json',
            success: function(response) {
                //alert('response');
                //console.log(response);
                //console.log(response.c_id);
                $('#id').val(response.c_id);
                $('#name').val(response.name);
                $('#editModal').modal('show');
                //console.log(response.data.c_id);
                // $.each(response,function(key,value){
                //     $('#id').val(value['id']);
                //     $('#name').val(value['name']);
                //     $('#editModal').modal('show');
                // });
            }
        });
    });

    $(document).on('click', '.btn-update', function() {
        //alert('hello');
        var data = {
            "c_id": $('#id').val(),
            "name": $("#name").val(),
        };
        //console.log(data);
        $.ajax({
            url: "<?= base_url('categories/update'); ?>",
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                //console.log(response);
                if (response.status == "success") {
                    $('#editModal').modal('toggle');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    getData();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.message);
                } else {
                    $('#editModal').modal('toggle');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    console.log(response.message);

                }

            }
        });
    });
    $(document).on('click', '.btn-delete', function() {
        //alert('hello');
        var id = $(this).data('id');
        //alert(id);
        $('#c_id').val(id);
        $('#deleteModal').modal('show');
    });

    $(document).on('click', '.delete', function() {
        var id = $('#c_id').val();
        //alert(id);
        $.ajax({
            url: "<?= base_url('categories/delete'); ?>",
            method: 'POST',
            data: {
                id: id,
            },
            dataType: 'json',
            success: function(response) {
                //console.log(response);
                if (response.status == "success") {
                    $('#deleteModal').modal('toggle');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    getData();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.message);


                } else {
                    $('#deleteModal').modal('toggle');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    //console.log(response.message);

                }
                // alertify.set('notifier','position','top-right');
                // alertify.success(response.message);

            }
        });
    });
</script>

<?= $this->endSection('scripts') ?>