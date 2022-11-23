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
                        <li class="breadcrumb-item">Keahlian</li>
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
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="card-header">
                            <h3 class="card-title">Tabel Keahlian</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="id_keahlian" value="<?php echo $keahlian->id_keahlian ?>" />
                                <div class="form-group">
                                    <label for="daftar_keahlian">Nama Keahlian</label>
                                    <input class="form-control <?php echo form_error('daftar_keahlian') ? 'is-invalid' : '' ?>" type="text" name="daftar_keahlian" placeholder="Id User" value="<?php echo $keahlian->daftar_keahlian ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('daftar_keahlian') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Keahlian</label>
                                    <input class="form-control-file <?php echo form_error('gambar_keahlian') ? 'is-invalid' : '' ?>" type="file" name="gambar_keahlian" />
                                    <input type="hidden" name="old_image" value="<?php echo $keahlian->gambar_keahlian ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('gambar_keahlian') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi*</label>
                                    <textarea class="form-control <?php echo form_error('deskripsi') ? 'is-invalid' : '' ?>" type="text" name="deskripsi" min="0" placeholder="Deskripsi" value=""><?php echo $keahlian->deskripsi ?></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('satuan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis">Jenis Keahlian</label>
                                    <input class="form-control <?php echo form_error('jenis') ? 'is-invalid' : '' ?>" type="text" name="jenis" placeholder="Id User" value="<?php echo $keahlian->jenis ?>" />
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jenis') ?>
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