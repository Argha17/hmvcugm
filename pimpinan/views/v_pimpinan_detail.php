<section class="content-header">
    <h1>
      Detail Informasi Pimpinan Unit
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh admin P2L</li>
    </ol>
</section>

    <!-- Main content -->
<section class="content">
  <div class="box">
    	<div class="panel-heading">
        <span class="panel-title"><b>Detail Informasi</b></span>
    		<!--div class="panel-heading-controls">
    			<a href="<?=site_url('sdm/d_sdm')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-warning xhr dest_subcontent-element">
                    <span class="icon fa fa-refresh"></span> Kembali
    			</a>
    		</div-->
    	</div>
      <div class="panel-body">
        <div class="table-light table-primary" style="overflow: auto;">
          <table class="table">
            <tr>
              <th style="width:10%;">Nama Lengkap</th>
              <td><?php echo $detail->user_nama_lengkap?></td>
            </tr>
            <!-- <tr>
              <th style="width:10%;">Fungsi</th>
              <td><?php echo $detail->user_fungsi?></td>
            </tr> -->
             <tr>
              <th style="width:10%;">Username</th>
              <td><?php echo $detail->user_username?></td>
            </tr>
            <tr>
              <th style="width:10%;">E-mail</th>
              <td><?php echo $detail->user_email?></td>
            </tr>
          
            <tr>
              <th style="width:10%;">NIP/NPU/NIU</th>
              <td><?php echo $detail->user_nip?></td>
            </tr>
            <tr>
              <th style="width:10%;">Jabatan</th>
              <td><?php echo $detail->jabatan_hris?> <?php echo $detail->jabatan_non_hris?></td>
            </tr>
            <tr>
              <th style="width:10%;">Unit Kerja</th>
              <td><?php echo $detail->unit_hris?></td>
            </tr>
            <tr>
              <th style="width:10%;">Status</th>
              <td><?php echo $detail->user_is_deleted == 1 ? "<p style='color:green;'>Aktif</p>" : "<p style='color:red;'>Tidak Aktif</p>" ?></td>
            </tr>
            <tr>
              <th style="width:10%;">Dipilih oleh </th>
              <td><?php echo $detail->created_by == 380 ? "Admin P2L" : "Bukan Admin"?></td>
            </tr>
            <tr>
              <th style="width:10%;">Masa Aktif </th>
              <td><?php echo $detail->created_time?> s/d <?php echo $detail->user_is_deleted == 1 ?  "Sekarang" : "$detail->updated_time" ?> </td>
            </tr>
            <th>
              <td  class="text-center" width="160px">
              <form action="<?=site_url('pimpinan/d_pimpinan/process/'.$detail->user_id)?>" method="post">
                <input type="hidden" name="user_id" value="<?=$detail->user_id?>">
                <input type="hidden" name="user_is_deleted" value="<?=$detail->user_is_deleted?>">
                  <button type="submit" name="edit" class="btn btn-flat <?php echo $detail->user_is_deleted == 1 ? "btn-warning" : "btn-success"?>">
                      <i class="fa fa-edit"></i> <?php echo $detail->user_is_deleted == 1 ? "Tidak Aktif" : "Aktif" ?>
                    </button>
               
                <a href="<?=site_url('pimpinan/d_pimpinan/soft_delete/'.$detail->user_id)?>"  class="btn btn-danger btn-flat">
                  <i class="fa fa-trash-o"></i> Hapus
                </a> 
                 <a href="<?=site_url('pimpinan/d_pimpinan')?>" class="btn btn-flat btn-default">
                    <span class="icon fa fa-undo"></span> Kembali
                </a>
                 </form> &nbsp;&nbsp;

              </td>
            </th>
          </table>
        </div>
      </div>
  </div>
</section>