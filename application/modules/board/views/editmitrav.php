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
                        <li class="breadcrumb-item">Mitra</li>
                        <li class="breadcrumb-item active">Edit</li>
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
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                        <div class="card-header">
                            <h3 class="card-title">Tabel Mitra</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                
                            <div class="form-group">
                                    <label for="id">ID Mitra</label>
                                    <input class="form-control <?php echo form_error('id_mitra') ? 'is-invalid':'' ?>"
                                    type="text" name="id_mitra" placeholder="id_mitra" value="<?php echo $mitra->id_mitra ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_mitra') ?>
                                    </div>
                            </div>
                            <div class=" form-group">
                                    <label for="keahlian">Keahlian</label>
                                    <select class="form-control" placeholder="Keahlian" id="keahlian" name="keahlian">

                                        <option value="<?php echo $mitra->id_keahlian ?>"><?php echo $mitra->daftar_keahlian ?></option>
                                        <?php
                                        foreach ($keahlian as $ahli) :
                                        ?>
                                            <option value="<?php echo $ahli->id_keahlian ?>"><?php echo $ahli->daftar_keahlian ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?php echo form_error('keahlian', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="id">Nama Mitra</label>
                                    <input class="form-control <?php echo form_error('nama_mitra') ? 'is-invalid':'' ?>"
                                    type="text" name="nama_mitra" placeholder="nama_mitra" value="<?php echo $mitra->nama_mitra ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_mitra') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label for="">Foto Mitra</label>
                                        <input class="form-control-file <?php echo form_error('foto_mitra') ? 'is-invalid':'' ?>"
                                        type="file" name="foto_mitra" />
                                        <input type="hidden" name="old_image" value="<?php echo $mitra->foto_mitra ?>" />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('foto_mitra') ?>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label for="alamat_mitra">Alamat Mitra</label>
                                    <input class="form-control <?php echo form_error('alamat_mitra') ? 'is-invalid':'' ?>"
                                    type="text" name="alamat_mitra" placeholder="Alamat Mitra" value="<?php echo $mitra->alamat_mitra ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('alamat_mitra') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga_jasa">Harga Jasa</label>
                                    <input class="form-control <?php echo form_error('harga_jasa') ? 'is-invalid':'' ?>"
                                    type="text" name="harga_jasa" placeholder="Harga Jasa" value="<?php echo $mitra->harga_jasa ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('harga_jasa') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="no_ktp">No KTP</label>
                                    <input class="form-control <?php echo form_error('no_ktp') ? 'is-invalid':'' ?>"
                                    type="text" name="no_ktp" placeholder="No KTP" value="<?php echo $mitra->no_ktp ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_ktp') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>"
                                    type="text" name="status" placeholder="Status" value="<?php echo $mitra->status ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('status') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input class="form-control <?php echo form_error('rating') ? 'is-invalid':'' ?>"
                                    type="text" name="rating" placeholder="Rating" value="<?php echo $mitra->rating ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('rating') ?>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input class="btn btn-success" type="submit" name="btn" value="Save" />
                            </div>
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