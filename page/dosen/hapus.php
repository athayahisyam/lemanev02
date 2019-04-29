<?php
session_start();
ob_start();
if ($_SESSION['admin']) {

$nidn = $_GET['nidn'];

$conn->query("delete from tb_dosen where nidn='$nidn'");

?>

<script>
window.location.href="?page=dosen"
</script>

<?php

} else {
    header("location:login.php");
}

?>
