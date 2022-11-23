<div class="">
    <!-- <?php echo json_encode($detail) ?> -->
    <div class="container" style="width: 300px; margin-right:883px;">
        <form action="<?php echo base_url('mitra/mitra/tarik_saldo') ?>">
            <div class="card">
                <div class="card-body">
                    <?php
                    $total = 0;
                    foreach ($saldo as $s) : ?>
                        <?php $total = $total + $s['harga_jasa'] ?>
                    <?php endforeach; ?>
                    Saldo Anda : <font><?php echo $total ?></font>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark btn-block" id="button-addon2" data-toggle="modal" type="button" data-target="#exampleModal">Tarik Saldo </button>
                </div>
            </div>
        </form>
    </div>

    <div class="container pb-5 pt-5">
        <?php
        foreach ($detail as $d) {
        ?>
            <form action="<?php echo base_url('mitra/mitra/change_status') ?>" method="post">

                <div class="card">
                    <div class="card-body">
                        <table>
                            <input type="hidden" name="id_order" value="<?php echo $d['id_order']; ?>">
                            <input type="hidden" name="id_mitra" value="<?php echo $d['id_mitra'] ?>">
                            <tr>
                                <td>Jenis Jasa</td>
                                <td>:</td>
                                <td>
                                    <?php echo $d['daftar_keahlian'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Pelanggan</td>
                                <td>:</td>
                                <td><?php echo $d['nama_pelanggan'] ?></td>
                            </tr>
                            <tr>
                                <td>Biaya</td>
                                <td>:</td>
                                <td>Rp.<?php echo number_format($d['harga_jasa']) ?></td>
                            </tr>
                            <tr>
                                <td>Lokasi Order</td>
                                <td>:</td>
                                <td> <?php echo $d['alamat_pelanggan'] ?> </td>
                            </tr>
                            <tr>
                                <td>Waktu Pengerjaan</td>
                                <td>:</td>
                                <td><?php echo $d['waktu'] ?>, <?php echo $d['tanggal'] ?></td>
                            </tr>

                        </table>
                    </div>
                    <div class="card-footer">
                        <?php if ($d['status_order'] == 'sedang diproses') { ?>
                            <button class="btn btn-success" type="submit">Selesai</button>
                        <?php } else { ?>
                            <p><?php echo $d['status_bayar'] ?></p>
                        <?php } ?>
                    </div>
                </div>
            </form>
        <?php } ?>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('service/page/tambah_mitra'); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_produk">Nomor Rekening</label>
                                <input type="text" class="form-control" id="norek" name="norek" placeholder="norek">
                                <?php echo form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" name="btnSubmit" class="btn btn-primary">Tarik Saldo</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>