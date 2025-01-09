<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<!--header-->
<?php
include("header.php");
if (isset($_GET['chat_id'])) {
$chat_id=$_GET['chat_id'];}
?>
<!--header-->

<body style="font-family:Verdana;color:#aaaaaa;">
  <link rel="stylesheet" href="stylingg.css">
  <div class="chatmenu" style="overflow:auto">
    <div class="menu">
        <form action="sistem/input.php" method="post" class="chatgrup">
          <input type="text" name="tipeform" value="create_chat" hidden>
          <label for="nama">BUAT GRUP</label>
          <input type="text" name="nama">
          <input type="text" name="kreator" value="<?php echo $_SESSION['id_user'];?>" hidden>
          <button type="submit">+</button>
        </form>
        <form action="sistem/input.php" method="post" class="chatgrup">
          <input type="text" name="tipeform" value="join_chat" hidden>
          <label for="kode">JOIN GRUP</label>
          <input type="text" placeholder="masukkan kode grup" name="user" value="<?php echo $_SESSION['id_user'];?>" hidden>
            <input type="number" name="kode">
            <button type="submit">+</button>
        </form>
        <?php
      $id = $_SESSION['id_user'];
      $sql="SELECT * FROM chatbox c JOIN chat_link cl ON c.id = cl.id_chatbox JOIN users u ON cl.user_id = u.id WHERE cl.user_id = '$id'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $format= date('d.m.20y',strtotime($row['date']));
          echo "<div class='chatbox'>";
          echo '<p>'. $row['name'] .'</p>';
          echo '<p>'. $format .'</p>';
          echo '<p>KODE:'. $row['id_chatbox'].'</p>';
          echo "<a href='chatbox.php?chat_id=".$row['id_chatbox']."'></a>";
          echo "</div>";
        }
        }
      ?>
    </div>
    <div class="main">
    <?php 
    if (isset($_GET['chat_id'])) {
        $sql = "SELECT * FROM chat JOIN users on chat.user_id = users.id WHERE chatbox_id='$chat_id' ORDER BY waktu DESC";
        $result = $conn->query($sql);
        if($result -> num_rows > 0){
        while($row = $result->fetch_assoc()) {
            echo '<div class="bublechat">';
            echo "<p>".$row['username']."</p>";
            echo "<p>".$row['text']."</p>";
            echo "<em>".$row['waktu']."</em>";
            echo "</div>";
          }}else{
            echo "tidak ada pesan";
            }
          }else{
            echo"pilih grup untu menampilkan chat";
          }
        ?>
        <form method="post" action="sistem/input.php" id="pesan">
            <input type="text" name="pesan">
            <input type="text" name="id_chat" value="<?php echo $chat_id; ?>"hidden>
            <input type="text" name="tipeform" value="kirim_pesan" hidden>
            <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
        </form>
    </div>
  </div>

  </body>

</html>