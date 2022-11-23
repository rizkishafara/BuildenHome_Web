<div class="">
    <div class="container">
        <?php foreach ($riwayat as $r) { ?>
            <?php echo form_open_multipart('service/page/review_mitra'); ?>
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_produk">Nama Petugas</label>
                    <input type="hidden" name="id_order" value="<?php echo $r['id_order'] ?>">
                    <input type="hidden" name="id_mitra" value="<?php echo $r['id_mitra'] ?>">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $r['nama_mitra'] ?>" readonly>
                    <?php echo form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama_produk">Jenis Jasa</label>
                    <input type="text" class="form-control" id="keahlian" name="keahlian" value="<?php echo $r['daftar_keahlian'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_produk">Status Pengerjaan</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $r['status_order'] ?>" readonly>
                </div>
                <div class=" form-group">
                    <label for="deskripsi">Ulasan</label>
                    <textarea type="text" class="form-control" id="review" name="review" rows="4" placeholder="Ulasan"></textarea>
                    <?php echo form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama_produk">Rating</label>
                    <?php if ($r['rating_review'] < 6) { ?>
                        <input type="number" class="form-control" name="rating" min="0" max="5">
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            Rating Max 5
                        </div>
                    <?php  } ?>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
            </div>
            <?php echo form_close(); ?>
        <?php } ?>
    </div>
</div>