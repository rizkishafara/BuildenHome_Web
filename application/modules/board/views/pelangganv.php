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
                        <li class="breadcrumb-item active">Pelanggan</li>
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
                            <h3 class="card-title">Tabel Pelanggan</h3>
                            <br>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($pelanggan as $plg) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $plg->nama_pelanggan ?></td>
                                            <td><?php echo $plg->email_pelanggan ?></td>
                                            <td><?php echo $plg->username_pelanggan ?></td>
                                            <td><?php echo $plg->password_pelanggan ?></td>
                                            <td><?php echo $plg->jenis ?></td>
                                            <td>
                                                <a href="<?php echo base_url('board/data/pelanggan/detailPelanggan/'.$plg->id_pelanggan)?>"><span class="badge badge-primary">Detail</span></a>
                                                <a href="<?php echo base_url('board/data/pelanggan/editPelanggan/'.$plg->id_pelanggan)?>"><span class="badge badge-success">Edit</span></a>
                                                <a href="<?php echo base_url('board/data/pelanggan/hapusPelanggan/'.$plg->id_pelanggan)?>"><span class="badge badge-danger">Delete</span></a>
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