<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Autocomplete</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Search</h2>
        </div>
        <div class="row">
            <form id="form_search" action="<?php echo site_url('pimpinan/d_pimpinan/search_autocomplete');?>" method="GET">
                 <div class="input-group">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" style="width:500px;">
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="submit">Search</button>
                    </span>
                 </div>
            </form>
        </div>
    </div>
 

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
 
            $('#title').autocomplete({
                source: "<?php echo site_url('pimpinan/d_pimpinan/get_autocomplete');?>",
      
                select: function (event, ui) {
                    $(this).val(ui.item.label);
                    $("#form_search").submit(); 
                }
            });
 
        });
    </script>
 
</body>
</html>