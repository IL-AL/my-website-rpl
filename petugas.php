<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORM PETUGAS</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
    <!-- proses input data -->
    <?php
    if (isset($_POST['save'])) {
        $nama = $_POST['nama'];
        $jabatan = $_POST['jabatan'];
        $no_telpon = $_POST['no_telpon'];
        $alamat = $_POST['alamat'];

        $query_insert = mysqli_query($koneksi, "INSERT INTO petugas VALUES('','$nama','$jabatan','$no_telpon','$alamat')");

        if ($query_insert) {
            echo "data berhasil disimpan";
            header("refresh:1, URLhttp://localhost/11_PTSGANJIL2021_XIIRPL2_fadhilahalhadiid/admin.php?page=petugas.php");
        }else {
            echo "data gagal disimpan";
        }
     }
     elseif (isset($_GET['hapus'])) {
         $id =$_GET['id'];
         $query_delete = mysqli_query($koneksi,"DELETE FROM anggota WHERE id_petugas='$id'");
            if ($query_delete) {
                echo "data berhasil dihapus";
                header("refresh:1,URLhttp://localhost/11_PTSGANJIL2021_XIIRPL2_fadhilahalhadiid/admin.php?page=petugas.php");
            }
     }
    ?>
    <!-- end proses input data -->

    <!-- proses hapus data -->
     <?php
      
     ?>
    <!-- end proses hapus data -->
    <div class="container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
        </button>
        <!-- end button trigger modal -->
        <!-- proses tabel -->
<table class="table table-dark table-striped">
  <tr>
    <td>NO</td>
    <td>Nama</td>
    <td>Jabatan</td>
    <td>No Telpon</td>
    <td>Alamat</td>
    <td>keterangan</td>
  </tr>
  <?php
    $no=1;
    $query = mysqli_query($koneksi,"SELECT * FROM petugas");
        foreach ($query as $row) {
            ?>
        <tr>
            <td><?php $no ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['jabatan'] ?></td>
            <td><?php echo $row['no_telpon'] ?></td>
            <td><?php echo $row['alamat'] ?></td>
            <td>
            <a href="?page=petugas&hapus&id="<?php echo $row['id_petugas'];?>>
            <button type="button" class="btn btn-primary">HAPUS</button></a></td>
        </tr>
    <?php
    $no++;
        }
    ?>
</table>
<!-- end proses tabel -->
</div>

<!-- modal input -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INPUT DATA BARU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group mb-3">
                <input type="text" id="nama" class="input-group" name="nama" placeholder="NAMA" required>
            </div>
            <div class="form-group mb-3">
                <input type="text" id="jabatan" class="input-group" name="jabatan" placeholder="JABATAN" required>
            </div>
            <div class="form-group mb-3">
                <input type="text" id="no_telpon" class="input-group" name="no_telpon" placeholder="NO TELPON" required>
            </div>
            <div class="form-group mb-3">
                <input type="text" id="alamat" class="input-group" name="alamat" placeholder="ALAMAT" required>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">BATAL</button>
        <button type="submit" class="btn btn-primary" name="save">SIMPAN</button>
      </div>
    </div>
  </div>
</div>
<br>
<br>

<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
</body>
</html>
