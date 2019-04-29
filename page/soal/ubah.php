<?php

session_start ();
ob_start();
if ($_SESSION['admin']) {

$id_soal = $_GET['id_soal'];

$sql = $conn->query("select * from tb_soal where id_soal='$id_soal'");

$tampil = $sql->fetch_assoc();

?>

<div class="panel panel-default">
    <div class="panel-heading">
        Edit Soal
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <h3>Formulir Ubah User</h3>
                <form method="POST">

                    <div class="form-group">
                        <label>ID Soal</label>
                        <input class="form-control" name="id_soal" value="<?= $tampil['id_soal'];?>" readonly />
                    </div>

                    <div class="form-group">
                        <label>Soal</label>
                        <textarea class="form-control" name="soal" value="<?= $tampil['soal']; ?>"><?= $tampil['soal'];?> </textarea>
                    </div>

                    <div class="form-group">
                        <label>Aspek</label>

                        <?php

                        $table_name = "tb_soal";
                        $column_name = "aspek";

                        ?>
                        <select class="form-control" name="aspek">
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

$id_soal = $_POST['id_soal'];
$aspek = $_POST['aspek'];
$soal = $_POST['soal'];

$simpan = $_POST['simpan'];

if ($simpan) {
    $sql = $conn->query(
        "update tb_soal set  
        soal='$soal',
        aspek='$aspek'
        where id_soal='$id_soal'"
    );

    if ($sql) {
        ?>

        <script type="text/javascript">
            alert("Data berhasil disimpan!");
            window.location.href="?page=soal";
        </script>

        <?php

    }
}


} else {
    header("location:login.php");
}

?>