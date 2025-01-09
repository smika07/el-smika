<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
    <!--<title> Login </title>-->
    <link rel="stylesheet" href="../stylingg.css">
    <!-- Fontawesome CDN Link -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<!--header-->
<?php
include("header.php");
$id_materi=$_GET['id_materi']
?>
<!--header-->
        <title>Tambah Pertanyaan</title>
    <body>
        <div class="inputsoal">
            <div class="soalform">

        <h2>Tambah Pertanyaan</h2>
        <form action="../sistem/input.php" method="POST">
            <input type="text" name="id_materi" value="<?php echo $id_materi;?>" hidden>
            <input type="text" name="tipeform" value="tambah_soal" hidden>
            <p>
                <label>soal</label><br>
                <textarea cols="50" rows="6" name="soal" required></textarea>
            </p>
            <p>
                <label>Skor</label><br>
                <input type="number" name="poin" required>
            </p>
            <strong>Jawaban</strong>
            <table>
                <thead>
                    <tr>
                        <td>Jawaban</td>
                        <td>Benar</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="table-jawaban">
                    <tr>
                        <td><input type="text" required name="jawaban1"></td>
                        <td><input type="radio" name="benar" value="1"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" required name="jawaban2"></td>
                        <td><input type="radio" name="benar" value="2"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" required name="jawaban3"></td>
                        <td><input type="radio" name="benar" value="3"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" required name="jawaban4"></td>
                        <td><input type="radio" name="benar" value="4"></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" required name="jawaban5"></td>
                        <td><input type="radio" name="benar" value="5"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit">Simpan</button>
        </form>
        </div>
        <div class="soal">
            <h3>SOAL</h3>
        <?php
      $query = "SELECT id, isi_soal, pilihan_a, pilihan_b, pilihan_c, pilihan_d, pilihan_e FROM soal where id_materi=$id_materi";
      $result = $conn->query($query);

      if ($result === false) {
        echo "Error: " . $conn->error;
      } else {
        while ($row = $result->fetch_assoc()) {
          echo "<div>";
          echo "<p>" . $row['isi_soal'] . "</p>";
          echo "<ul>";
          echo "<li>".$row['pilihan_a']."</li>";
          echo "<li>".$row['pilihan_b']."</li>";
          echo "<li>".$row['pilihan_c']."</li>";
          echo "<li>".$row['pilihan_d']."</li>";
          echo "<li>".$row['pilihan_e']."</li>";
          echo "</ul>";
          echo "<a id='hapus' href='../sistem/delete.php?hapus=hapus_soal&id_materi=$id_materi&id=".$row['id']."'><i class='fa-solid fa-trash'></i></a>";
          echo "</div>";
        }
      } ?>
</div>
</div>

    </body>
    </body>

</html>