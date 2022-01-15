<?php
    if(isset($_POST['save'])){
         $nis            = $_POST['nis'];
         $nama           = $_POST['nama'];
         $jenis_kelamin  = $_POST['jenis_kelamin'];
         $tempat_lahir   = $_POST['tempat_lahir'];
         $tanggal_lahir  = $_POST['tanggal_lahir'];
         $id_jurusan     = $_POST['id_jurusan'];
         $id_kelas       = $_POST['id_kelas'];
         $no_telpon      = $_POST['no_telpon'];
         $alamat         = $_POST['alamat'];

        $query_insert = mysqli_query($koneksi, "INSERT INTO anggota VALUES('','$nis','$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$id_jurusan','$id_kelas','$no_telpon','$alamat')");

        if ($query_insert){
            echo "Data Berhasil Disimpan...";
            header("refresh:0 url=http://localhost/11_PTSGANJIL2021_XIIRPL2_fadhilahalhadiid/admin.php?page=anggota");
        }else{
            echo "Data Gagal Disimpan...";
            header("refresh:0 url=http://localhost/11_PTSGANJIL2021_XIIRPL2_fadhilahalhadiid/admin.php?page=anggota");
        
        }
    }
?>