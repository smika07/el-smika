<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
include("header.php");
?>


<body>
  <link rel="stylesheet" href="../stylingg.css">
  <div style="overflow:auto" class="materi">
    <div class="menu">
    </div>

    <div class="main">
      <?php
      $id_mapel = $_GET['id_mapel'];
      $sql = "SELECT * FROM materi where id_mapel=$id_mapel";

      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        echo "<div class='daftar-mapel'>";
        echo "<h2>Daftar materi</h2>";
        while ($row = $result->fetch_assoc()) {
          $id_materi = $row['id'];
          $format = date('d.m.20y', strtotime($row['tanggal_buat']));
          echo "<p>" . htmlspecialchars($row['judul']) . "</p>";
          echo "<p>" . htmlspecialchars($format) . "</p>";
          $sql_isimateri = "SELECT * FROM isi_materi WHERE id_materi = $id_materi";
          $result_materi = $conn->query($sql_isimateri);
          while ($row_materi = $result_materi->fetch_assoc()) {
            echo "<div class='listmateri'><a id='list' href='isi_materi.php?id_isimateri=" . $row_materi['id'] . "'>" . $row_materi['judul'] . "</a></div><br>";
          }
          $sql_soal = "SELECT * FROM soal WHERE id_materi = $id_materi";
          $result_soal = $conn->query($sql_soal)->fetch_assoc();
          if(isset($result_soal)){
          echo "<div class='listmateri'><a id='list' href='soal.php?id_materi=" . $id_materi . "'>soal</a></div></br>";}

        }
        echo "</div>";
      } else {
        echo "<div class='daftar-mapel'>";
        echo "<h2>Daftar materi</h2>";
        echo "<p>Tidak ada mapel yang ditemukan untuk pengguna ini.</p>";
        echo "</div>";
      } ?>
    </div>

  </div>

  </body>

</html>