<?php
session_start();
include("../sistem/koneksi.php");
if (!isset($_SESSION['id_user'])) {
  header('Location: ../form.php');
  exit();}
  if($_SESSION['role'] === 'teacher'){
    header('Location: ../index.php');
exit();}
$id= $_SESSION['id_user'];
$sql = "SELECT * FROM users WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows> 0) {
    $users = $result->fetch_assoc();
}
if (isset($_GET['logout'])){
  session_destroy();
  header('Location:../form.php');
}
?>
<div class="navbar">
      <a href="../index.php">E-LEARNING SMK IBU KARTINI</a>
      <div id="google_translate_element"></div>
      <div class="acount" style="display:flex;">
        <h3><?php echo $users['username'];?></h3>
        <img src="../file/pp.png" style="border-radius:50%;" height="60px">
      </div>
    </div>
    
    <div class="nav-item">        <a href="../index.php"><button class="button button1">Beranda</button></a>
        <a href="mapel.php"><button class="button button2">Mapel</button></a>
        <a href="nilai.php"><button class="button button3">nilai</button></a>
        <a href="../chatbox.php"><button class="button button4">chat</button></a>
        <a href="?logout="><button class="button button4">logout</button></a>
    </div>
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
    }
    </script>
    
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<link rel="stylesheet" href="stylingg.css">
