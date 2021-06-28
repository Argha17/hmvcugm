<section class="content-header">
    <h1>
      Penugasan
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
    		<div class="panel-heading-controls">
    			<a href="<?=site_url('penugasan/d_penugasan')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-warning xhr dest_subcontent-element">
                    <span class="icon fa fa-refresh"></span> Kembali
    			</a>
    		</div>
    	</div>
      <div class="panel-body">
        <div class="table-light table-primary" style="overflow: auto;">
          <table class="table table-bordered">
            <tr>
              <th style="width:10%;">Nama Lengkap</th>
              <td><?php echo $detail->nama_penugasan?></td>
            </tr>
            <tr>
              <th style="width:10%;">Satuan Kerja</th>
              <td><?php echo $detail->id_satker?></td>
            </tr>
            <tr>
              <th style="width:10%;">Fungsi Kerja</th>
              <td><?php echo $detail->id_fungsi?></td>
            </tr>
            <tr>
              <th style="width:10%;">Unit Kerja</th>
              <td><?php echo $detail->id_unit?></td>
            </tr>
            <tr>
              <th style="width:10%;">NIP/NIU</th>
              <td><?php echo $detail->nip?></td>
            </tr>
            <tr>
              <th style="width:10%;">E-mail</th>
              <td><?php echo $detail->email?></td>
            </tr>
            <tr>
              <th style="width:10%;">Alamat</th>
              <td><?php echo $detail->alamat?></td>
            </tr>
          </table>
        </div>
      </div>
  </div>
</section>