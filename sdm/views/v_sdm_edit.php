<section class="content-header">
    <h1>
      Sumber Daya Manusia
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh admin P2L</li>
    </ol>
</section>

<!--section class="content">
    <div class="box">
    	<div class="box-header">
    		<h3 class="box-title col-md-4 col-md-offset-4"><?=ucfirst($page)?> Pimpinan Unit</h3>
    		<div class="pull-right">
    			<a href="<?=site_url('sdm/d_sdm')?>" class="btn btn-warning btn-flat">
    				<i class="fa fa-undo"></i>Kembali
    			</a>
    		</div>
    	</div>
    	<div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php//echo validation_errors(); ?>
                    <form action="<?=site_url('sdm/d_sdm/process')?>" method="post">
                        <div class="form-group">
                            <label>Nama Lengkap *</label>
                            <input type="hidden" name="id" value="<?=$row->id_sdm?>">
                            <input type="text" value="<?=$row->nama?>" name="fullname" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label>NIP/NIU *</label>
                            <input type="number" value="<?=$row->nip?>" name="nip" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Satuan Kerja *</label>
                            <select name="satker" class="form-control" required>
                                <option value=""> - Pilih - </option>
                                <?php foreach($satker->result() as $key => $data) { ?>
                                    <option value="<?=$data->id_satker?>"><?=$data->nama_satker?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Fungsi Kerja*</label>
                            <select name="fungsi" class="form-control" required>
                                <option value=""> - Pilih - </option>
                                <?php foreach($fungsi->result() as $key => $data) { ?>
                                    <option value="<?=$data->id_fungsi?>"><?=$data->nama_fungsi?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>Unit Kerja *</label>
                            <select name="unit" class="form-control" required>
                                <option value=""> - Pilih - </option>
                                <?php foreach($unit->result() as $key => $data) { ?>
                                    <option value="<?=$data->id_unit?>"><?=$data->nama_unit?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>e_mail *</label>
                            <input type="text" value="<?=$row->email?>" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>alamat_ </label>
                            <textarea name="address" class="form-control" required><?=$row->alamat_?></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-refresh"></i> Reset</button>

                        </div>
                    </form>
                </div>
    		</div>
    	</div>
    </div>

</section-->
<section class="content">
  <div class="box">
        <div class="panel-heading">
        <span class="panel-title"><b><?=ucfirst($page)?> Pimpinan Unit</b></span>
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
                    Nama Lengkap*             
                </label> 
                <div class="col-sm-8">
                    <input type="hidden" name="id" value="<?=$row->id_sdm?>">
                    <input type="text" value="<?=$row->nama?>" name="fullname" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    NIP/NIU* :
                </label>
                <div class="col-sm-8">
                    <input type="number" value="<?=$row->nip?>" name="nip" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Satuan Kerja* :
                </label>
                <div class="col-sm-8">
                    <select name="satker" class="form-control" required>
                        <option value=""> - Pilih - </option>
                        <?php foreach($satker->result() as $key => $data) { ?>
                        <option value="<?=$data->id_satker?>"><?=$data->nama_satker?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Fungsi Kerja* :
                </label>
                <div class="col-sm-8">
                    <select name="fungsi" class="form-control" required>
                        <option value=""> - Pilih - </option>
                        <?php foreach($fungsi->result() as $key => $data) { ?>
                        <option value="<?=$data->id_fungsi?>"><?=$data->nama_fungsi?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Unit Kerja* :
                </label>
                <div class="col-sm-8">
                    <select name="unit" class="form-control" required>
                        <option value=""> - Pilih - </option>
                        <?php foreach($unit->result() as $key => $data) { ?>
                        <option value="<?=$data->id_unit?>"><?=$data->nama_unit?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    E-mail*:
                </label>
                <div class="col-sm-8">
                    <input type="text" value="<?=$row->e_mail?>" name="email" class="form-control" required>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Alamat :
                </label>
                <div class="col-sm-8">
                    <textarea name="address" class="form-control" required><?=$row->alamat_?></textarea>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4" >
                <button type="submit" name="<?=$page?>" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-refresh"></i> Reset</button>
                <a href="<?=site_url('sdm/d_sdm')?>" class="btn btn-flat btn-warning">
                    <span class="icon fa fa-undo"></span> Kembali
                </a>&nbsp;&nbsp;
            </div>
          </form>
      </div>
  </div>
</section>


