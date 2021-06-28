<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<!--script>
        $(document).ready( function () {
             $('#tb3').DataTable();
        } );
    </script-->

<section class="content-header">
    
    <h1>Menu Penugasan</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh Pimpinan Unit</li>
    </ol>
</section>
    <!-- FILTER-->
<!-- <!-- <section class="content">
  <div class="panel-box">
        <div class="panel-heading">
            <span class="panel-title"><b>FILTER</b></span>
        </div>
    <div class="panel-body">
          <form  class="form-horizontal xhr dest_subcontent-element" id="form_search" action="<?php echo site_url('sdm/d_sdm/search_autocomplete');?>" method="GET">
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;' >
                    Nama             
                </label> 
                <div class="col-sm-4">
                    <input type="text" name="nama_petugas" id="title" class="form-control" placeholder="Tulis nama yang dicari" >
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Fungsi Tugas             
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
                        <!--?php } ?-->
                   <!--  </select>
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
        </form-->
    <!-- </div> --> 
    <!--?php echo form_open("sdm/d_sdm/search"); ?>
                <select name="cariberdasarkan" >
                    <option value="">Cari Berdasarkan</option>
                    <option value="nama_petugas">Nama Lengkap</option>
                    <option value="fungsi">Fungsi Tugas</option>
                    <option value="jabatan">Jabatan</option>
                    <option value="satuankerja">Satuan Kerja</option>
                    <option value="status">Status</option>
                </select>
                <input type="text" name="yangdicari" id="">
                <input type="submit" class="btn-primary btn-xs" value="Cari">

            <!--?php echo form_close(); ?-->
 <!--  </div>
</section> -->


<section class="content">
  <div class="panel-box">
        <div class="panel-heading">
            <span class="panel-title"><b>FILTER</b></span>
        </div>

 <div class="panel-body">
            <?php echo form_open("sdm/d_sdm/search"); ?>
            <div class="form-group form-hide">
                <label class="col-xs-1 control-label"   style='text-align:left;'>
                    Nama    
                </label> 
                <div class="col-xs-2">   
                <input class="form-control form-reset" type="text" placeholder="Masukkan Nama" name="carinama" >
            </div>
            </br>
            </br>
            <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Fungsi         
                </label> 
                <div class="col-xs-2">
                <select class="form-control" name="carifungsi"  >
                    <option value=""> - Pilih Fungsi - </option>
                    <option value="9"> PPP </option>
                    <option value="10"> PP </option>
                    <option value="16"> Sekretariatan </option>
                </select>
               </div>
            </div>
          </br>
           <div class="form-group form-hide">
                <label class="col-xs-1 control-label"   style='text-align:left;'>
                    Tahun    
                </label> 
                <div class="col-xs-2">   
                <input class="form-control form-reset" type="number" value ="<?php echo date('Y');?>" name="caritahun" >
                </div>
                <input type="submit" class="btn btn-primary btn-sm btn-flat" value="Cari">
            </div>
         
             <?php echo form_close(); ?>
             
    </div>
</section>

    <!-- Main content -->
<section class="content">
  <div class="box">
    	<div class="panel-heading">
        <span class="panel-title"><b>-</b></span>
    		<div class="panel-heading-controls">
    			<a href="<?=site_url('sdm/d_sdm/add')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-success xhr dest_subcontent-element">
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
                        <!--th class="text-center">ID. SDM</th-->
    					<th class="text-center">Nama Lengkap</th>
                        
                        <th class="text-center">Fungsi Tugas</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Unit Kerja</th>
                        <!--th class="text-center">Status</th-->
                        
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
                        <!--td><?=$data->id_sdm?></td>
    					<td><a href="<?=site_url('sdm/d_sdm/detail/'.$data->id_penugasan)?>"><?=$data->nama_petugas?></a></td>
                        <!--td><?=$data->nama_satker?></td>
                        <td><?=$data->fungsi?></td>
                        <td><?=$data->jabatan?></td>
                        <td><?=$data->satuankerja?></td>
                        <td><?=$data->status?></td>
                        <!--td><?=$data->unit?></td-->
                        
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
                      <td><a href="<?=site_url('sdm/d_sdm/detail/'.$data->user_id)?>"><b><?php echo $data->user_nama_lengkap?></b></td>
                      <?php 
                                if($data->fungsi_nama == 'ppk') {
                                    $baru = 'PPP';
                                }
                                else if ($data->fungsi_nama == 'pokja') {
                                    $baru = 'PP';
                                }
                                elseif ($data->fungsi_nama == 'sekretariat') {
                                     $baru = 'Sekretariat';
                                }
                                elseif ($data->fungsi_nama == 'pimpinan') {
                                     $baru = 'Pimpinan';
                                }
                            ?>
                        <td><?=$baru?></td>
                      <td><?php echo $data->jabatan_hris?> <?php echo $data->jabatan_non_hris?></td>
                      <td><?php echo $data->unit_hris?></td>
                      <!--td><?php echo $data->status?></td-->
                    </tr>
                    <?php  
                    }  ?>
    			</tbody>
    		</table>
    	</div>
    </div>
  </div>
  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    </select>
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
      </div>
    </div>
  </div>
</div>

</section>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script type="text/javascript">
        $(document).ready(function(){
 
            $('#title').autocomplete({
                source: "<?php echo site_url('sdm/d_sdm/search_autocomplete');?>",
      
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    //$("#form_search").submit(); 
                }
            });
 
        });
    </script>
