<section class="content-header">
    
    <h1>Daftar Paket</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh Admin P2L</li>
    </ol>
</section>
<!-- ==================================FILTER 1=============================================== -->
<section class="content">
  <div class="panel-box">
        <div class="panel-heading">
            <span class="panel-title"><b>FILTER</b></span>
        </div>

 <div class="panel-body">
            <?php echo form_open("daftarpaket/d_daftarpaket/search"); ?>
            <div class="form-group form-hide">
                <label class="col-xs-1 control-label" style='text-align:left;'>
                    Fungsi          
                </label> 
                <div class="col-xs-6">
                <select class="form-control" name="carifungsi" >
                    <option value=""> - Semua Fungsi - </option>
                    <option value="5"> Pejabat Pengadaan </option>
                    <option value="6"> PPHP </option>
                    <option value="7"> Pejabat Pembuat Komitmen </option>
                    
                </select>
               </div>
            </div>
          </br>
          </br>

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
          </br>
           <div class="form-group form-hide">
                <label class="col-xs-1 control-label"   style='text-align:left;'>
                    Bulan    
                </label> 
                <div class="col-xs-6">   
                <input class="form-control form-reset" type="date" value ="<?php if($caribulan) { echo $caribulan; } else { echo date('Y-m-d'); } ?>" name="caribulan" >
                </div>
                <input type="submit" class="btn btn-primary btn-sm btn-flat" value="Cari">
            </div>
         
             <?php echo form_close(); ?>
             
    </div>
</section>

<!-- ========================================================================================= -->
<section class="content">
  <div class="box">
      <div class="panel-heading">

        <span class="panel-title"><b>-</b></span>
        <div class="panel-heading-controls">
          <a href="<?=site_url('sbu/d_sbu/add')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-success xhr dest_subcontent-element">
                    <span class="icon fa fa-plus"></span> Tambah
          </a>&nbsp;&nbsp;
        </div>
      </div>

        <?php
            $tgl    =date("Y-m-d");
        ?>
      <div class="panel-body">
          <div class="table-light table-primary" style="overflow: auto;">
              <table class="table table-bordered" style="overflow: auto;">
                  <thead>
                    <tr>
                      <th><center>No</center></th>
                      <th><center>Nama Paket</center></th>
                      <th><center>Nilai Kontrak</center></th>
                      <th><center>Pelaksana</center></th>
                      <th><center>Unit Kerja</center></th>
                      <th><center>Periode</center></th> 
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach($row as $data) {  ?>
                    <tr>
                      <td style="width:3%;"><?php echo $no++?></td>
                      <td style="width:30%;"><?php echo $data->paket_pekerjaan?></b></td>
                      <td style="width:15%;"> Rp. <?php echo number_format($data->pagu_anggaran,2,',','.') ?></td>
                      <td style="width:19%;"><?php echo $data->fungsi?> : </br> <?php echo $data->user_nama_lengkap?></td>
                      <td class="text-center"><?php echo $data->unit_hris?></td>
                      <!-- <td class="text-center"><?php echo $data->tgl_mulai?> s/d <?php echo $data->tgl_selesai?></td> -->
                      <td class="text-center"><?php $date = new DateTime($data->tgl_mulai); echo $date->format("d M Y") ?> s/d <?php $date2 = new DateTime($data->tgl_selesai); echo $date2->format("d M Y") ?></td>  

                    </tr>
                    <?php  
                    }  ?>
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
                </table>
           </div>

      </div>
	</section>

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script type="text/javascript" >
    $('select[name="carifungsi"]').val(<?php if($carifungsi != null) { echo $carifungsi; } else { echo "" ; } ?>)
     $('select[name="cariunit"]').val(<?php if($cariunit != null) { echo $cariunit; } else { echo "" ; } ?>)
  </script>

<!--   style="min-width:200px;"
style="min-width:200px;"
style="min-width:200px;"
style="min-width:200px;"
style="min-width:200px;"
style="min-width:200px;" -->