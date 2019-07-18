<?php echo $this->load->view('header');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Customer</h4>
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
                        <h3 class="box-title m-b-0"><a href="<?php echo site_url('customer'); ?>" class="btn btn-info"> <i class="fa fa-list"></i> List Customer</a></h3>
                        <br>
                        <div class="panel panel-info">
                            <div class="panel-heading"> </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form id="customerform" action="<?php echo site_url('customer/add'); ?>" method="post" class="form-horizontal">
                                        <div class="form-body">
                                            <h3 class="box-title">Person Info</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">First Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="f_name" name="f_name" class="form-control" placeholder="First name">                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Last Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="l_name" name="l_name" class="form-control" placeholder="Last Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Gender</label>
                                                        <div class="col-md-9">
                                                            <select name="gender" class="form-control">
                                                                <option value="1">Male</option>
                                                                <option value="2">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Date of Birth</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="dob" class="form-control" placeholder="dd/mm/yyyy">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Contact</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="contact" class="form-control" placeholder="Contact Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Marital Status</label>
                                                        <div class="col-md-9">
                                                            <div class="radio-list">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="marital_status" value="0" checked=""> Single </label>
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="marital_status" value="1"> Married </label>
                                                            </div>
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
                                                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Address</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="address" class="form-control" placeholder="Address">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Height</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="height" class="form-control" placeholder="5 feet 6 inch">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Weight</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="weight" class="form-control" placeholder="60 KG">
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
                                                            <button type="submit" class="btn btn-success">Add</button>
                                                            <button type="button" class="btn btn-default">Cancel</button>
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
        $('#customerform').bootstrapValidator({            
            
            fields: {
                f_name: {
                    validators: {
                        notEmpty: {
                            message : 'The first name Field is required'
                        },                         
                         callback: {
                            message: 'please enter only letters and numbers',
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
                            message: 'The first name length min 3 and max 15 character Long'
                        }
                    },
                },
                l_name: {
                    validators: {
                        notEmpty: {
                            message : 'The last name Field is required'
                        },                         
                         callback: {
                            message: 'please enter only letters and numbers',
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
                            message: 'The last name length min 3 and max 15 character Long'
                        }
                    },
                },
                dob: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter date of birth'
                        },
                    }
                },
                contact: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter contact number'
                        },
                    }
                },
                terms: {
                    validators: {
                        notEmpty: {
                            message: 'Please accept terms & conditions'
                        },
                    }
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