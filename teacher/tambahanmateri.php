<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Materi</title>
    <link rel="stylesheet" href="../stylingg.css"> 
</head>

<?php
include("header.php");
?>

<body >
    <div style="overflow:auto" class="tambahanmateri">
  
        <div class="main">
            <h3>Tambah isi Materi</h3>
            <hr>
            <form action="../sistem/input.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="tipeform" value="tambah_isimateri" hidden>
                <input type="text" name="id_materi" value="<?php echo $_GET['id_materi'];?>" hidden>
                <label for="nama_materi">Nama Materi:</label><br>
                <input type="text" name="nama_materi" required><br><br>

                <label for="deskripsi">Deskripsi:</label><br>
                <textarea name="deskripsi" required></textarea><br><br>

                <input type="text" name="kategori" value="materi" hidden>

                <label for="berkas">Upload File:</label><br>
                <input type="file" name="file" required><br><br>

                <button type="submit">Tambah Materi</button>
            </form>
        </div>


    </div>

    </body>
</html>
