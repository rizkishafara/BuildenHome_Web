<!-- SHOP LISTING-->
<!-- <?php echo json_encode($order_servis) ?> -->
<div class="">
    <div class="container">
        <table class="table align-items-center">
            <div class="col-md-4 ml-auto mb-4">
                <input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
            </div>

            <tr>
                <th>No</th>
                <th>List Order</th>
                <th>Aksi</th>
            </tr>

            <div id="container">
                <?php
                $no = 1;
                foreach ($order_servis as $o) :
                    if ($o['status_order'] == 'belum' && $o['status'] == 'tersedia') {
                ?>
                        <form method="post" action="<?php echo base_url() ?>mitra/mitra/input_detail">
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td>
                                    <div class="card">
                                        <div class="card-body">

                                            <h5><?php echo $o['daftar_keahlian'] ?></h5>
                                            <p><?php echo $o['lokasi_pelanggan'] ?></p>
                                            <small><?php echo $o['waktu'] ?>, <?php echo $o['tanggal'] ?></small>

                                            <input type="hidden" value="<?php echo $o['id_order'] ?>" name="id_order">
                                            <input type="hidden" value="<?php echo $o['id_mitra'] ?>" name="id_mitra">
                                            <input type="hidden" value="<?php echo $o['harga_jasa'] ?>" name="tarif">

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-success" type="submit">Terima</button>
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                <?php endforeach; ?>


            </div>
            <tr>
                <div style="margin-left: 330px;">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </tr>
        </table>
    </div>
</div>
</div>
</div>
</section>

</div>