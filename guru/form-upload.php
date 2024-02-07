<?php
include 'config.php';

$id = '';
$nama_file = '';
$ukuran_file = '';
$tipe_file = '';

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql = "SELECT * FROM gambar WHERE id_gambar='$id';";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($query);
    $id = $result['id_gambar'];
    $nama_file = $result['nama'];
    $ukuran_file = $result['ukuran'];
    $tipe_file = $result['tipe'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-1g bg-body-tertiary">
 <div class="container-fluid">
 <a class="navbar-brand" href="index.php">SMK Negeri 1 Lagos</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup"> 
<div class="navbar-nav">
<a class="nav-link active" aria-current="page" href="index.php">Home</a>
<a class="nav-link" href="form-daftar.php">Pendaftaran</a>
<a class="nav-link" href="data-guru.php">Data Guru</a>
<a class="nav-link" href="data_upload.php">Data Upload</a>
<a class="nav-link" href="login.php">Logout</a>
</div>
</div>
</div>
</nav>
<div class="container mt-4">
<h2>Form Upload File</h2><br>
<form method="post" enctype="multipart/form-data" action="upload.php">
<div class="mb-3">
<label for="foto" class="form-label">Foto: </label>
<input type="hidden" name="id_gambar" value="<?php echo $id; ?>">
<input type="file" class="form-control" name="gambar"/>
</div>
<div class="mb-3 row mt-4">
<div class="col">
   <?php
   if(isset($_GET['edit'])){
   ?>
   <button type="submit" name="save" value="edit" class="btn btn-primary">Simpan Perubahan</button>
   <?php
   }else{
   ?>
   <button type="submit" name="save" value="add" class="btn btn-primary">Daftar</button>
   <?php
   }
   ?>
   <a href="data_upload.php" type="button" class="btn btn-danger">batal</a>
  </div>

</div>
</form>
</div>
</body>
</html>