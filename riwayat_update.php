<?php
include 'navbar.php';
$link_data = '?page=riwayat';

$action = empty($_GET['action']) ? '' : $_GET['action'];

if ($action == 'delete') {
    $id = $_GET['id'];
    mysqli_query($con, "delete from riwayat where id_riwayat='" . $id . "'");
    exit("<script>location.href='" . $link_data . "';</script>");
}
?>
<style>
.navbar-nav li {
    margin-right: 3px;
    font-size: 20px;
    margin-left: 10px;
}
</style>