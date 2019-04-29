<?php
session_start();
ob_start();
if ($_SESSION['admin']) {

$dataMhs = mysqli_query($conn, "select nim, nama as nama_mhs from tb_mahasiswa");
$dataMK = mysqli_query($conn, 
                        "select tb_matakuliah.id_mk, tb_matakuliah.nama_mk, tb_matakuliah.nidn, tb_dosen.nama as nama_dosen 
                        from tb_matakuliah, tb_dosen
                        where tb_dosen.nidn = tb_matakuliah.nidn")

?>


<div class="panel panel-default">
    <div class="panel-heading">
        Tambah KRS Mahasiswa
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h3>Formulir Data KRS Mahasiwa</h3>
                <form method="POST">

                    <?php
                    $rowCount = $dataMhs->num_rows;
                    ?>

                    <div class="form-group">
                        <label>Mahasiswa</label>
                        <select class="form-control" name="nim">
                        <option>- Pilih -</option>

                        <?php
                        if ($rowCount > 0) {
                            while ($row = $dataMhs->fetch_assoc()) {
                        echo '<option value="' . $row['nim'] . '">'.$row['nim'].' - '.$row['nama_mhs'].'</option>';
                        }
                    } else {
                        echo '<option value="">Tidak Tersedia</option>';
                    }

                    ?>
                        </select>

                    </div>

                    <?php
                    $rowCount = $dataMK->num_rows;
                    ?>

                    <div class="form-group">
                        <label>Matakuliah dan Dosen Pengampu</label>
                        <select class="form-control" name="id_mk">
                        <option>- Pilih -</option>

                        <?php
                        if ($rowCount > 0) {
                            while ($row = $dataMK->fetch_assoc()) {
                                echo '<option value="' . $row['id_mk'] . '">' . $row['nama_mk'] . ' - ' . $row['nama_dosen'] . '</option>';
                            }
                        } else {
                            echo '<option value="">Tidak Tersedia</option>';
                        }

?>
                        </select>

                    </div>

                    <!-- <div class="form-group">
                        <label>NIDN Dosen</label>
                        <input class="form-control" name="nidn">
                    </div> -->

                    <div><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>



                </form>

            </div>
        </div>
    </div>
</div>

<!-- Penyimpanan Data -->

<?php

$id_mk = $_POST['id_mk'];
$nim= $_POST['nim'];
$simpan = $_POST['simpan'];

if ($simpan) {
    $sql = $conn->query("INSERT INTO tb_transaksi_krs (nim, id_mk) values('$nim', '$id_mk')");

    if ($sql) {
        ?>

        <script type="text/javascript">
            alert("Data berhasil disimpan!");
            window.location.href="?page=krs";
        </script>

        <?php

    }
}

} else {
    header("location:login.php");
}
?>