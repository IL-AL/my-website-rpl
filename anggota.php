<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
    <center><h4 class="mt-4 mb-3">Data Anggota</h4></center>
    <div class="container">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
</button>
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jurusan</th>
            <th>Kelas</th>
            <th>Nomor_Telepon</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    <?php
    $no =1;
    $query =mysqli_query($koneksi ,"SELECT * FROM anggota");
    foreach($query as $row){
    ?>
    
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row ['nis'] ?></td>
            <td><?php echo $row ['nama'] ?></td>
            <td><?php echo $row ['jenis_kelamin'] ?></td>
            <td><?php echo $row ['tempat_lahir'] ?></td>
            <td><?php echo $row ['tanggal_lahir'] ?></td>
            <td><?php echo $row ['id_jurusan'] ?></td>
            <td><?php echo $row ['id_kelas'] ?></td>
            <td><?php echo $row ['nomor_telpon'] ?></td>
            <td><?php echo $row ['alamat'] ?></td>
            <td valign="middle">
            <a href="?page=anggota-delete&hapus&id=<?php echo $row['id_anggota'];?>">
                <button class="btn btn-danger">Hapus</button>
            </td>
        </tr>
    <?php
    $no++;       
    }
    ?>
    </table>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="?page=anggota-insert" method="post">

        <div class="form-group mb-2">
        <input type="text" class="form-control" name="nis" placeholder="Isi Nis" required="">
        </div>
        <div class="form-group mb-2">
        <input type="text" class="form-control" name="nama" placeholder="Isi Nama" required="">
        </div>
        <div class="form-group mb-2">
        <select class="from-control" name="jenis_kelamin">
            <option value="">--Pilih Jenis Kelamin--</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="form-group mb-2">
        <input type="text" class="form-control" name="tempat_lahir" placeholder="isi tempat lahir" required="">
        </div>
        <div class="form-group mb-2">
        <input type="date" class="form-control" name="tanggal_lahir" placeholder="Pilih Tanggal Lahir" required="">
        </div>
        <div class="form-group mb-2">
        <select class="from-control" name="id_jurusan">
            <option value="">--Pilih Jurusan--</option>
           <?php
           $query_jurusan = mysqli_query($koneksi,"SELECT * FROM jurusan");
            foreach ($query_jurusan as $jurusan) {
            ?>
                <option value="<?php echo $jurusan['id_jurusan']?>"><?php echo $jurusan['nama_jurusan']?></option>
            <?php
            }
           ?>  
            </select>
        </div>
        <div class="form-group mb-2">
        <select class="from-control" name="id_kelas">
            <option value="">--Pilih Kelas--</option>
            <?php
           $query_kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
            foreach ($query_kelas as $kelas) {
            ?>
                <option value="<?php echo $kelas['id_kelas']?>"><?php echo $kelas['nama_kelas']?></option>
            <?php
            }
           ?>
            </select>
        </div>
        <div class="form-group mb-2">
        <input type="text" class="form-control" name="no_telpon" placeholder="Isi No Tlp" required="">
        </div>
        <div class="form-group mb-2">
        <input type="text" class="form-control" name="alamat" placeholder="Isi Alamat" required="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-warning">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<br>
<br>
</body>
</html>