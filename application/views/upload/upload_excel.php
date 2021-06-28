<html>
    <head>
        <meta charset="utf-8">
        <title>Student List</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/jquery.dataTables.css' ?>">
         <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>
        <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"></script>
    </head>
    <body>
        <div class="container">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-12">        
                    <h2 class="panel_heading_style">Excel File Upload</h2>   
                     
                    <div class="table-responsive">
                         <?php

                        if($status_msg) {
                            echo $status_msg;
                        }
                        ?>
                        <?php if($error) echo '<font color="red">'.$error.'</font>';echo validation_errors('<div class="error">', '</div>');?> 
                 
                        <?php $form_attributes = array('name' => 'bulk_upload', 'id' => 'bulk_upload');echo form_open_multipart("student/bulk_upload", $form_attributes);?>
                        
                        
                
                <table class="table table-striped">
                          <tbody>
                            <tr>
                              <td width="" class="td_heading" style='vertical-align:inherit'>Choose Excel File To Upload:<span class="required">*</span></td>
                              <td width="">
                                  <input name="userfile" type="file" id="xls_file" onchange="validate_trainee_bulk(this)" > 
                                  <span id="xls_file_err"></span>
                              </td>
                              <td width="" style='vertical-align:inherit'><button type="submit" name="upload" id="upload" value="upload" class="btn btn-xs btn-primary no-mar"><span class="glyphicon glyphicon-upload"></span> Upload</button> <span style="font-weight:bold;">(xls or xlsx)</span></td>
                             
                            </tr>
                          </tbody>
                        </table>
                        <?php echo form_close(); ?>      
                    </div>   
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <tr>
                                <?php if($files && $trainee_data){ ?>
                            <td width="20%">
                                           
                                <span class="pull-right"><a href="<?php echo base_url()."trainee/download_import_xls/".$files;?>" class="small_text1">
                              <span class="label label-default black-btn"><span class="glyphicon glyphicon-export"></span> Export to XLS</span></a></span> 
                            </td>
                                <?php } ?>
                        </tr>
                        </table>
                   </div>                                                
      
          
  
            </div>
        </div>
    </body>
</html>



