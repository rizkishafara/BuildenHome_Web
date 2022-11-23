<section class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <!-- PRODUCT SLIDER-->
                <div class="row m-sm-0">
                    <div class="col-sm-10 order-1 order-sm-2">
                        <img class="img-fluid" src="<?php echo base_url('assets/gambar/mitra/') . $mitra['gambar_keahlian'] ?>">
                    </div>
                </div>
            </div>
            <!-- PRODUCT DETAILS-->
            <div class="col-lg-6">
                <h1><?php echo $mitra['daftar_keahlian'] ?></h1>
                <div class="p-4 p-lg-5 bg-white">

                    <p class="text-muted text-small mb-0"><?php echo $mitra['deskripsi'] ?></p>
                </div>

                <form action="<?php echo base_url(); ?>shop/shopping/tambah" method="post" accept-charset="utf-8">
                    <div class="row align-items-stretch mb-4">

                        <div class="col-sm-3 pl-sm-0 ml-5"><button type="submit" class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0">Pesan Sekarang</button></div>
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>