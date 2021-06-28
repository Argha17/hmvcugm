<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Search Result</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
    <!--div class="container">
        <div class="row">
            <h2>Search Result</h2>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data as $row):?>
                    <tr>
                        <td><?php echo $row->blog_title;?></td>
                        <td><?php echo $row->blog_description;?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div-->
 
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
                        <th class="text-center">Satuan Kerja</th>
                        <th class="text-center">Status</th>
                        
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
                      <td><a href="<?=site_url('sdm/d_sdm/detail/'.$data->id_penugasan)?>"><?php echo $data->nama_petugas?></td>
                      <td><?php echo $data->fungsi?></td>
                      <td><?php echo $data->jabatan?></td>
                      <td><?php echo $data->satuankerja?></td>
                      <td><?php echo $data->status?></td>
                    </tr>
                    <?php  
                    }  ?>
                </tbody>
            </table>
        </div>
    </div>
  </div>

    <script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
 
</body>
</html>