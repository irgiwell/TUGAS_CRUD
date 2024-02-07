<?php
// Load file koneksi.php
include "config.php";
if(isset($_POST['save'])){
// Ambil Data yang Dikirim dari Form
if($_POST['save']=='add') {
$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type']; 
$tmp_file = $_FILES['gambar']['tmp_name'];
// Set path folder tempat menyimpan gambarnya
$path = "image/".$nama_file;
// Proses upload
if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
// Jika gambar berhasil diupload, Lakukan :
// Proses simpan ke Database
$query = "INSERT INTO gambar (nama, ukuran, tipe) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."')"; 
$sql = mysqli_query($db, $query); // Eksekusi/ Jalankan query dari variabel $query
if($sql){ // Cek jika proses simpan ke database sukses atau tidak
// Jika Sukses, Lakukan :
header("location: data_upload.php"); // Redirectke halaman index.php
}else{
// Jika Gagal, Lakukan :
echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
echo "<br><a href='form-upload.php'>Kembali Ke Form</a>";
}
}else{
// Jika gambar gagal diupload, Lakukan:
echo "Maaf, Gambar gagal untuk diupload.";
echo "<br><a href='form-upload.php'>Kembali Ke Form</a>";
}
}else if ($_POST['save']=='edit'){
    $id = $_POST['id_gambar'];

    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    $path = "image/" . $nama_file;
      
    $sql = "UPDATE gambar SET nama='" .$nama_file . "', ukuran='" . $ukuran_file . "', tipe='" . $tipe_file . "' WHERE id_gambar='$id'";
    $query = mysqli_query($db, $sql);

    if ($query){
      header('location: data_upload.php?status=sukses');
    }else{
      header('location: data_upload.php?status=gagal');
    }

  }

}
if(isset($_GET['hapus'])){


    $id_gambar = $_GET['hapus'];


    $sql="DELETE FROM gambar WHERE  id_gambar='$id_gambar';";
    $query= mysqli_query($db,$sql);


    if( $query ){
        header('location:data_upload.php?status=sukses');
    }else{
        header('location:data_upload.php?status=gagal');
    }
  }
?>