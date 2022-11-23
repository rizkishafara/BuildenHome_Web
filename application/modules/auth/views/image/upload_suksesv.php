<html>

<head>
    <title>malasngoding.com </title>
</head>

<body>
    <center>
        <h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1>
    </center>
    <ul>
        <?php foreach ($upload_data as $item => $value) : ?>
            <li><?php echo $item; ?>: <?php echo $value; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="<?php echo base_url(); ?>auth/image/upload">Tambah Berkas</a>
    </br>
    <table border="1" width="30%" style="text-align:center;">
        <tr>
            <th>No</th>
            <th>Image</th>
        </tr>
        <?php
        $no = 1;
        foreach ($berkas->result() as $row) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><img width="100 " src="<?php echo base_url(); ?>assets/gambar/<?php echo $row->nama_berkas; ?>" /></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>