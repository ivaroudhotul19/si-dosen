<?php 
include 'koneksi.php';

if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    $sql = "INSERT INTO tb_dosen VALUES(NULL, '$nama', '$nip', '$email', '$telp')";

    if(empty($nama) || empty($nip) || empty($email) || empty($telp)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'dosen-entry.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo " 
            <script>
                alert('Data Dosen Berhasil Ditambahkan');
                window.location = 'dosen.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'dosen-entry.php';
            </script>
        ";
    }
}elseif(isset($_POST['edit'])) {
    $id     = $_POST['id'];
    $nama   = $_POST['nama'];
    $nip  = $_POST['nip'];
    $email  = $_POST['email'];
    $telp= $_POST['telp'];

    $sql = "UPDATE tb_dosen SET
            nama = '$nama', 
            nip = '$nip', 
            email = '$email', 
            telp = '$telp'
            WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Dosen Berhasil Diubah');
                window.location = 'dosen.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'dosen-edit.php';
            </script>
        ";
    }
}elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM tb_dosen WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Dosen Berhasil Dihapus');
                window.location = 'dosen.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Dosen Gagal Dihapus');
                window.location = 'dosen.php'
            </script>
        ";
    }
}else {
    header('location: dosen.php');
}

?>
