<?php

session_start();
ob_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if ($_SESSION['admin']) {

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data Dosen
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h3>Formulir Dosen</h3>
                <form method="POST">

                    <div class="form-group">
                        <label>NIDN</label>
                        <input class="form-control" name="nidn" />
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama">
                    </div>

                    <div class="form-group">
                        <label>Status</label>

                        <?php
                        $table_name="tb_dosen";
                        $column_name = "status";
                        ?>

                        <select class="form-control" name="status">
                            <?php

                            $result = $conn->query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'")
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

$nidn = $_POST['nidn'];
$nama = $_POST['nama'];
$status = $_POST['status'];

$simpan = $_POST['simpan'];

if ($simpan) {
    $sql = $conn->query("INSERT INTO tb_dosen (nidn, nama, status)
    values('$nidn', '$nama', '$status')");

    if ($sql) {
        ?>

        <script type="text/javascript">
            alert("Data berhasil disimpan!");
            window.location.href="?page=dosen";
        </script>

        <?php

    }
}

} else {
    header("location:login.php");
}


?>
