<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../stylingg.css">
</head>
<!--header-->
<?php
include("header.php");

$sql = "SELECT * FROM mapel";
$result = $conn->query($sql);
?>
<!--header-->

<body>
<div style="overflow:auto" class="mapelinfo">
    <div class="mapel">
        <h2>Daftar Mapel</h2>
        <a href="input_mapel.php"><button>tambahkan mapel</button></a>
    </div>
    <div class="mapel_container">
      <?php
      $sql="SELECT * FROM mapel WHERE kreator_id= '$_SESSION[id_user]'";
      $result = $conn->query($sql);

      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
          ?>
          <div class="daftar-mapel" onclick="window.location.href='materi.php?id_mapel=<?php echo $row['id'];?>'">
            <h3><?php echo $row['nama_mapel'];?></h3>
            <p><?php echo $row['deskripsi'];?></p>
            <p><?php echo $row['id'];?></p>
            <a href="absen.php?id_mapel=<?php echo $row['id'];?>">absen</a>
            <a id="hapus" href='../sistem/delete.php?hapus=hapus_mapel&id_mapel=<?php echo $row['id'];?>'><i class='fa-solid fa-trash'></i></a></br>

          </div>
          <?php
        }
      }
      ?>
    </div>
</div>


</body>
</html>
