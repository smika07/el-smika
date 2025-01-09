<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Materi</title>
    <link rel="stylesheet" href="../stylingg.css"> 
</head>
<body>
    <?php include("header.php"); ?> 

    <div style="overflow:auto" class="isi_materi">
        <div class="main">
            <h2>materi</h2>
            <hr>
            <?php
            include("../sistem/koneksi.php"); 
            $id_isi = $_GET['id_isimateri'];
            $sql = "SELECT * FROM file f JOIN isi_materi imt on imt.file_id = f.id WHERE imt.id = $id_isi AND path LIKE '%.pdf'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<h3>".$row['judul']."</h3>";
                    echo "<p>".$row['deskripsi']."</p>";
                    echo "<li><a class='file' href='../file/" . htmlspecialchars($row['path']) . "' target='_blank'>" . htmlspecialchars($row['name']) . "</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No materials available.</p>";
            }
            ?>
        </div>

    </div>

    </body>
</html>
