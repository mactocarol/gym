<?php echo $this->load->view('header');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Mybusiness</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">                        
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('user');?>">Home</a></li>
                            <li class="active"><?=($title)?$title:''?></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php
                // display error & success messages
                if(isset($message)) {					
                    if($success){
                    ?>
                      <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?php print_r($message); ?>
                      </div>						
                    <?php
                    }else{
                    ?>
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!</strong> <?php print_r($message); ?>
                        </div>						
                    <?php
                    }
                }
                ?>
                <!--.row-->
                <div class="row">
                    <div class="col-md-12">                                                
                        <div class="panel panel-info">
                            <div class="panel-heading"> </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form id="mybusinessform" action="<?php echo site_url('mybusiness'); ?>" method="post" class="form-horizontal">
                                        <div class="form-body">
                                            <h3 class="box-title">Details</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">GYM Title</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="title" name="title" class="form-control" placeholder="GYM Title" value="<?php echo ($mybusiness) ? $mybusiness->title : '';?>">                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Owner / Incharge 1</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="owner1" class="form-control" placeholder="Owner / Incharge 1" value="<?php echo ($mybusiness) ? $mybusiness->owner1 : '';?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Owner / Incharge 2</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="owner2" class="form-control" placeholder="Owner / Incharge 2" value="<?php echo ($mybusiness) ? $mybusiness->owner2 : '';?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Contact 1</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="contact" class="form-control" placeholder="Contact Number" value="<?php echo ($mybusiness) ? $mybusiness->contact : '';?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Contact 2</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="alternate" class="form-control" placeholder="Alternate Number" value="<?php echo ($mybusiness) ? $mybusiness->alternate : '';?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <h3 class="box-title">More Info</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-9">
                                                            <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo ($mybusiness) ? $mybusiness->email : '';?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Address</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo ($mybusiness) ? $mybusiness->address : '';?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Website (if any)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo ($mybusiness) ? $mybusiness->website : '';?>">
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <!--/span-->
                                            </div>
                                            <!--/row-->                                            
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                            <button type="reset" class="btn btn-default">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--./row-->                                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <?php echo $this->load->view('footer-text'); ?>
    </div>
    <!-- /#wrapper -->
<?php echo $this->load->view('footer'); ?>
<!--35.246.165.245-->
<script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>
    <script>
        $(document).ready(function() {        
        $('#mybusinessform').bootstrapValidator({            
            
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message : 'The Gym Title Field is required'
                        },                         
                         
                        stringLength: {
                            min: 2 ,
                            max: 15,
                            message: 'The Gym Title length min 2 and max 15 character Long'
                        }
                    },
                },                
                email: {
                    validators: {
                        notEmpty: {
                            message : 'The email Field is required'
                        },
                        
                         message: 'This email is already in use.'     
                         }
                    },
                },    
                
                password: {
                    validators: {
                        notEmpty: {
                            message : 'The password Field is required'
                        },
                        identical: {
                            field: 'repassword',
                            message: 'The password and its confirm are not the same'
                        },
                        stringLength: {
                            min: 6 ,
                            max: 15,
                            message: 'The password length min 6 and max 15 character Long'
                        }
                    }
                },
                confirm_password: {
                    validators: {
                        notEmpty: {
                            message : 'The password Field is required'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                        
                    }
                },
            });
        });
        
        
    function isUsernameValid(value)
    {
      var fieldNum = /^[a-z0-9]+$/i;
    
      if ((value.match(fieldNum))) {
          return true
      }
      else
      {
          return false
      }
    
    }
    </script>