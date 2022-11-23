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
                        <li class="breadcrumb-item active">Mitra</li>
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
                            <h3 class="card-title">Tabel Mitra</h3>
                            <br>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Mitra</th>
                                        <th>Keahlian</th>
                                        <th>Nama Mitra</th>
                                        <th>Foto</th>
                                        <th>Alamat</th>
                                        <th>Harga Jasa</th>
                                        <th>No KTP</th>
                                        <th>Status</th>
                                        <th>Rating</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mitra as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->id_mitra ?></td>
                                            <td><?php echo $row->daftar_keahlian ?></td>
                                            <td><?php echo $row->nama_mitra ?></td>
                                            <td>
                                                <img src="<?php echo base_url('assets/gambar/img/'.$row->foto_mitra) ?>" width="120" />
                                            </td>
                                            <td><?php echo $row->alamat_mitra ?></td>
                                            <td><?php echo $row->harga_jasa ?></td>
                                            <td><?php echo $row->no_ktp ?></td>
                                            <td><?php echo $row->status ?></td>
                                            <td><?php echo $row->rating ?></td>
                                            <td>
                                                <a href="<?php echo base_url('board/data/mitra/editMitra/'.$row->id_mitra)?>"><span class="badge badge-success">Edit</span></a>
                                                <a href="<?php echo base_url('board/data/mitra/hapusMitra/'.$row->id_mitra)?>"><span class="badge badge-danger">Delete</span></a>
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