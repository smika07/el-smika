<?php
session_start();
include("koneksi.php");
$id = $_SESSION['id_user'];
$delete = $_GET['hapus'];

switch ($delete) {
    case 'out_mapel':
        $id_mapel = $_GET['id_mapel'];
        $sql = "DELETE FROM absen WHERE id_mapel = '$id_mapel' AND id_user = '$id'";
        if ($conn->query($sql) === TRUE) {
            $sql = "DELETE FROM mapel_link WHERE id_mapel = '$id_mapel' AND user_id = '$id'";
            if ($conn->query($sql) === TRUE) {
                header('location:../student/mapel.php');
            }
        }
        break;
    case 'hapus_soal':
        $id_soal = $_GET['id'];
        $id_materi = $_GET['id_materi'];
        $sql = "DELETE FROM soal WHERE id = '$id_soal'";
        if ($conn->query($sql) === TRUE) {
            header("location:../teacher/input_soal.php?id_materi=$id_materi");
        }
        break;
    case 'hapus_isimateri':
        $id_isimateri = $_GET['id'];
        $id_mapel = $_GET['id_mapel'];
        $sql = "DELETE FROM isi_materi WHERE id = '$id_isimateri'";
        if ($conn->query($sql) === TRUE) {
            header("location:../teacher/materi.php?id_mapel=$id_mapel");
        }
        break;
    case 'hapus_materi':
        $id_materi = $_GET['id'];
        $id_mapel = $_GET['id_mapel'];

        // Hapus dari tabel soal
        $conn->query("DELETE FROM soal WHERE id_materi = '$id_materi'");
        
        // Hapus dari tabel isi_materi
        $conn->query("DELETE FROM isi_materi WHERE id_materi = '$id_materi'");
        // Hapus dari tabel materi
        $conn->query("DELETE FROM materi WHERE id = '$id_materi'");
        
        // Redirect setelah penghapusan
        header("location:../teacher/materi.php?id_mapel=$id_mapel");
        break;
        case 'hapus_mapel':
            $id_mapel = $_GET['id_mapel'];
            $sql = "SELECT * FROM materi WHERE id_mapel = '$id_mapel'";
            $result = ($conn->query($sql)->fetch_assoc());
            $id_materi = $result['id'];
            $conn->query("DELETE FROM materi WHERE id = '$id_materi'");
            $conn->query("DELETE FROM soal WHERE id_materi = '$id_materi'");
            $conn->query("DELETE FROM isi_materi WHERE id_materi = '$id_materi'");
            $conn->query("DELETE FROM mapel_link WHERE id_mapel = '$id_mapel'");
            $conn->query("DELETE FROM mapel WHERE id = '$id_mapel'");
            
            header("location:../teacher/mapel.php");
        break;
    default:
        echo "gagal code";
        break;
}