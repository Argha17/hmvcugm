<section class="content-header">
    
    <h1>Analisis HR PP</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh Admin P2L</li>
    </ol>
</section>
<!-- ==================================FILTER 1=============================================== -->
<!-- <section class="content">
  <div class="panel-box">
        <div class="panel-heading">
            <span class="panel-title"><b>FILTER</b></span>
        </div>

 <div class="panel-body">
            <?php echo form_open("sbu/d_sbu/search"); ?>
            <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Nama         
                </label> 
                <div class="col-xs-6">
                <select class="form-control" name="cariberdasarkan" required >
                    <option value=""> - Semua Nama - </option>
                        <?php foreach($nama->result() as $key => $data) { ?>
                          <option value="<?=$data->user_id?>"> <?=$data->user_nama_lengkap?>
                          </option>
                        <?php } ?>  
                </select>
               </div>
            </div>
            <br>
            <br>
            <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Fungsi         
                </label> 
                <div class="col-xs-6">
                <select class="form-control" name="carifungsi"  >
                    <option value=""> - Semua Fungsi - </option>
                    <option value="5"> Pejabat Pengadaan </option>
                    <option value="6"> PPHP </option>
                    <option value="7"> Pejabat Pembuat Komitmen </option>
                    
                </select>
               </div>
            </div>
          <br>
          
          <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Unit Kerja
                </label> 
               <div class="col-xs-6">
                <select class="form-control" name="cariunit"  >
                   <option value=""> - Semua Unit Kerja - </option>
                        <?php foreach($unit->result() as $key => $data) { ?>
                          <option value="<?=$data->id_satker_sipinter?>"> <?=$data->unit_hris?>
                          </option>
                        <?php } ?>  
                </select>
               </div>
            </div>
            <br>

            <div class="form-group form-hide">
                <label class="col-xs-1 control-label"   style='text-align:left;'>
                 Dari       
                </label> 
                <div class="col-xs-2">   
                <input class="form-control form-reset" type="date" value ="<?php echo date('Y-m-d');?>" name="caribulan" >
                </div>
                <label class="col-xs-2 control-label"   style='text-align:center;'>
                Sampai  
                </label> 
                <div class="col-xs-2">   
                <input class="form-control form-reset" type="date" value ="" name="caribulan" >
                </div>
                <input type="submit" class="btn btn-primary btn-sm btn-flat" value="Cari">
            </div>
         
             <?php echo form_close(); ?>
             
    </div>
</section> -->
<!-- ==================================FILTER 2 cadangan=============================================== -->
<!-- <section class="content">
  <div class="panel-box">
        <div class="panel-heading">
            <span class="panel-title"><b>FILTER</b></span>
        </div>

 <div class="panel-body">
            <?php echo form_open("sbu/d_sbu/search2"); ?>
            <div class="form-group form-hide">
                <label class="col-xs-2 control-label" style='text-align:left;'>
                    Berdasarkan         
                </label> 
                <div class="col-xs-2">
                <select class="form-control" name="cariberdasarkan2" required >
                    <option value=""> - Pilih - </option>
                    <option value="nama_fungsi"> Fungsi </option>
                    <option value="satuan"> Satuan </option>
                    <option value="created_at"> Tahun </option>
                </select>
               </div>
            </div>
          </br>
          </br>
            <div class="form-group form-hide">
                <label class="col-xs-2 control-label" style='text-align:left;'>
                    Cari    
                </label> 
                <div class="col-xs-2">   
                <input class="form-control form-reset" type="text" name="yangdicari2" required >
                </div>
                <input type="submit" class="btn btn-success btn-sm btn-flat" value="Cari">
            </div>
         
             <?php echo form_close(); ?>
             
    </div>
</section> -->
<!-- ========================================================================================= -->
<!-- =========================================FILTER 3 AUTOCOMPLETE================================================ -->
<section class="content">
  <div class="panel-box">
        <div class="panel-heading">
            <span class="panel-title"><b>FILTER</b></span>
        </div>

 <div class="panel-body">
            <?php 
            //echo form_open("analisis/d_analisis/search"); ?>
            <form action="<?=site_url('analisis2/d_analisis2/search')?>" method="post" accept-charset="utf-8">
            <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Cari          
                </label> 
                <div class="col-xs-6">
                 <input type="text" id="title"  placeholder="Masukan Nama yang dicari" class="form-control ui-autocomplete-input"  autocomplete="off" >
               </div>
            </div>
            <br>
            <br>
            <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Nama         
                </label> 
                <div class="col-xs-6">
                <input type="text" id="namalengkap" name="user_nama_lengkap" value ="<?php if (!empty ($user_nama_lengkap)) {echo $user_nama_lengkap;} else { echo "";}
                 ?>" class="form-control" readonly>
               </div>
            </div>
          <br>
          <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Fungsi         
                </label> 
                <div class="col-xs-6">
                <input type="text" name="fungsi" value ="<?php if (!empty ($fungsi)) {echo $fungsi;} else { echo "";}
                 ?>" class="form-control" readonly>
               </div>
            </div>
            <br>
          
          <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Unit Kerja
                </label> 
               <div class="col-xs-6">
                <input type="text" name="unit_hris" value ="<?php if (!empty ($unit_hris)) {echo $unit_hris;} else { echo "";}
                 ?>" class="form-control" readonly>
               </div>
            </div>
            <br>
                   <div class="form-group form-hide">
                <label class="col-xs-1 control-label"   style='text-align:left;'>
                        
                </label> 
                <div class="col-xs-6">   
                <input class="form-control form-reset" type="date"  value ="<?php if($caribulan) { echo $caribulan; } else { echo date('Y-m-d'); } ?>" name="caribulan" >
                </div>
                <input type="submit" class="btn btn-primary btn-sm btn-flat" value="Cari">
            </div>
         
         
             <?php 
             //echo form_close(); ?>
          </form>   
    </div>
</section>

<!-- ========================================================================================= -->
<!-- ========================================================================================= -->
<section class="content">
  <div class="box">
      <div class="panel-heading">

        <span class="panel-title"><b>Daffa Argy</b></span>
        <div class="panel-heading-controls">
          <a href="<?=site_url('sbu/d_sbu/add')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-success xhr dest_subcontent-element">
                    <span class="icon fa fa-plus"></span> Tambah
          </a>&nbsp;&nbsp;
        </div>
      </div>
      <div class="panel-body">
          <div class="table-light table-primary" style="overflow: auto;">
              <table class="table table-bordered" style="overflow: auto;">
                  <thead>
                    <tr>
                      <th><center>No</center></th>
                      <th><center>Unit Kerja</center></th>
                      <th><center>Nama Paket</center></th>
                      <!-- <th><center>Januari</center></th>
                      <th><center>Februari</center></th> -->
                      <th><center>Nilai Kontrak</center></th>
                      <th><center>HR</center></th>
                      <th><center>Akhir Tender</center></th> 
                      <th><center>Status</center></th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo $viewpp; ?>
<!-- =============================punya agus==================================================== -->
                    <!-- <?php $no = 1;
                    foreach ($dashboard as $sbu) :?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $sbu->fungsi ?></td>
                        <td><a href="<?php echo site_url('sbu/dashboard/edit/'.$sbu->no); ?>"><?php echo $sbu->kontrak ?></a>
                        </td>
                        <td><?php echo number_format($sbu->nilai,2,',','.') ?></td>
                        <td><?php echo $sbu->satuan ?></td>
                        <td><?php echo $sbu->tahun ?></td>
                      </tr>
                    <?php endforeach; ?> -->
<!-- ========================================================================================= -->
                  </tbody>
                 <!--  <tfoot>
                    <tr  style="font-weight: bold;">
                      
                      <td class="text-center" colspan="3">Total Nilai Kontrak</td>
                      
                      <td>Rp. 7.047.830.000,00</td>
                      <td>Rp. 4.120.000,00</td>

                    </tr>
                    <tr  style="font-weight: bold;">
                      
                      <td class="text-center" colspan="3">Status</td>
                      <td>Rp. 2.678.411,00</td>
                      <td>Rp. 3.042.222,00</td>
                      <td class='btn btn-success'>  Sudah Dibayar  20/04/2021</td>
                    <!-- "<button class='btn btn-success'>Aktif</button>"
                    </tr> 
                  </tfoot> -->
                </table>
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
                source: "<?php echo site_url('analisis2/d_analisis2/get_autocomplete');?>",
                focus: function( event, ui ) {
                  $( "#project" ).val( '<p>'+ui.item.label+'</p>' );
                  return false;
                },
                select: function (event, ui) {
                  /*console.log(ui.item.fungsi);*/

                  $('[name="user_nama_lengkap"]').val(ui.item.user_nama_lengkap);
                   $('[name="fungsi"]').val(ui.item.fungsi);
                   $('[name="unit_hris"]').val(ui.item.unit_hris);
            }
            });
        });
    </script>



<!--   style="min-width:200px;"
style="min-width:200px;"
style="min-width:200px;"
style="min-width:200px;"
style="min-width:200px;"
style="min-width:200px;" -->