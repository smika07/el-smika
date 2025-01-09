<?php
session_start();
include("koneksi.php");
$id = $_SESSION['id_user'];
$form = $_POST['tipeform'];

switch ($form) {
    case 'input_mapel':
        $mapel = $_POST['nama_mapel'];
        $desk = $_POST['deskripsi'];
        $id_mapel = rand(100000, 999999);

        $sql = "INSERT INTO mapel(id,kreator_id,nama_mapel,deskripsi) VALUES('$id_mapel','$id','$mapel','$desk')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan!";
            $sql = "INSERT INTO mapel_link(id_mapel,user_id) VALUES('$id_mapel','$id')";
            if ($conn->query($sql) === TRUE) {
            header('location:../teacher/mapel.php');}
        } else {
            echo "Data gagal disimpan!";
            header('location:../teacher/input_mapel.php');
        }
        break;
    case 'input_materi':
        $materi = $_POST['nama_materi'];
        $mapel = $_POST['id_mapel'];
        $tanggal = date("y-m-d");
        $id_materi = rand(100000, 999999);

        $sql = "INSERT INTO materi(id,id_mapel,judul,tanggal_buat) VALUES('$id_materi','$mapel','$materi','$tanggal')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan!";
            header("location:../teacher/materi.php?id_mapel=".$mapel."");
        } else {
            echo "Data gagal disimpan!";
            header("location:../teacher/materi.php?id_mapel=".$mapel."");
        }
        break;


        case 'input_kode':
            $kode = $_POST['id_mapel'];
            $sql = "SELECT * FROM mapel_link WHERE user_id = '$id' AND id_mapel = '$kode'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "Data sudah ada!";
            } else {
                $sql = "INSERT INTO mapel_link(user_id,id_mapel) VALUES ('$id','$kode')";
                if ($conn->query($sql) === TRUE) {
                    // Insert ke absen
                    $sql_absen = "INSERT INTO absen(id_user, id_mapel, status) VALUES ('$id', '$kode', 'tidak hadir')";
                    $conn->query($sql_absen);
                    echo "Data berhasil disimpan!";
                    header('location:../student/mapel.php');
                } else {
                    header('location:../student/mapel.php');
                }
            }
            break;
    case 'create_chat':
        $nama = $_POST['nama'];
        $kreator = $_POST['kreator'];
        $tanggal = date("y-m-d");
        $id_chat = rand(100000, 999999);
        $sql = "INSERT INTO chatbox (id,kreator_id,name, date) VALUES ('$id_chat','$kreator','$nama','$tanggal')";
        if ($conn->query($sql) === TRUE) {
            $newsql = "INSERT INTO chat_link(user_id,id_chatbox) VALUES('$kreator','$id_chat')";
            if ($conn->query($newsql) === TRUE) {
                echo "Data berhasil disimpan!";
                header('location:../chatbox.php');
            } else {
                var_dump($newsql);
            }
        } else {
            var_dump($sql);
            echo "Data gagal disimpan!";
        }
        break;
    case 'join_chat':
        $id_chat = $_POST['kode'];
        $user = $_POST['user'];
        $sql = "INSERT INTO chat_link(user_id,id_chatbox) VALUES('$user','$id_chat')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan!";
            header('location:../chatbox.php');
        } else {
            echo "Data gagal disimpan!";
        }
        break;
    case 'kirim_pesan':
        $chat_id = $_POST['id_chat'];
        $id_user = $_SESSION['id_user'];
        $pesan = $_POST['pesan'];
        $tanggal = date('y-m-d h:i:s');

        $sql = "INSERT INTO chat (text,chatbox_id,user_id,waktu) VALUES('$pesan','$chat_id','$id_user','$tanggal')";
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan!";
            header('location:../chatbox.php?chat_id=' . $chat_id . '');
        } else {
            echo "error";
            header('location:../chatbox.php?chat_id=' . $chat_id . '');
        }
        break;
    case 'tambah_soal':
        $id_materi = $_POST['id_materi'];
        $isi_soal = $_POST['soal'];
        $poin = $_POST['poin'];
        $jawaban = [
            1 => $_POST['jawaban1'],
            2 => $_POST['jawaban2'],
            3 => $_POST['jawaban3'],
            4 => $_POST['jawaban4'],
            5 => $_POST['jawaban5']
        ];
        $benar = $_POST['benar']; // Nilai radio button (1, 2, 3, 4, atau 5)

        $jawaban_benar = $jawaban[$benar];

        $sql = "INSERT INTO soal (id_materi, isi_soal, jawaban, poin, pilihan_a, pilihan_b, pilihan_c, pilihan_d, pilihan_e) 
            VALUES ('$id_materi', '$isi_soal', '$jawaban_benar', '$poin', '$jawaban[1]', '$jawaban[2]', '$jawaban[3]', '$jawaban[4]', '$jawaban[5]')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan!";
            header('location:../teacher/input_soal.php?id_materi=' . $id_materi);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            header('location:../teacher/input_soal.php?id_materi=' . $id_materi);
        }
        break;
    case 'kirim_soal':
        $total_score = 0;

        $answers = $_POST['answers'];

        foreach ($answers as $soal_id => $user_answer) {
            $query = "SELECT jawaban, poin FROM soal WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $soal_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                if ($row['jawaban'] === $user_answer) {
                    $total_score += $row['poin'];
                }
            }
        }

        $id_materi = $_POST['id_materi']; 
        $tanggal = date('y-m-d h:i:s');

        $sql = "INSERT INTO nilai (id_siswa, id_soal, poin, tanggal) VALUES('$id','$id_materi','$total_score','$tanggal')";
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan!";
            header('location:../student/nilai.php?id_siswa=' . $id . '');
        } else {
            var_dump($sql);
        }
        break;
    case 'tambah_isimateri':
        $kategori=$_POST['kategori'];
        $id_file=rand(0000,9999);
        $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $upload_dir = "../file/";
    $file_path = $upload_dir . uniqid() . "_" . basename($file_name);
    if (move_uploaded_file($file_tmp, $file_path)) {
        $sql = "INSERT INTO `file` (`id`, `name`, `size`, `path`, `kategori`) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isiss", $id_file, $file_name, $file_size, $file_path, $kategori);

        if ($stmt->execute()) {
            $id_materi=$_POST['id_materi'];
            $nama_materi=$_POST['nama_materi'];
            $deskripsi=$_POST['deskripsi'];
            $sqlm="INSERT INTO isi_materi (id_materi,file_id,judul,deskripsi) VALUES ($id_materi,'$id_file','$nama_materi','$deskripsi')";
        if ($conn->query($sqlm) === TRUE) {
            header('location:../teacher/mapel.php');
        }else{
            echo"materi tidak masuk";
            var_dump($sqlm);
        }
        } else{
            echo"tidak masuk filenya";
        }
    }
        break;
    case 'absen':
        $id_mapel = $_POST['id_mapel'];
        $tipeform = $_POST['tipeform'];
        $status = $_POST['status'];
        
        // Proses data absen
        foreach ($status as $username => $stat) {
            // Ambil id_user berdasarkan username
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
        
            if ($user) {
                // Update status absen
                $sql = "UPDATE absen SET status = ? WHERE id_user = ? AND id_mapel = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sii", $stat, $user['id'], $id_mapel);
                $stmt->execute();
            }
        }
        header("Location:../teacher/absen.php?id_mapel=$id_mapel");
                break;
    default:
        echo "gagal code";
        break;
}

?>