<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md">
                    <h1>Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Data</li>
                        <li class="breadcrumb-item active">Keahlian</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Keahlian</h3>
                            <br>
                            <a href="<?php echo base_url()?>/board/data/keahlian/tambahKeahlian"><span class="badge badge-primary">Tambah</span></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Keahlian</th>
                                        <th>Daftar Keahlian</th>
                                        <th>Gambar Keahlian</th>
                                        <th>Deskripsi</th>
                                        <th>Jenis Keahlian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($keahlian as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id_keahlian ?></td>
                                            <td><?php echo $row->daftar_keahlian?></td>
                                            <td>
                                                <img src="<?php echo base_url('assets/gambar/mitra/'.$row->gambar_keahlian) ?>" width="120" />
                                            </td>
                                            <td><?php echo $row->deskripsi ?></td>
                                            <td><?php echo $row->jenis?></td>
                                            <td>
                                                <a href="<?php echo base_url('board/data/keahlian/editKeahlian/'.$row->id_keahlian)?>"><span class="badge badge-success">Edit</span></a>
                                                <a href="<?php echo base_url('board/data/keahlian/delete/'.$row->id_keahlian)?>"><span class="badge badge-danger">Delete</span></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->