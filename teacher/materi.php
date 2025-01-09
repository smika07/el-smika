<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
include("header.php");
$id_mapel = $_GET['id_mapel'];

?>


<body >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../stylingg.css">
  <div style="overflow:auto" class="materi">
    <div class="materi_form">
    <h2>tambah materi</h2>
      <form action="../sistem/input.php" method="post">
        <input type="text" name="id_mapel" value="<?php echo $id_mapel;?>" hidden>
        <input type="text" name="tipeform" value="input_materi" hidden>
        <input type="text" name="nama_materi" placeholder="masukan judul materi" required><br>
        <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
      </form>
    </div>

    <div class="main">
      <?php
      $sql = "SELECT * FROM materi where id_mapel=$id_mapel";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<div class='daftar-mapel'>";
        echo "<h2>Daftar materi</h2>";
        while ($row = $result->fetch_assoc()) {
          $id_materi = $row['id'];
          $format = date('d.m.20y', strtotime($row['tanggal_buat']));
          echo "<div class='box'>";
          echo "<p>" . htmlspecialchars($row['judul']) . "</p>";
          echo "<p>" . htmlspecialchars($format) . "</p>";
          $sql_isimateri = "SELECT * FROM isi_materi WHERE id_materi = $id_materi";
          $result_materi = $conn->query($sql_isimateri);
          while ($row_materi = $result_materi->fetch_assoc()) {
            echo "<div class='listmateri'><a id='list' href='isi_materi.php?id_isimateri=" . $row_materi['id'] . "'>" . $row_materi['judul'] . "</a>";
            echo "<a id='hapus' href='../sistem/delete.php?hapus=hapus_isimateri&id_mapel=$id_mapel&id=" . $row_materi['id'] . "'><i class='fa-solid fa-trash'></i></a></div></br>";
          }
          $sql_soal = "SELECT * FROM soal WHERE id_materi = $id_materi";
          $result_soal = $conn->query($sql_soal);
          echo "<a id='tambah' href='input_soal.php?id_materi=" . $id_materi . "'>tambah soal</a> ";
          echo "<a id='tambah' href='tambahanmateri.php?id_materi=" . $id_materi . "'>tambah isi materi</a></br>";
          echo "<a id='hapus'href='../sistem/delete.php?hapus=hapus_materi&id_mapel=$id_mapel&id=" . $id_materi . "'><i class='fa-solid fa-trash'></i></a></br>";
          echo "</div>";
        }
        echo "</ul>";
        echo "</div>";
      } else {
        echo "<div class='daftar-mapel'>";
        echo "<h2>Daftar materi</h2>";
        echo "<p>Tidak ada mapel yang ditemukan untuk pengguna ini.</p>";
        echo "</div>";
      } ?>
    </div>
  </body>

</html>