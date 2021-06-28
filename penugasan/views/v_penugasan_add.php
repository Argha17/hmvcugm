<section class="content-header">
    <h1>
      Penugasan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-users"></i></a></li>
      <li class="active">ditambahkan oleh Pimpinan Unit</li>
    </ol>
</section>

<section class="content">
    <div class="box">
    	<div class="box-header">
    		<h3 class="box-title col-md-4 col-md-offset-4"><?=ucfirst($page)?> Penugas</h3>
    		<div class="pull-right">
    			<a href="<?=site_url('penugasan/d_penugasan')?>" class="btn btn-warning btn-flat">
    				<i class="fa fa-undo"></i>Kembali
    			</a>
    		</div>
    	</div>
    	<div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <?php//echo validation_errors(); ?>
                    <form action="<?=site_url('penugasan/d_penugasan/process')?>" method="post">
                        <div class="form-group">
                            <label>Nama Lengkap *</label>
                            <!--input type="text" value="<?=$row->nama_penugasan?>" name="fullname" class="form-control" required-->
                            <select name="username" class="form-control" required>
                                <option value=""> - Pilih - </option>
                                <?php foreach($penugasan->result() as $key => $data) { ?>
                                    <option value="<?=$data->user_id?>"><?=$data->user_username?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <!--div class="form-group">
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
                        </div-->
                        <div class="form-group">
                            <label>Fungsi Kerja*</label>
                            <select name="fungsi" class="form-control" required>
                                <option value=""> - Pilih - </option>
                                <?php foreach($penugasan->result() as $key => $data) { ?>
                                    <option value="<?=$data->group_menu_id?>"><?=$data->group_menu_nama?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <!--div class="form-group">
                            <label>Unit Kerja *</label>
                            <select name="unit" class="form-control" required>
                                <option value=""> - Pilih - </option>
                                <?php foreach($unit->result() as $key => $data) { ?>
                                    <option value="<?=$data->id_unit?>"><?=$data->nama_unit?></option>
                                <?php } ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label>E-mail *</label>
                            <input type="text" value="<?=$row->email?>" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <textarea name="address" class="form-control" required><?=$row->alamat?></textarea>
                        </div-->
                        <div class="form-group">
                            <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                            <button type="reset" class="btn btn-danger btn-flat"><i class="fa fa-refresh"></i> Reset</button>

                        </div>
                    </form>
                </div>
    		</div>
    	</div>
    </div>

</section>
