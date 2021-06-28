<?php //echo $this->breadcrump();                         ?>

<div class="panel">
    <div class="panel-heading">
        <span class="panel-title"><b>Daftar User</b></span>
        <div class="panel-heading-controls">
            <a href="<?php echo site_url('admin/dashboard/add_user') ?>" class="btn btn-flat btn-sm btn-labeled btn-success xhr dest_subcontent-element">
                <span class="icon fa fa-plus"></span> Users</a>&nbsp;&nbsp;

        </div>
    </div>

    <div class="panel-body">
        <div class="table-light table-primary" style="overflow: auto;">
            <table class="table table-bordered">
                <thead>
                    <tr>
<!--                        <th class="text-center">No</th>-->
                        <th class="text-center">Aksi</th>
                        <th class="text-center">email</th>
                        <th class="text-center">fname</th>
                        <th class="text-center">lname</th>
<!--                        <th class="text-center">Aktif</th>-->
                        <th class="text-center">Group</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //  $no = $offset + 1;
                    if (!empty($content)) {
                        foreach ($content as $row) {
                            // $statusAktif = ($row['user_is_aktif'] == 1) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-ban"></i>';
                            // $statusSSO = ($row['user_is_sso'] == 1) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-ban"></i>';
                            ?>
                            <tr>

                                <td align="center">
                                    <a href="<?php echo site_url('admin/dashboard/update_user/' . $row['iduser']); ?>" class="btn btn-warning btn-sm xhr dest_subcontent-element" data-toggle="tooltip" data-placement="top" title="ubah"><span class="icon fa fa-pencil"></span></a>
                                    <a href="<?php echo site_url('admin/dashboard/delete_user/' . $row['iduser']); ?>" class="btn btn-danger btn-sm xhrs dest_subcontent-element confirm-remove" data-toggle="tooltip" data-placement="top" title="hapus"><span class="icon fa fa-trash-o"></span></a>
                                </td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['fname']; ?></td>
                                <td><?php echo $row['lname']; ?></td>

                                <td><?php echo str_replace(',', ', ', $row['group_name']); ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='7'><div class='alert alert-danger'>Data Tidak Ditemukan</div></td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>


</div>
<script type="text/javascript">
    $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip();

        $(".confirm-remove").click(function() {
            var self = $(this);
            bootbox.confirm({
                title: 'Konfirmasi',
                message: "Yakin data akan dihapus ?",
                buttons: {
                    'confirm': {
                        label: 'Ya',
                        className: 'btn-danger'
                    },
                    'cancel': {
                        label: 'Tidak',
                        className: 'btn-default'
                    }
                },
                callback: function(result) {
                    if (result) {
                        self.unbind("click");
                        self.get(0).click();
                    }
                },
                className: "bootbox-sm"
            });
            return false
        });
    });
</script>