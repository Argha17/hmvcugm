<section class="content-header">
    <h1>
      Menu Detail Penugasan Unit Kerja
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh Pimpinan Unit</li>
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
            <tr>
              <th style="width:10%;">NIP/NPU/NIU</th>
              <td><?php echo $detail->user_nip?></td>
            </tr>
            <tr>
              <th style="width:10%;">Jabatan</th>
              <td><?php echo $detail->jabatan_hris?> <?php echo $detail->jabatan_non_hris?></td>
            </tr>
             <tr>
              <th style="width:10%;">Fungsi Tugas</th>
               <?php 
                                if($detail->fungsi_nama == 'ppk') {
                                    $baru = 'PPP';
                                }
                                else if ($detail->fungsi_nama == 'pokja') {
                                    $baru = 'PP';
                                }
                                elseif ($detail->fungsi_nama == 'sekretariat') {
                                     $baru = 'Sekretariat';
                                }
                                elseif ($detail->fungsi_nama == 'pimpinan') {
                                     $baru = 'Pimpinan';
                                }
                            ?>
              <td><?php echo $baru?></td>
            </tr>
            <tr>
              <th style="width:10%;">Unit Kerja</th>
              <td><?php echo $detail->unit_hris?></td>
            </tr>
           <!--  <tr>
              <th style="width:10%;">Waktu Penugasan</th>
              <td><?php echo $detail->ditugaskan?></td>
            </tr>
            <tr>
              <th style="width:10%;">Status</th>
              <td><?php echo $detail->status?></td>
            </tr> -->

           
           
            <th>
              <td  class="text-center" width="160px">
                <a href="<?=site_url('sdm/d_sdm/edit/'.$detail->user_id)?>" class="btn btn-primary btn-sm">
                  <i class="fa fa-edit"></i> Edit
                </a>  
                <a href="<?=site_url('sdm/d_sdm/soft_delete/'.$detail->user_id)?>"  class="btn btn-danger btn-sm">
                  <i class="fa fa-trash-o"></i> Hapus
                </a> 
                 <a href="<?=site_url('sdm/d_sdm')?>" class="btn btn-flat btn-warning">
                    <span class="icon fa fa-undo"></span> Kembali
                </a>&nbsp;&nbsp;
              </td>
            </th>
          </table>
        </div>
      </div>
  </div>
</section>