<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<!--header-->
<?php
include("header.php");

?>
<!--header-->

<body >
  <div class="nilai">
  <link rel="stylesheet" href="../stylingg.css">
  <div class="menu">
    <?php
    $sql_mapel = "SELECT *,m.id AS id_mapel FROM mapel m JOIN mapel_link ml ON ml.id_mapel = m.id WHERE ml.user_id=$id";
    $result_mapel = $conn->query($sql_mapel);
    if ($result_mapel->num_rows > 0) {
      while ($row_m = $result_mapel->fetch_assoc()) {
        $id_mapel = $row_m['id_mapel'];
        echo "<div class='menu_box'>";
        echo "<h3>" . $row_m['nama_mapel'] . "</h3>";
        $sql_materi = "SELECT * FROM materi WHERE id_mapel = $id_mapel";
        $result_materi = $conn->query($sql_materi);
        
        while ($row_mt = $result_materi->fetch_assoc()) {
          echo "<div class='menu_item'>";
          echo "<a href='?id_materi=".$row_mt['id']."'>".$row_mt['judul']."</a>";
          echo "</div>";        
        }
        echo "</div>";
      }
    }
    ?>
  </div>
  <div class="main">
    <h1>nilai</h1>
    <table>
      <?php
      if(isset($_GET['id_materi'])){
        $id_materi= $_GET['id_materi'];
      
      $sql = "SELECT * FROM nilai n
    JOIN materi mt ON mt.id = n.id_soal
    JOIN users u ON u.id =n.id_siswa WHERE n.id_soal=$id_materi";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        echo "<tr>";
        echo "<th>nama siswa</th>";
        echo "<th>nilai</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['username'] . "</td>";
          echo "<td>" . $row['poin'] . "</td>";
          echo "</tr>";
        }
      }else{
        echo"<p>pilih materi yang dituju</p>";
      }}
      ?>
    </table>
  </div>
  </div>
</body>

</html>