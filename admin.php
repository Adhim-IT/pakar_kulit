<?php
include 'navbar.php';
$link_data = '?page=admin';
$link_update = '?page=update_admin';

$list_data = '';
$q = "select * from pengguna where level='Admin' order by id_pengguna desc";
$q = mysqli_query($con, $q);
if (mysqli_num_rows($q) > 0) {
    while ($r = mysqli_fetch_array($q)) {
        $id = $r['id_pengguna'];
        $list_data .= '
		<tr>
            <td></td>
            <td>' . $r['nama_lengkap'] . '</td>
            <td>' . $r['username'] . '</td>
            <td>';
        if ($r['username'] == 'admin') {
            $list_data .= '-';
        } else {
            $list_data .= '
		        <a href="' . $link_update . '&amp;id=' . $id . '&amp;action=edit" class="btn btn-success btn-xs" title="Ubah"><i class="fa fa-edit"></i> Ubah</a> &nbsp;
                <a href="#" data-href="' . $link_update . '&amp;id=' . $id . '&amp;action=delete" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>';
        }
        $list_data .= '
            </td>
		</tr>';
    }
}
?>
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Data Admin</h3>
        <div class="box-tools">
            <a style="font-size: 15px;" style="height: 40px;" href="<?php echo $link_update; ?>"
                class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                Tambah
                Admin</a>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTables1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th width="15">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $list_data; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<style>
.btn {
    border-radius: 10px;
    margin-right: 10rem;
}

table thead tr th {
    font-size: 17px;
}



table h3 {
    font-size: 20px;
}

table td {
    font-size: 15px;
    margin-right: 100rem;
}



.navbar-nav li {
    margin-right: 3px;
    font-size: 20px;
    margin-left: 10px;
}
</style>