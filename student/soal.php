<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<!--header-->
<?php
include("header.php");
$id_materi=$_GET['id_materi'];
?>
<!--header-->

<body>
  <link rel="stylesheet" href="../stylingg.css">
  <div style="overflow:auto" class="soal">
    <div class="main">
      <form action="../sistem/input.php" method="post">
      <input type="text" name="tipeform" value="kirim_soal" hidden>
      <input type="text" name="id_materi" value="<?php echo $id_materi;?>" hidden>
      <?php
      $query = "SELECT id, isi_soal, pilihan_a, pilihan_b, pilihan_c, pilihan_d, pilihan_e FROM soal where id_materi=$id_materi";
      $result = $conn->query($query);

      if ($result === false) {
        echo "Error: " . $conn->error;
      } else {
        while ($row = $result->fetch_assoc()) {
          echo "<div>";
          echo "";
          echo "<p>" . $row['isi_soal'] . "</p>";
          echo "<input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['pilihan_a'] . "'>" . $row['pilihan_a'] . "<br>";
          echo "<input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['pilihan_b'] . "'>" . $row['pilihan_b'] . "<br>";
          echo "<input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['pilihan_c'] . "'>" . $row['pilihan_c'] . "<br>";
          echo "<input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['pilihan_d'] . "'>" . $row['pilihan_d'] . "<br>";
          echo "<input type='radio' name='answers[" . $row['id'] . "]' value='" . $row['pilihan_e'] . "'>" . $row['pilihan_e'] . "<br>";
          echo "</div>";
        }
      } ?>
      <input type="submit" value="Kirim Jawaban">
      </form>
    </div>
  </div>

  </body>

</html>