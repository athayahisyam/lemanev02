<?php

session_start();
ob_start();
if ($_SESSION['admin']) {

    $dosen = mysqli_query($conn, "SELECT * FROM tb_dosen ORDER BY nidn ASC");
    $th_akd = mysqli_query($conn, "SELECT * FROM tb_th_akademik ORDER BY id_tahun ASC");

    ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            Tambah Matakuliah
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Formulir Data Matakuliah</h3>
                    <form method="POST">

                        <div class="form-group">
                            <label>ID Matakuliah</label>
                            <input class="form-control" name="id_mk" />
                        </div>

                        <div class="form-group">
                            <label>Nama Matakuliah</label>
                            <input class="form-control" name="nama_mk">
                        </div>

                        <?php
                        $rowCount = $dosen->num_rows;
                        $rowCount2 = $th_akd->num_rows;
                        ?>

                        <div class="form-group">
                            <label>Nama Dosen</label>
                            <select class="form-control" name="nidn">
                                <option>- Pilih -</option>

                                <?php
                                if ($rowCount > 0) {
                                    while ($row = $dosen->fetch_assoc()) {
                                        echo '<option value="' . $row['nidn'] . '">' . $row['nama'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="">Tidak Tersedia</option>';
                                }

                                ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select class="form-control" name="th_akd">
                                <option>- Pilih Tahun Ajaran -</option>
                                <?php
                                if ($rowCount2 > 0) {
                                    while ($row2 = $th_akd->fetch_assoc()) {
                                        echo '<option value="' . $row2['id_tahun'] . '">' . $row2['th_akademik1'] .' - '. $row2['th_akademik2'] . '</option>';
                                    } 
                                }else{
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
    $nama_mk = $_POST['nama_mk'];
    $nidn = $_POST['nidn'];
    $tahun = $_POST['th_akd'];
    $simpan = $_POST['simpan'];

    if ($simpan) {
        $sql = $conn->query("INSERT INTO tb_matakuliah (id_mk, nama_mk, nidn, id_tahun) values('$id_mk', '$nama_mk', '$nidn', '$tahun')");

        if ($sql) {
            ?>

            <script type="text/javascript">
                alert("Data berhasil disimpan!");
                window.location.href = "?page=matakuliah";
            </script>

        <?php

    }
}
} else {
    header("location:login.php");
}


?>