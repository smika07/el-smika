<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<!--header-->
<?php
include("header.php");
$id_mapel=$_GET['id_mapel'];
$sql="SELECT * FROM absen JOIN Users on users.id =absen.id_user where id_mapel = $id_mapel";
$result = $conn->query($sql);
?>
<!--header-->

<body>
  <div class="absen">
  <link rel="stylesheet" href="../stylingg.css">
  <div class="menu">
    <h1>absen</h1>
    <form action="../sistem/input.php" method="post">
      <input type="text" name="tipeform" value="absen" hidden>
      <table border="1">
        <tr>
          <th>NAMA SISWA</th>
          <th>HADIR</th>
        <th>ALPHA</th>
        <th>IZIN</th>
        <th>SAKIT</th>
      </tr>
      <?php
       while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td><input type='radio' name='status[" . $row['username'] . "]' value='hadir' " . ($row['status'] == 'hadir' ? 'checked' : '') . "></td>";
        echo "<td><input type='radio' name='status[" . $row['username'] . "]' value='tidak hadir' " . ($row['status'] == 'tidak hadir' ? 'checked' : '') . "></td>";
        echo "<td><input type='radio' name='status[" . $row['username'] . "]' value='izin' " . ($row['status'] == 'izin' ? 'checked' : '') . "></td>";
        echo "<td><input type='radio' name='status[" . $row['username'] . "]' value='sakit' " . ($row['status'] == 'sakit' ? 'checked' : '') . "></td>";
        echo "</tr>";
          }
      ?>
      <input type="text" name="id_mapel" value="<?php echo $id_mapel;?>" hidden>
      <button type="submit">update</button>
    </table>
        </form>
  </div>
  </div>
</body>

</html>