<script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Data</li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Detail Order</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="id">ID Order</label>
                                    <input readonly type="" class="form-control" id="id_oder" name="id_order" value="<?php echo $order->id_order ?>">
                                </div>
                                <div class="form-group">
                                    <label for="harga_jasa">Harga Jasa</label>
                                    <input readonly type="text" class="form-control" id="harga_jasa" name="harga_jasa" placeholder="Nama order" value="<?php echo $order->harga_jasa ?>">
                                </div>
                                <div class="form-group">
                                    <label for="biaya_admin">Biaya Admin</label>
                                    <input readonly type="text" class="form-control" id="biaya_admin" name="biaya_admin" placeholder="Nama order" value="<?php echo $order->biaya_admin ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mitra">Mitra</label>
                                    <input readonly type="text" class="form-control" id="mitra" name="mitra" placeholder="Nama order" value="<?php echo $order->nama_mitra ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mitra">Bukti Tf</label></br>
                                    <img src="<?php echo base_url('assets/gambar/bukti_tf/' .$order->bukti_tf) ?>" width="200" />
                                </div>
                                <div class="form-group">
                                    <label for="mitra">Rating</label>
                                    <input readonly type="text" class="form-control" id="mitra" name="mitra" placeholder="Nama order" value="<?php echo $order->rating_review ?>">
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    CKEDITOR.replace('deskripsi');
</script>