<?php

session_start();
ob_start();
if ($_SESSION['admin']) {

    $id = $_GET['id_tahun'];

    $sql = $conn->query("select * from tb_th_akademik where id_tahun='$id'");

    $tampil = $sql->fetch_assoc();
    ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            Tambah Tahun Akademik
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>Edit Tahun Akademik</h3>
                    <form method="POST">

                        <div class="form-group">
                            <label>ID</label>
                            <div class="form-control" name="id" readonly><?= $tampil['id_tahun'] ?></div>
                        </div>

                        <div class="form-group">
                            <label>TAHUN AKADEMIK: <?= $tampil['th_akademik1'] ?> PERIODE: <?= $tampil['th_akademik2'] ?> </label>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Tahun Akademik Awal</label>
                                <input class="form-control" name="th_akd_awal" />
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>/</label>
                                <input class="form-control" name="slash" placeholder="/" readonly />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun Akademik Akhir</label>
                                <input class="form-control" name="th_akd_akhir" />
                            </div>
                        </div>

                        <div class="clearfix visible-md"></div>

                        <div class="form-group">
                            <label>Ganjil/Genap</label>
                            <select class="form-control" name="ganjil_genap">
                                <option>- Pilih -</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                </div>


                <div><input type="submit" name="simpan" value="Simpan" class="btn btn-primary"></div>



                </form>

            </div>
        </div>
    </div>
    </div>

    <!-- Penyimpanan Data -->

    <?php
    $th_akd_awal = $_POST['th_akd_awal'];
    $th_akd_akhir = $_POST['th_akd_akhir'];
    $th_akd = $th_akd_awal . "/" . $th_akd_akhir;
    $ket = $_POST['ganjil_genap'];

    $simpan = $_POST['simpan'];

    if ($simpan) {
        $sql = $conn->query(
            "update tb_th_akademik set th_akademik1='$th_akd', th_akademik2='$ket'
        where id_tahun='$id'"
        );

        if ($sql) {
            ?>

            <script type="text/javascript">
                alert("Data berhasil disimpan!");
                window.location.href = "?page=th_akd";
            </script>

        <?php

    }
}
} else {
    header("location:login.php");
}
?>