<div class="">
    <!-- <?php echo json_encode($riwayat) ?> -->
    <div class="container pb-5">
        <?php foreach ($riwayat as $r) :
            $biaya_admin = 10 / 100 * $r['harga_jasa'];
            $total = $biaya_admin + $r['harga_jasa'];
            $date = new DateTime($r['waktu']);
            //$tanggal = new DateTime($r['tanggal'])

            $rating = $r['rating_review']
        ?>
            <div class="card mt-5" id="data">
                <div class="card-body">
                    <table>
                        <tr>
                            <td>Jenis Jasa</td>
                            <td>:</td>
                            <td>
                                <?php echo $r['daftar_keahlian'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td>:</td>
                            <td><?php echo $r['nama_mitra'] ?></td>
                        </tr>
                        <tr>
                            <td>Biaya</td>
                            <td>:</td>
                            <td>Rp.<?php echo number_format($total) ?></td>
                        </tr>
                        <tr>
                            <td>Waktu Pengerjaan</td>
                            <td>:</td>
                            <td><?php echo $date->format('H:i') ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengerjaan</td>
                            <td>:</td>
                            <td><?php echo $r['tanggal'] ?></td>
                        </tr>

                    </table>
                </div>
                <div class="card-footer">
                    <?php if ($r['status_order'] == 'selesai' && $r['status_bayar'] == 'Belum Terbayar') { ?>
                        <?php echo form_open_multipart('service/page/status_bayar') ?>
                        <input type="hidden" name="id_order" d value="<?php echo $r['id_order'] ?>">
                        <input type="hidden" name="total" value="<?php echo $total ?>">
                        <table>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?php echo $r['status_order'] ?></td>
                            </tr>
                            <tr>
                                <td>Total Tagihan</td>
                                <td>:</td>
                                <td>Rp.<?php echo number_format($total) ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Rekening</td>
                                <td>:</td>
                                <td><?php echo 281848919 ?></td>
                            </tr>

                        </table>
                        <input type="file" name="bukti_tf"><br><br>
                        <button type="submit" class="btn btn-success">Upload Bukti Pembayaran</button>
                        </form>
                    <?php } else if ($r['status_order'] == 'sedang diproses') { ?>

                        <p><?php echo $r['status_order'] ?></p>
                        <a href="<?php echo base_url('service/page/batalOrder/'.$r['id_order'])?>" class="btn btn-danger">Batal Order</a>

                    <?php } else if ($r['status_order'] == 'selesai' && $r['status_bayar'] == 'Sudah Terbayar' && $rating == 0) { ?>

                        <div class="align-item-center">
                            <p align="center">Transaksi Telah Selesai, Silahkan Memberikan review</p>
                            <div style="margin-left: 505px; margin-top:5px;">

                                <div class="input-group flex-column flex-sm-row mb-3">
                                    <div class="input-group-append">
                                        <a href="<?php echo base_url('service/page/review_rating/' . $r['id_order']) ?>" type="button" class="btn btn-info btn-xs" >Beri Ulasan</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($rating != 0) { ?>
                        <p>Terima Kasih Telah Memberikan Ulasan</p>
                    <?php } ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    