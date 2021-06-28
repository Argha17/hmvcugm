<?php //echo $this->breadcrump();   ?>

<div class="panel">
    <div class="panel-body">
        <form method="post" rel="ajax" action="<?php echo site_url('ugmfw/user/update_user'); ?>" class="form-horizontal xhr dest_subcontent-element">

            <input name="iduser" type="hidden" value='<?php echo $content->iduser; ?>'/>

            <div class="form-group">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    fname
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-5">
                    <input class="form-control" name="fname" type="text" value='<?php echo $content->fname; ?>'/>
                    <p class="help-block" id='help-username'></p>
                    <?php echo form_error('fname', '<p class="help-block" style="color:red;"><i>', '</i></p>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    lname
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-5">
                    <input class="form-control" name="lname" type="text" value='<?php echo $content->lname; ?>'/>
                    <p class="help-block" id='help-username'></p>
                    <?php echo form_error('fname', '<p class="help-block" style="color:red;"><i>', '</i></p>'); ?>
                </div>
            </div>


            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Email
                </label>
                <div class="col-sm-4">
                    <input class="form-control" name="email" type="email" value='<?php echo $content->email; ?>' required='required'/>
                    <?php echo form_error('email', '<p class="help-block" style="color:red;"><i>', '</i></p>'); ?>
                </div>
            </div>


            <div class="form-group form-hide">
                <label class="col-sm-12 control-label" style='text-align:left;'>
                    <h3><i class="fa fa-lock"></i> Ganti Password</h3>
                </label>
            </div>

            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Password Baru
                </label>
                <div class="col-sm-3">
                    <input class="form-control" name="user_password" type="password"/>
                    <?php echo form_error('user_password', '<p class="help-block" style="color:red;"><i>', '</i></p>'); ?>
                </div>
            </div>
            <div class="form-group form-hide">
                <label class="col-sm-2 control-label" style='text-align:left;'>
                    Re-type Password Baru
                </label>
                <div class="col-sm-3">
                    <input class="form-control form-reset" name="retype_user_password" type="password"/>
                    <?php echo form_error('retype_user_password', '<p class="help-block" style="color:red;"><i>', '</i></p>'); ?>
                </div>
            </div>
            <hr class="panel-wide"/>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="<?php echo site_url('ugmfw/user'); ?>" class="btn btn-labeled btn-warning xhr dest_subcontent-element">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
<link href="<?php echo base_url(); ?>ugmfw-assets/stylesheets/pixel-admin.min.css" rel="stylesheet" type="text/css" />
<script>
    $(document).ready(function() {
        $("#select2-multiple").select2({
            allowClear: true
        });

        $("select[name='unit_kerja_kode']").select2({
            allowClear: true,
            placeholder: "Unit Kerja"
        });

        //on document load
        var selected_value = $("input[name='is_sso']:checked").val();
        show_hide_element(selected_value, false);

        //on change
        $('#my_radio_box').change(function() {
            var selected_value = $("input[name='is_sso']:checked").val();
            show_hide_element(selected_value, true);
        });
    });

    function show_hide_element(selected, sta) {
        if (selected == 0) {
            $('#help-username').text('');
            $('.form-hide').fadeIn();
        } else {
            $('#help-username').html('<i class="fa fa-info-circle"></i> masukkan email ugm tanpa @ugm.ac.id / @mail.ugm.ac.id');
            $('.form-hide').hide();
        }
    }
</script>