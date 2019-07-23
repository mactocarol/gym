<?php echo $this->load->view('header');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Update Membership Plan</h4>
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
                        <h3 class="box-title m-b-0"><a href="<?php echo site_url('membership'); ?>" class="btn btn-info"> <i class="fa fa-list"></i> List Membership</a></h3>
                        <br>
                        <div class="panel panel-info">
                            <div class="panel-heading"> </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form id="membershipform" action="<?php echo site_url('membership/edit/'.base64_encode($membership->id)); ?>" method="post" class="form-horizontal">
                                        <div class="form-body">
                                            <h3 class="box-title">Membership Info</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Membership Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name" name="name" class="form-control" placeholder="Membership name" value="<?php echo ($membership) ? $membership->name : ''; ?>">                                                            
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Membership Price</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="price" name="price" class="form-control" placeholder="Membership price" value="<?php echo ($membership) ? $membership->price : ''; ?>">                                                            
                                                        </div>
                                                    </div>
                                                </div>                                               
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Currency</label>
                                                        <div class="col-md-9">
                                                            <select name="currency" class="form-control">
                                                                <option value="$" <?php echo ($membership && $membership->currency == '$') ? 'selected' : ''; ?>>Dollar</option>
                                                                <option value="GBP" <?php echo ($membership && $membership->currency == 'GBP') ? 'selected' : ''; ?>>GBP</option>
                                                                <option value="INR" <?php echo ($membership && $membership->currency == 'INR') ? 'selected' : ''; ?>>INR</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Membership Duration</label>
                                                        <div class="col-md-9">
                                                            <select name="duration" class="form-control">
                                                                <option value="1 Week" <?php echo ($membership && $membership->duration == '1 Week') ? 'selected' : ''; ?>>1 Week</option>
                                                                <option value="1 Month" <?php echo ($membership && $membership->duration == '1 Month') ? 'selected' : ''; ?>>1 Month</option>
                                                                <option value="3 Months" <?php echo ($membership && $membership->duration == '3 Months') ? 'selected' : ''; ?>>3 Months</option>
                                                                <option value="6 Months" <?php echo ($membership && $membership->duration == '6 Months') ? 'selected' : ''; ?>>6 Months</option>
                                                                <option value="1 Year" <?php echo ($membership && $membership->duration == '1 Year') ? 'selected' : ''; ?>>1 Year</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Membership Details (Optional)</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="details" class="form-control" placeholder="Membership Details" value="<?php echo ($membership) ? $membership->details : ''; ?>">
                                                        </div>
                                                    </div>
                                                </div>                                               
                                            </div>                                                                                                                                  
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
        $('#membershipform').bootstrapValidator({            
            
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message : 'The Plan Name Field is required'
                        },                         
                         callback: {
                            message: 'Please enter only letters and numbers',
                            callback: function(value, validator, $field) {
                                if (!isUsernameValid(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },
                        stringLength: {
                            min: 3 ,
                            max: 15,
                            message: 'The Plan Name length min 3 and max 15 character Long'
                        }
                    },
                },
                price: {
                    validators: {
                        notEmpty: {
                            message : 'The Price Field is required'
                        },                         
                         callback: {
                            message: 'Please enter only numbers',
                            callback: function(value, validator, $field) {
                                if (!isNumber(value)) {
                                  return {
                                    valid: false,
                                  };
                                }
                                else
                                {
                                  return {
                                    valid: true,
                                  };    
                                }
    
                            }
                        },                        
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
    
    function isNumber(value)
    {
      var fieldNum = /^[0-9.]+$/i;
    
      if ((value.match(fieldNum))) {
          return true
      }
      else
      {
          return false
      }
    
    }
    </script>