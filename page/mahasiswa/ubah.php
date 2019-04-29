<?php
session_start();
ob_start();
if ($_SESSION['admin']) {

$nim = $_GET['nim'];

$sql = $conn->query("select * from tb_mahasiswa where nim='$nim'");

$tampil = $sql->fetch_assoc();

$tahun = $tampil['tahun_masuk'];
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data Mahasiswa
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h3>Formulir Ubah Data Mahasiswa</h3>
                <form method="POST">

                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" value="<?= $tampil['nim']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" value="<?= $tampil['nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Tahun Masuk</label>
                        <select class="form-control" name="tahun_masuk">

                            <?php

                            $tahun_masuk = date("Y");


                            for ($i = $tahun_masuk - 8; $i <= $tahun_masuk; $i++) {
                                if ($i == $tahun) {
                                    echo '<option value="' . $i . '" selected>' . $i . '</option>';
                                } else {
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                }
                            }

                            ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <p class="help-block">Set Ulang Status!</p>
                        <?php
                        $table_name = 'tb_mahasiswa';
                        $column_name2 = "status";
                        ?>
                        <select class="form-control" name="status">
                            <?php

                            $result = $conn->query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name2'")
                                or die(mysql_error());

                            $row = mysqli_fetch_array($result);

                            $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE']) - 6))));

                            foreach ($enumList as $value)
                                echo "<option value=" . $value . ">$value</option>";

                            ?>
                        </select>
                    </div>

                    <div><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>

                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Penyimpanan Data -->

<?php

$nama = $_POST['nama'];
$tahun_masuk = $_POST['tahun_masuk'];
$status = $_POST['status'];

$simpan = $_POST['simpan'];

if ($simpan) {
    $sql = $conn->query(
        "update tb_mahasiswa set nama='$nama', 
        tahun_masuk='$tahun_masuk', status='$status'
        where nim='$nim'"
    );

    if ($sql) {
        ?>

        <script type="text/javascript">
            alert("Data berhasil disimpan!");
            window.location.href="?page=mahasiswa";
        </script>

        <?php

    }
}

} else {
    header("location:login.php");
}
?>