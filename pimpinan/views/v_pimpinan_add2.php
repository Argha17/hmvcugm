<section class="content-header">
    <h1>
      Tambah Pimpinan Unit
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh admin P2L</li>
    </ol>
</section>


<!--link  rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css">
<link  rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jquery-ui.css"-->
<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"-->


<section class="content">
  <div class="box">
        <div class="panel-heading">
        <span class="panel-title"><b><?=ucfirst($page)?> Pimpinan Unit</b></span>
            <!--div class="panel-heading-controls">
                <a href="<?=site_url('pimpinan/d_pimpinan')?>" class="btn btn-success btn-flat btn-sm btn-labeled btn-warning xhr dest_subcontent-element">
                    <span class="icon fa fa-undo"></span> Kembali
                </a>&nbsp;&nbsp;
          
            </div-->
        </div>

        <div class="panel-body">
          <form class="form-horizontal xhr dest_subcontent-element" action="<?=site_url('pimpinan/d_pimpinan/process')?>" method="post">
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Cari           
                </label> 
                <div class="col-sm-8">
                    <input type="text" id="title"  placeholder="Masukan kata kunci yang dicari" class="form-control" required>
                </div>
            </div>
          

      <!---[AUTOCOMPLET] coding views autocomplete pelaksana data dari tabel ugmfw saja- -->
            <!-- <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Nama Lengkap             
                </label> 
                <div class="col-sm-8">
                    <input type="text"  name="user_nama_lengkap"  class="form-control" readonly>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Username            
                </label> 
                <div class="col-sm-8">
                    <input type="text"  name="user_username"  class="form-control" readonly>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    E-mail            
                </label> 
                <div class="col-sm-8">
                    <input type="text"  name="user_email"  class="form-control" readonly>
                </div>
            </div>

            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    NIP/NPU/NIU :
                </label>
                <div class="col-sm-8">
                    <input type="text" name="user_nip"  class="form-control" readonly >
                </div>
            </div>

             <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Jabatan :
                </label>
                <div class="col-sm-8">
                    <input type="text" id="jabatan" name="jabatan_hris" class="form-control"  readonly>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Eselon :
                </label>
                <div class="col-sm-8">
                    <input type="text"  name="eselon" class="form-control"  readonly>
                </div>
            </div>
             <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Unit Kerja:
                </label>
                <div class="col-sm-8">
                    <input type="text" id="unit" name="unit_hris" class="form-control" readonly>
                </div>
            </div> -->
<!---[AUTOCOMPLETE] coding view autocomplete pelaksana dari tabel staff masuk ke tabel ugmfw--->
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Jabatan :
                </label>
                <div class="col-sm-8">
                    <input type="text"  name="jabatan_non_hris" class="form-control" >
                </div>
            </div>
             <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Nama Lengkap             
                </label> 
                <div class="col-sm-8">
                    <input type="text" name="nama_staff" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    NIP/NPU/NIU :
                </label>
                <div class="col-sm-8">
                    <input type="text" name="nomor" value="0" class="form-control" readonly>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Unit Kerja:
                </label>
                <div class="col-sm-8">
                    <input type="text" name="unit_kerja_DPK"  class="form-control" readonly>
                    <input type="hidden" name="id_unit_hris">
                </div>
            </div>

            <div class="col-md-4 col-md-offset-4" >
                <button type="submit" name="<?=$page?>" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-refresh"></i> Reset</button>
                <a href="<?=site_url('pimpinan/d_pimpinan')?>" class="btn btn-flat btn-warning">
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
                source: "<?php echo site_url('pimpinan/d_pimpinan/get_autocomplete');?>",
                focus: function( event, ui ) {
                  $( "#project" ).val( '<p>'+ui.item.label+'</p>' );
                  return false;
                },
                select: function (event, ui) {

  //--[AUTOCOMPLET] coding views autocomplete pelaksana data dari tabel ugmfw saja--//
                 /*  $('[name="user_nama_lengkap"]').val(ui.item.user_nama_lengkap);
                   $('[name="user_username"]').val(ui.item.user_username); 
                   $('[name="user_email"]').val(ui.item.user_email); 
                   $('[name="user_nip"]').val(ui.item.user_nip);
                   $('[name="unit_hris"]').val(ui.item.unit_hris); 
                   $('[name="jabatan_hris"]').val(ui.item.jabatan_hris);
                   $('[name="eselon"]').val(ui.item.eselon);*/


  //--[AUTOCOMPLETE] coding view autocomplete pelaksana dari tabel staff masuk ke tabel ugmfw--//
                   $('[name="nama_staff"]').val(ui.item.nama_staff);
                   $('[name="unit_kerja_DPK"]').val(ui.item.unit_kerja_DPK);
                   $('[name="id_unit_hris"]').val(ui.item.id_unit_hris);  
                   $('[name="nomor"]').val(ui.item.nomor);
            }
            });
        });
    </script>

     <script type="text/javascript">
        $(document).ready(function(){
            
            $('#jabatan').autocomplete({
                source: "<?php echo site_url('pimpinan/d_pimpinan/get_autocomplete_jabatan');?>",
      
                select: function (event, ui) {
                   $('[name="jabatan"]').val(ui.item.label); 
                   $('[name="nip"]').val(ui.item.nip);
                   $('[name="nama_pimpinan"]').val(ui.item.nama_pimpinan); 
                   $('[name="unit"]').val(ui.item.unit);
            }
            });
        });
    </script>

     <script type="text/javascript">
        $(document).ready(function(){
            
            $('#unit').autocomplete({
                source: "<?php echo site_url('pimpinan/d_pimpinan/get_autocomplete_unit');?>",
      
                select: function (event, ui) {
                   $('[name="unit"]').val(ui.item.label); 
                   $('[name="nip"]').val(ui.item.nip);
                   $('[name="nama_pimpinan"]').val(ui.item.nama_pimpinan); 
                   $('[name="jabatan"]').val(ui.item.jabatan);
            }
            });
        });
    </script>

<!-- $('input[name="id_unit_hris"]').val() -->