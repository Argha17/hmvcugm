
<section class="content-header">
    <h1>
      Menu Penugasan
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
        <span class="panel-title"><b>Daftar Sumber Daya Manusia</b></span>
    		<div class="panel-heading-controls">
    			<a href="<?=site_url('penugasan/d_penugasan/add')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-success xhr dest_subcontent-element">
                    <span class="icon fa fa-plus"></span> Tambah
    			</a>&nbsp;&nbsp;
    		</div>
    	</div>
    <div class="panel-body">
        <div class="table-light table-primary" style="overflow: auto;">
            <div class="navbar-form">
                <!--?php echo form_open('penugasan/d_penugasan/search') ?-->
                <input type="text" name="keyword" class="form_control" placeholder="Search">
                <button type="submit" class="btn btn-xs"><span class="icon fa fa-search"></span>Cari</button>&nbsp;&nbsp;
                <!--?php echo form_close() ?-->
            </div>
            <table class="table table-bordered" id="tb12">
    			<thead>
    				<tr>
    					<th>No.</th>
    					<th>Nama Lengkap</th>
                        <!--th>Satuan Kerja</th-->
                        <th>Fungsi Kerja</th>
                        <!--th>Unit Kerja</th>
    					<th>NIP/NIU</th>
    					<th>E-mail</th>
    					<th>Alamat</th>
    					<th>Created Time</th>
    					<th>Updated Time</th-->
    					<th style="width:15%;">Actions</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php $no = 1;
    				foreach($row->result() as $key => $data) {  ?>
    				<tr>
    					<td style="width:3%;"><?=$no++?>.</td>
    					<td><?=$data->user_username?></td>
                        <td><?=$data->group_menu_nama?></td>
                        <!--td><?=$data->nama_fungsi?></td>
                        <td><?=$data->nama_unit?></td>
    					<td><?=$data->nip?></td>
    					<td><?=$data->email?></td>
    					<td><?=$data->alamat?></td>
    					<td><?=$data->created?></td>
    					<td><?=$data->updated?></td-->
    					<td  class="text-center" width="160px">
    						<a href="<?=site_url('penugasan/d_penugasan/edit/'.$data->id_penugasan)?>" class="btn btn-primary btn-xs">
			    				<i class="fa fa-edit"></i>Edit
			    			</a>  
    						<a href="<?=site_url('penugasan/d_penugasan/del/'.$data->id_penugasan)?>" onclick="return confirm('Apakah Anda yakin hapus?')" class="btn btn-danger btn-xs">
			    				<i class="fa fa-trash-o"></i>Hapus
			    			</a> 
                            <a href="<?=site_url('penugasan/d_penugasan/detail/'.$data->id_penugasan)?>" class="btn btn-info btn-xs">
                                <i class="fa fa-list-ul"></i>Detail
                            </a>  
    					</td>
    				</tr>
    				<?php  
	    			}  ?>
    			</tbody>
    		</table>
    	</div>
    </div>
  </div>
  <table class="table" id="tbl2">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th data-class-name="priority">Salary</th>
        </tr>
    </thead>
</table>

</section>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script>
        $(document).ready( function () {
             $('#tbl2').DataTable();
        } );
    </script>


    