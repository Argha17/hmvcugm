<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<!--script>
        $(document).ready( function () {
             $('#tb3').DataTable();
        } );
    </script-->

<section class="content-header">
    
    <h1>Daftar Pimpinan Unit</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh admin P2L</li>
    </ol>
</section>
<section class="content">
  <div class="panel-box">
        <div class="panel-heading">
            <span class="panel-title"><b>FILTER</b></span>
        </div>
    <div class="panel-body">
          <!--form  class="form-horizontal xhr dest_subcontent-element" action="<?=site_url('sdm/d_sdm/search')?>" method="get">
            <div class="form-group form-hide">
                <div class="col-sm-2">
                    <input type="text" name="fullname" class="form-control" placeholder="Tulis Keyword yang dicari">
                </div>
                <button type="submit" class="btn btn-primary btn-sm"><span class="icon fa fa-search"></span> Cari</button>
            </div>
            </form-->
            <?php echo form_open("pimpinan/d_pimpinan/search"); ?>
                <!--select name="cariberdasarkan" >
                    <option value="">Cari Berdasarkan</option>
                    <option value="nama_pimpinan">Nama Lengkap</option>
                    <option value="jabatan">Jabatan</option>
                    <option value="unit">Unit Kerja</option>
                </select-->
                <input type="text" name="yangdicari" id="" placeholder="Ketik apa yang dicari">
                <input type="submit" class="btn-primary btn-xs" value="Cari">

            <?php echo form_close(); ?>
        </div>
    </div>
</section>
    <!-- FILTER-->
<!--section class="content">
  <div class="panel-box">
        <div class="panel-heading">
            <span class="panel-title"><b>FILTER</b></span>
        </div>
    <div class="panel-body">
          <form  class="form-horizontal xhr dest_subcontent-element" action="<?=site_url('sdm/d_sdm/search')?>" method="get">
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;' >
                    Nama             
                </label> 
                <div class="col-sm-4">
                    <input type="text" name="fullname" class="form-control" placeholder="Tulis nama yang dicari" >
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Fungsi Kerja             
                </label> 
                <div class="col-sm-4">
                    <select name="fungsi" class="form-control" >
                        <option value=""> - Pilih - </option>
                        <option value="1"> Pimpinan Unit </option>
                        <option value="2"> Keseketariatan </option>
                        <option value="3"> Pejabat Pembuat Komitmen (PPK) </option>
                        <option value="4"> PP/Pokja </option>
                        <option value="5"> TPAK </option>
                        <!--?php foreach($fungsi->result() as $key => $data) { ?-->
                        <!--option value="<?=$data->id_fungsi?>"><?=$data->nama_fungsi?></option-->
                        <!--?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Tahun             
                </label> 
                <div class="col-sm-4">
                    <select name="tahun" class="form-control">
                        <option value=""> - Pilih - </option>
                        <option value="1"> 2019 </option>
                        <option value="2"> 2020 </option>
                        <option value="3"> 2021 </option>
                        <option value="4"> 2022 </option>
                        <option value="5"> 2023 </option>
                    </select>
                </div>
            </div>
             <div class="col-2 col-md-offset-2" >
                <button type="submit"  class="btn btn-primary btn-flat"> Lakukan Pencarian</button>
            </div>
        </form>
    </div>
  </div>
</section-->


    <!-- Main content -->
<section class="content">
  <div class="box">
    	<div class="panel-heading">
        <span class="panel-title"><b>-</b></span>
    		<div class="panel-heading-controls">
    			<a href="<?=site_url('pimpinan/d_pimpinan/add')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-success xhr dest_subcontent-element">
                    <span class="icon fa fa-plus"></span> Tambah
    			</a>&nbsp;&nbsp;
    		</div>
    	</div>
    <div class="panel-body">
        <div class="table-light table-primary" style="overflow: auto;">
            <!--div class="navbar-form"-->
                <!--?php echo form_open('sdm/d_sdm/search') ?-->
                <!--input type="text" name="keyword" class="form_control" placeholder="Pencarian">
                <button type="submit" class="btn btn-sm"><span class="icon fa fa-search"></span> Cari</button>&nbsp;&nbsp;
                <button type="submit" class="btn btn-sm" data-toggle="modal" data-target="#exampleModal"><span class="icon fa fa-list"></span>    FILTER</button>&nbsp;&nbsp;
                <!--?php echo form_close() ?>
            </div-->
            <table class="table table-striped table-bordered" id="tb3">
    			<thead>
    				<tr>
    					<th class="text-center">No.</th>
    					<th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Unit Kerja</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Periode</th>
                        
    					<!--th>NIP/NIU</th>
    					<th>e_mail</th>
    					<th>alamat_</th>
    					<th>Updated Time</th>
    					<th class="text-center" style="width:15%;">Actions</th-->
    				</tr>
    			</thead>
    			<tbody>
    				<!--?php $no = 1;
    				foreach($row->result() as $key => $data) {  ?>
    				<tr>
    					<td style="width:3%;"><?=$no++?>.</td>
    					<td><a href="<?=site_url('pimpinan/d_pimpinan/detail/'.$data->id_pimpinan)?>"><?=$data->nama_pimpinan?></a></td>
                         <td><?=$data->jabatan?></td>
                        <td><?=$data->unit?></td>
                       
                        <!--td><?=$data->nip?></td>
    					<td><?=$data->email?></td>
    					<td><?=$data->alamat_?></td>
    					<td><?=$data->updated?></td>
    					<td  class="text-center" width="160px">
                            <a href="<?=site_url('sdm/d_sdm/detail/'.$data->id_sdm)?>" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i> Detail
                            </a>  
    					</td>
    				</tr-->
    				<!--?php  
	    			}  ?-->

                    <?php $no = 1;
                    foreach($row as $data) {  ?>
                    <tr>
                      <td style="width:3%;"><?php echo $no++?></td>
                      <td><a href="<?=site_url('pimpinan/d_pimpinan/detail/'.$data->user_id)?>"><b><?php echo $data->user_nama_lengkap?></b></td>
                      <td><?php echo $data->jabatan_hris?> <?php echo $data->jabatan_non_hris?>  </td>
                      <td><?php echo $data->unit_hris?></td>
                      <td><?php echo $data->user_is_deleted == 1 ? "<button class='btn btn-success'>Aktif</button>" : "<button class='btn btn-danger'>Tidak Aktif</button>" ?></td>
                      <td><?php echo $data->created_time?> s/d <?php echo $data->user_is_deleted == 1 ?  "Sekarang" : "Sekarang" ?> </td>

                    </tr>
                    <?php  
                    }  ?>
    			</tbody>
    		</table>
    	</div>
    </div>
  </div>

<!-- Modal -->
<!--div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter Sumber Daya Manusia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="<?=site_url('sdm/d_sdm/process')?>" method="post">
            <div class="form-group form-hide">
                <label class="col-sm-4 control-label" style='text-align:left;'>
                    Fungsi Kerja*             
                </label> 
                <div class="col-sm-8">
                    <select name="fungsi" class="form-control" required>
                        <option value=""> - Pilih - </option>
                        <option value="1"> Pimpinan Unit </option>
                        <option value="2"> Keseketariatan </option>
                        <option value="3"> Pejabat Pembuat Komitmen (PPK) </option>
                        <option value="4"> PP/Pokja </option>
                        <option value="5"> TPAK </option>
                        <!--?php foreach($fungsi->result() as $key => $data) { ?-->
                        <!--option value="<?=$data->id_fungsi?>"><?=$data->nama_fungsi?></option-->
                        <!--?php } ?-->
                   <!--  </select>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-4 control-label" style='text-align:left;'>
                    Tahun*             
                </label> 
                <div class="col-sm-8">
                    <select name="fungsi" class="form-control" required>
                        <option value=""> - Pilih - </option>
                        <option value="1"> 2019 </option>
                        <option value="2"> 2020 </option>
                        <option value="3"> 2021 </option>
                        <option value="4"> 2022 </option>
                        <option value="5"> 2023 </option>
                    </select>
            </div>
         </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div> -->
    </div>
  </div>
</div-->

</section>
