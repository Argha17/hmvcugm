<section class="content-header">
    <h1>
      Menu Penugasan Unit
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh Pimpinan Unit</li>
    </ol>
</section>


<!--link  rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css">
<link  rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery-ui.css"-->
<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"-->


<section class="content">
  <div class="box">
        <div class="panel-heading">
        <span class="panel-title"><b><?=ucfirst($page)?> penugasan Unit</b></span>
            <!--div class="panel-heading-controls">
                <a href="<?=site_url('sdm/d_sdm')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-warning xhr dest_subcontent-element">
                    <span class="icon fa fa-undo"></span> Kembali
                </a>&nbsp;&nbsp;
          
            </div-->
        </div>

        <div class="panel-body">
          <form class="form-horizontal xhr dest_subcontent-element" action="<?=site_url('sdm/d_sdm/process')?>" method="post">
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Fungsi Tugas :
                </label>
                <div class="col-sm-8">
                    <select id="fungsi_tugas_value" name="fungsi_nama" class="form-control" required >
                        <option value=""> - Pilih Fungsi Tugas terlebih dahulu - </option>
                        <!-- <?php foreach($groupmenu->result() as $key => $data) { ?>
                           < <option value="<?=$data->group_menu_id?>" <?=$data->group_menu_id == $row->group_menu_id ? "selected" : null?>><?=$data->group_menu_nama?></option>
                      <?php } ?> -->
                      <option value="9" <?=set_value('group_menu_id')== 9 ? "selected" : null?> > PPP (PPK) </option>
                      <option value="10" <?=set_value('group_menu_id')== 10 ? "selected" : null?> > PP </option>
                      <option value="16" <?=set_value('group_menu_id')== 16 ? "selected" : null?> > Sekretariatan </option> 
                      </select>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Cari           
                </label> 
                <div class="col-sm-8">
                    <input type="text" id="title"  placeholder="Masukan kata kunci yang dicari" class="form-control" required>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Nama Lengkap             
                </label> 
                <div class="col-sm-8">
                    
                    <input type="text" name="user_nama_lengkap" class="form-control" readonly>
                </div>
            </div>
            <!-- <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Jabatan :
                </label>
                <div class="col-sm-8">
                    <input type="text"  name="user_gelar" class="form-control" readonly>
                </div>
            </div> -->

            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Jabatan :
                </label>
                <div class="col-sm-8">
                    <input type="text"  name="jabatan_hris" class="form-control" readonly>
                </div>
            </div>

             <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    E-mail :
                </label>
                <div class="col-sm-8">
                    <input type="text"  name="user_email" class="form-control" readonly>
                </div>
            </div>

           <!--  <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Eselon :
                </label>
                <div class="col-sm-8">
                    <input type="text"  name="eselon" class="form-control" readonly>
                </div>
            </div> -->
             <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Username :
                </label>
                <div class="col-sm-8">
                    <input type="text"  name="user_username" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    NIP/NPU/NIU :
                </label>
                <div class="col-sm-8">
                    <input type="text" name="user_nip" value="0" class="form-control" readonly>
                </div>
            </div>

             
             <!-- <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Satuan Kerja :
                </label>
                <div class="col-sm-8">
                    <input type="text"  name="user_satker" class="form-control" readonly >
                </div>
            </div> -->

            <!-- <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Unit Kerja:
                </label>
                <div class="col-sm-8">
                    <input type="text" name="user_unit"  class="form-control" readonly>
                </div>
            </div> -->
              <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Unit Kerja:
                </label>
                <div class="col-sm-8">
                    <input type="text" name="unit_hris"  class="form-control" readonly>
                </div>
            </div>
              

           

             

            
            <div class="col-md-4 col-md-offset-4" >
                <button type="submit" name="<?=$page?>" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-refresh"></i> Reset</button>
                <a href="<?=site_url('sdm/d_sdm')?>" class="btn btn-flat btn-warning">
                    <span class="icon fa fa-undo"></span> Kembali
                </a>

            </div>
          </form>
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
                source: function( request, response ) {
                  console.log("xxxxx");
                 // Fetch data
                 $.ajax({
                  url: "<?php echo site_url('sdm/d_sdm/get_autocomplete');?>",
                  type: 'get',
                  dataType: "json",
                  data: {
                   term: request.term,
                   fungsi_tugas: $("#fungsi_tugas_value option:selected").val()
                  },
                  success: function( data ) {
                   response( data );
                  }
                 });
                },
                focus: function( event, ui ) {
                  $( "#project" ).val( '<p>'+ui.item.label+'</p>' );
                  return false;
                },
                extraParams: {
                    test: 'new'
                },
                select: function (event, ui) {

      //--[AUTOCOMPLETE] coding view autocomplete pimpinan 1 tabel ugmfw--// 
                  /* $('[name="user_nama_lengkap"]').val(ui.item.user_nama_lengkap); 
                   $('[name="user_username"]').val(ui.item.user_username);
                   $('[name="user_email"]').val(ui.item.user_email); 
                   $('[name="user_nip"]').val(ui.item.user_nip);
                   $('[name="user_satker"]').val(ui.item.user_satker); 
                   $('[name="user_unit"]').val(ui.item.user_unit); 
                   $('[name="user_gelar"]').val(ui.item.user_gelar);
*/
      //--[AUTOCOMPLETE] coding view autocomplete pimpinan 3 tabel dr ugmfw,jabatan, dan unit--//
                   $('[name="user_nama_lengkap"]').val(ui.item.user_nama_lengkap); 
                   $('[name="user_username"]').val(ui.item.user_username);
                   $('[name="user_email"]').val(ui.item.user_email); 
                   $('[name="user_nip"]').val(ui.item.user_nip);
                   $('[name="unit_hris"]').val(ui.item.unit_hris); 
                   $('[name="jabatan_hris"]').val(ui.item.jabatan_hris);
                   $('[name="kelas_jabatan"]').val(ui.item.kelas_jabatan);
            }
            });
        });
    </script>
