<body>
    <div class="page-holder">
        <!-- navbar-->
        <header class="header bg-warning">
            <div class="container px-0 px-lg-3">
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0 mb-5">
                    <a class="navbar-brand text-center" href="<?php echo base_url('shop/page') ?>"></a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                            <?php if ($this->session->userdata('jenis') == 'admin') { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('board/dashboard') ?>">Dashboard</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('service/page') ?>">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('service/page/layanan') ?>">Layanan</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('service/page') ?>">Home</a>
                                </li>

                                <?php if ($this->session->userdata('jenis') == 'mitra') { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('mitra/mitra/index') ?>">Pesanan</a>
                                    </li>
                                <?php } else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('service/page/layanan') ?>">Layanan</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->session->userdata('jenis') == 'mitra') { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('mitra/mitra/riwayat') ?>">Riwayat</a>
                                    </li>
                                <?php } else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url('service/page/riwayat') ?>">Riwayat</a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Feature</a>
                                <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown">
                                    <a class="dropdown-item border-0 transition-link" href="<?php echo base_url('service/page/about') ?>">About</a>
                                    <a class="dropdown-item border-0 transition-link" href="<?php echo base_url('service/page/guide') ?>">Guide</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <?php
                            if (!$this->session->userdata('username')) {
                            ?>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth/login') ?>"> <i class="fas fa-sign-in-alt mr-1 text-gray"></i>&ensp;Login</a></li>
                            <?php
                            } else {
                            ?>
                                <li class="nav-item"><a class="nav-link" href="#"> <i class="fas fa-user-alt mr-1 text-gray"></i>&ensp;Hai, <?php echo ucfirst($this->session->userdata('username')); ?> !</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth/login/logout') ?>"> <i class="fas fa-sign-out-alt mr-1 text-gray"></i>&ensp;Logout</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>