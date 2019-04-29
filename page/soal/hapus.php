<?php
session_start();
ob_start();
if ($_SESSION['admin']) {

$id_soal = $_GET['id_soal'];

$conn->query("delete from tb_soal where id_soal='$id_soal'");

?>

<script>
window.location.href="?page=soal"
</script>

<?php

} else {
    header("location:login.php");
}

?>