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
                        <input type="text" name="tnim" id="tnim" class="form-control" placeholder="Inputkan Nim disini!">
                    </div>
                    <div class="form-group">
                        <label for="tnama">Nama</label>
                        <input type="text" name="tnama" id="tnama" class="form-control" placeholder="Inputkan Nama disini!">
                    </div>
                    <div class="form-group">
                        <label for="talamat">Alamat</label>
                        <textarea type="text" name="talamat" id="talamat" class="form-control" placeholder="Inputkan Alamat disini!"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tprodi">Program Studi</label>
                        <select name="tprodi" id="tprodi" class="form-control">
                            <option></option>
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
        <div class="card mt-4">
            <div class="card-header bg-success text-white">
                Data Mahasiswa
            </div>
            <div class="card-body mt-2">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Program Studi</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Abdulloh Alfarizki</td>
                        <td>Jl. Manjang, Kota Bandung</td>
                        <td>S1-Teknik Informatika</td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- Awal Card Tabel -->
    </div>



    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>