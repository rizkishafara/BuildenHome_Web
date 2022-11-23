<head>
    <title>malasngoding.com</title>
</head>

<body>
    <center>
        <h1>Membuat Upload File Dengan CodeIgniter | MalasNgoding.com</h1>
    </center>
    <?php
    if (isset($error)) {
        echo "ERROR UPLOAD : <br/>";
        echo $error;
        echo "<hr/>";
    }
    ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>auth/image/upload/aksi_upload">
        <div>Berkas : </div>
        <div><input type="file" name="berkas"></div>
        <div><input type="submit" value="Simpan" /></div>
    </form>
</body>

</html>