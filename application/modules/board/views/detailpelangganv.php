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
                        <li class="breadcrumb-item">Pelanggan</li>
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
                            <h3 class="card-title">Tabel Pelanggan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role=""  enctype="multipart/form-data">
                            <div class="card-body">
                              
                                <div class="form-group" >
                                    <label for="nama_pelanggan">ID pelanggan</label>
                                    <input readonly type="" class="form-control" id="inputName" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan ?>">
                                </div>
                                <div class="form-group" >
                                    <label for="nama_pelanggan">Nama pelanggan</label>
                                    <input readonly type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama pelanggan" value="<?php echo $pelanggan->nama_pelanggan ?>" >
                                    <?php echo form_error('nama_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email_pelanggan">Email pelanggan</label>
                                    <input readonly type="text" class="form-control" id="email_pelanggan" name="email_pelanggan" placeholder="Email pelanggan" value="<?php echo $pelanggan->email_pelanggan ?>">
                                    <?php echo form_error('email_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="username_pelanggan">Username</label>
                                    <input readonly type="text" class="form-control" id="username_pelanggan" name="username_pelanggan" placeholder="Username" value="<?php echo $pelanggan->username_pelanggan ?>">
                                    <?php echo form_error('username_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password_pelanggan">Password</label>
                                    <input readonly type="text" class="form-control" id="password_pelanggan" name="password_pelanggan" placeholder="Password" value="<?php echo $pelanggan->password_pelanggan ?>">
                                    <?php echo form_error('password_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_pelanggan">Alamat</label>
                                    <input readonly type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" placeholder="Alamat" value="<?php echo $pelanggan->alamat_pelanggan ?>">
                                    <?php echo form_error('alamat_pelanggan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input readonly type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" value="<?php echo $pelanggan->no_hp ?>">
                                    <?php echo form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group ">
                                    <label for="jenis">Jenis*</label></br>
                                    <?php $jenis = $pelanggan->jenis; ?>
                                    <select disabled class=" form-control bootstrap-select <?php echo form_error('jenis') ? 'is-invalid' : '' ?>" type="select" name="jenis" placeholder="Kategori" aria-label="Default select example">
                                        <option value="">Pilih Kategori</option>
                                        <option <?php echo ($jenis == 'admin') ? "selected" : "" ?> value="admin">admin</option>
                                        <option <?php echo ($jenis == 'member') ? "selected" : "" ?> value="member">member</option>
                                        <option <?php echo ($jenis == 'mitra') ? "selected" : "" ?> value="mitra">mitra</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kategori') ?>
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label for="kecamatan">Kota</label>
                                    <select disabled class="form-control" placeholder="Kategori" id="kota" name="kota">

                                        <option value="<?php echo $pelanggan->id_kota ?>"><?php echo $pelanggan->nama_kota ?></option>
                                        <?php
                                        foreach ($kota as $kot) :
                                        ?>
                                            <option value="<?php echo $kot->id_kota ?>"><?php echo $kot->nama_kota ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?php echo form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>


                                <div class=" form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <select disabled class="form-control" placeholder="Kategori" id="kecamatan" name="kecamatan">

                                        <option value="<?php echo $pelanggan->id_kecamatan ?>"><?php echo $pelanggan->nama_kec ?></option>
                                        <?php
                                        foreach ($kecamatan as $k) :
                                        ?>
                                            <option value="<?php echo $k->id_kec ?>"><?php echo $k->nama_kec ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                    <?php echo form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
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