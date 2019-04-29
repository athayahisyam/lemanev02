<?php

session_start();
ob_start();
if ($_SESSION['admin']) {

$id = $_GET['id'];

$conn->query("delete from tb_user where id='$id'");

?>

<script>
window.location.href="?page=user"
</script>

<?php
}else{
    header("location:login.php");
}
?>