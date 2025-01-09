<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8">
    <!--<title> Login </title>-->
    <link rel="stylesheet" href="../stylingg.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <link rel="stylesheet" href="../stylingg.css">

<!--header-->
<?php
include ("header.php");
?>
<!--header-->
<body>



<div style="overflow:auto" class="tambah_materi">
  <div class="main">
  <div class="news">
    <h2>Register Mata Pelajaran</h2></div>
    <div class="container">
      <form action="../sistem/input.php" method="post">
        <input type="text" name="tipeform" value="input_mapel" hidden>
        <label for="nama_mapel">nama_mapel</label><br>
        <input type="text" name="nama_mapel" required><br>
        <label for="deskripsi">deskripsi</label><br>
        <textarea name="deskripsi" required></textarea><br>
        <input type="submit">
      </form>
    </div>
  </div>

</div>


</body>
</html>

