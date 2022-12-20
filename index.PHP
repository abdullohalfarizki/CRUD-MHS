<?php
//koeksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'belajar';

$koneksi = mysqli_connect($host, $user, $pass, $db) or die(mysqli_error($koneksi));

// tambah data ke database
//jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

    //pengujian apakah data akan diedit atau di simpan baru
    if ($_GET['halaman'] == "edit") {
        //data akan di edit
        $edit = mysqli_query($koneksi, "UPDATE mahasiswa SET 
                                            nim = '$_POST[tnim]',
                                            nama = '$_POST[tnama]',
                                            alamat = '$_POST[talamat]',
                                            prodi = '$_POST[tprodi]'
                                        WHERE id_mhs = '$_GET[id]'
                                        ");
        //jika edit sukses/data berhasil ditambahkan
        if ($edit) {
            echo "<script>
                    alert('Edit Data Sukses!');
                    document.location='index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Edit Data Gagal!!');
                    document.location='index.php';
                </script>";
        }
    } else {
        //data akan disimpan baru
        $simpan = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, alamat, prodi)
                                     VALUES ('$_POST[tnim]',
                                            '$_POST[tnama]',
                                            '$_POST[talamat]',
                                            '$_POST[tprodi]')
                                     ");
        //jika simpan sukses/data berhasil ditambahkan
        if ($simpan) {
            echo "<script>
                    alert('Data berhasil ditambahkan');
                    document.location='index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan!!');
                    document.location='index.php';
                </script>";
        }
    }
}

//pengujian jika tombol edit/hapus diklik
if (isset($_GET['halaman'])) {
    //pengujian jika edit data
    if ($_GET['halaman'] == "edit") {
        //tampilkan data yang akan diedit
        $tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mhs = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if ($data) {
            //jika data ditemukan, maka data ditampung dulu ke dalam variabel
            $vnim = $data['nim'];
            $vnama = $data['nama'];
            $valamat = $data['alamat'];
            $vprodi = $data['prodi'];
        }
    } else if ($_GET['halaman'] == "hapus") {
        //perdiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mhs = '$_GET[id]' ");
        echo "<script>
                alert('Data Berhasil di Hapus!');
                document.location='index.php';
            </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD MHS PHP & MySQL + Bootstrap 4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-3">CRUD MHS PHP & MySQL + Bootstrap 4</h2>
        <h3 class="text-center">DzulAbdul</h3>

        <!-- Awal Card Header -->
        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                Form Input Data Mahasiswa
            </div>
            <div class="card-body mt-2">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="tnim">Nim</label>
                        <input type="text" name="tnim" value="<?= @$vnim; ?>" id="tnim" class="form-control" placeholder="Inputkan Nim disini!" required>
                    </div>
                    <div class="form-group">
                        <label for="tnama">Nama</label>
                        <input type="text" name="tnama" value="<?= @$vnama; ?>" id="tnama" class="form-control" placeholder="Inputkan Nama disini!" required>
                    </div>
                    <div class="form-group">
                        <label for="talamat">Alamat</label>
                        <textarea type="text" name="talamat" id="talamat" class="form-control" placeholder="Inputkan Alamat disini!" required><?= @$valamat; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tprodi">Program Studi</label>
                        <select name="tprodi" id="tprodi" class="form-control" required>
                            <option value="<?= @$vprodi; ?>"><?= @$vprodi; ?></option>
                            <option value="D3-Sistem Informasi">D3-Sistem Informasi</option>
                            <option value="D3-Teknik Informatika">D3-Teknik Informatika</option>
                            <option value="D3-Perbankan">D3-Perbankan</option>
                            <option value="S1-Teknik Informatika">S1-Teknik Informatika</option>
                            <option value="S1-Teknik Industri">S1-Teknik Industri</option>
                            <option value="S1-Teknik Sipil">S1-Teknik Sipil</option>
                            <option value="S1-Teknik Mesin">S1-Teknik Mesin</option>
                            <option value="S1-Teknik Elektro">S1-Teknik Elektro</option>
                            <option value="S1-Manajemen">S1-Manajemen</option>
                            <option value="S1-Administrasi Bisnis">S1-Administrasi Bisnis</option>
                            <option value="S1-Ilmu Komunikasi">S1-Ilmu Komunikasi</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                    <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
                </form>
            </div>
        </div>
        <!-- Awal Card Header -->

        <!-- Awal Card Tabel -->
        <div class="card mt-4 mb-5">
            <div class="card-header bg-success text-white">
                Data Mahasiswa
            </div>
            <div class="card-body mt-2">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Program Studi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id_mhs DESC");
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nim']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['prodi']; ?></td>
                            <td class="text-center">
                                <a href="index.php?halaman=edit&id=<?= $data['id_mhs'] ?>" class="btn btn-warning btn-sm" name="bedit">Edit</a>
                                <a href="index.php?halaman=hapus&id=<?= $data['id_mhs'] ?>" onclick="return confirm('Apakah yakin Anda akan menghapus data ini?')" class="btn btn-danger btn-sm" name="bhapus">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; //penutup perulangan while  
                    ?>
                </table>
            </div>
        </div>
        <!-- Awal Card Tabel -->
    </div>



    <script type="text/javascript" src="js/bootstrap.min.js"></script>


    <footer class="text-center mb-3">
        &copy; 2022 - <script>
            document.write(new Date().getFullYear())
        </script>
        - Abdulloh
    </footer>
</body>

</html>