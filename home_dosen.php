<?php

session_start();
ob_start();

if (!isset($_SESSION['dosen'])) {
    header("location:login.php");
}

$nidn = $_SESSION['dosen'];
$conn = new mysqli("localhost", "root", "", "lemanev02");
// $sql = $conn->query("SELECT id, name from tb_user where id = '$nidn'");
$sql = $conn->query("SELECT id_mk, nama_mk from tb_matakuliah where nidn = '$nidn'");
$sql1 = $conn->query("SELECT nidn, nama as nama_dosen from tb_dosen where nidn = '$nidn'");
$id = mysqli_fetch_assoc($sql1);

?>

<div class="row">
    <div class="col-md-12">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Dosen
                </div>
                <!-- Bio Dosen -->
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label>NIDN</label>
                            <input class="form-control" name="nidn" value="<?= $id['nidn'] ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama_dosen" value="<?= $id['nama_dosen'] ?>" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-group">
            <div class="panel panel-default">

                <div class="panel-heading">
                    Matakuliah yang diampu oleh
                    <?= $id['nama_dosen'] ?>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataMakul">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($makul = $sql->fetch_assoc()) {
                                ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $makul['id_mk']; ?>
                                </td>
                                <td>
                                    <?= $makul['nama_mk']; ?>
                                </td>
                                <td>
                                    <a href="?page=nilai&aksi=nilai_new&nidn=<?= $id['nidn'] ?>&id_mk=<?= $makul['id_mk']; ?>" class="btn btn-info">Lihat Hasil</a>
                                </td>
                                <?php

                            }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div> 