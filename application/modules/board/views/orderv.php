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
                        <li class="breadcrumb-item active">Order</li>
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
                            <h3 class="card-title">Tabel Order</h3>
                            <br>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Pelanggan </th>
                                        <th>Kecamatan</th>
                                        <th>Kota</th>
                                        <th>Lokasi Pelanggan</th>
                                        <th>Layanan</th>
                                        <th>Status Order</th>
                                        <th>Status Bayar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                    foreach ($order as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $row->tanggal ?></td>
                                            <td><?php echo $row->waktu ?></td>
                                            <td><?php echo $row->nama_pelanggan ?></td>
                                            <td><?php echo $row->nama_kec ?></td>
                                            <td><?php echo $row->nama_kota ?></td>
                                            <td><?php echo $row->lokasi_pelanggan ?></td>
                                            <td><?php echo $row->daftar_keahlian ?></td>
                                            <td><?php echo $row->status_order ?></td>
                                            <td><?php echo $row->status_bayar ?></td>
                                            <td>
                                                <a href="<?php echo base_url('board/data/order/detailOrder/'.$row->id_order)?>"><span class="badge badge-primary">Detail</span></a>
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