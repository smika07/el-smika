<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../stylingg.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<!--header-->
<?php
include("header.php");
?>
<!--header-->

<body>
  <div style="overflow:auto" class="mapelinfo">
    <div class="mapel">
      <h3>masukan kode</h3>
      <form action="../sistem/input.php" method="post" >
        <input type="text" value="input_kode" name="tipeform" hidden>
        <input type="number" name="id_mapel" required>
        <input type="submit">
      </form>
    </div>
    <div class="mapel_container">

      <?php
      $id = $_SESSION['id_user'];
      $sql = "SELECT m.id, m.nama_mapel, m.deskripsi FROM mapel m
        JOIN mapel_link ml ON m.id = ml.id_mapel
        WHERE ml.user_id = '$id'";

      $result = $conn->query($sql);

      // Cek apakah ada hasil
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='daftar-mapel' onclick=\"window.location.href='materi.php?id_mapel=" . $row['id'] . "'\">";
          echo "<h3> " . htmlspecialchars($row['nama_mapel']) . "</h3><br>";
          echo "<p> " . htmlspecialchars($row['deskripsi'])."<p>";
          echo "<p> " . htmlspecialchars($row['id'])."<p>";
          echo "<a id=' hapus' href='../sistem/delete.php?hapus=out_mapel&id_mapel=" . $row['id'] . "'><i class='fa-solid fa-trash'></i></a>";
          echo "</div>";
        }
      } else {
        echo "<div class='daftar-mapel'>";
        echo "<h2>Daftar Mapel</h2>";
        echo "<p>Tidak ada mapel yang ditemukan untuk pengguna ini.</p>";
        echo "</div>";
      } ?>
    </div>
  </div>


</body>

</html>