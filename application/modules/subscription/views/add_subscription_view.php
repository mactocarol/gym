<?php echo $this->load->view('header');?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add Subscription</h4>
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
                        <h3 class="box-title m-b-0"><a href="<?php echo site_url('subscription'); ?>" class="btn btn-info"> <i class="fa fa-list"></i> List Subscription</a></h3>
                        <br>
                        <div class="panel panel-info">
                            <div class="panel-heading"> </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form id="subscriptionform" action="<?php echo site_url('subscription/add'); ?>" method="post" class="form-material form-horizontal">
                                        <div class="form-body">
                                            <h3 class="box-title">Subscription Info</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group selectclient">
                                                        <label class="col-md-12">Client</label>
                                                        <div class="col-md-12">
                                                            <select name="customer_id" id="customer_id" class="form-control select2" required>
                                                                <option value="">Select Client</option>
                                                                <optgroup label="Client Name">
                                                                    <?php foreach($customers as $row) { ?>
                                                                        <option value="<?=$row['id']?>"><?=$row['f_name'].' '.$row['l_name']?></option>
                                                                    <?php } ?>                                                                    
                                                                </optgroup>
                                                            </select>
                                                            <small class="help-block selectclienterror" style="display: none;">Please select client</small>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group selectmembership">
                                                        <label class="col-md-12">Membership</label>
                                                        <div class="col-md-12">
                                                            <select id="membership_id" name="membership_id" class="form-control select2" onclick="getPrice(this.value);">
                                                                <option value="">Select Membership Plan</option>
                                                                <optgroup label="Membership Plans">
                                                                    <?php foreach($memberships as $row) { ?>
                                                                        <option value="<?=$row['id']?>"><?=$row['name']?></option>
                                                                    <?php } ?>                                                                    
                                                                </optgroup>
                                                            </select>
                                                            <small class="help-block selectmembershiperror" style="display: none;">Please select membership</small>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group selectcost">
                                                        <label class="col-md-12">Membership Cost </label>
                                                        <div class="col-md-12">
                                                            <input type="text" id="cost" name="cost" class="form-control" placeholder="Membership Cost">
                                                            <small class="help-block selectcosterror" style="display: none;">Please enter membership cost</small>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group selectamount">
                                                        <label class="col-md-12">Amount To Be Paid </label>
                                                        <div class="col-md-12">
                                                            <input type="text" id="amount" name="amount" class="form-control" placeholder="Amount To Be Paid" onkeyup="calculateDiscount(this.value);">
                                                            <small class="help-block selectamounterror" style="display: none;">Please enter amount to be paid</small>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="col-md-12">Discount </label>
                                                        <div class="col-md-12">
                                                            <input type="text" id="discount" name="discount" class="form-control" placeholder="Discount" onkeyup="calculateAmount(this.value);">                                                            
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group selectregisterdate">
                                                        <label class="col-md-12">Registration Date</label>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input type="text" id="register_date" name="register_date" class="form-control mydatepicker" placeholder="dd-mm-yyyy" autocomplete="off" readonly>
                                                                <span class="input-group-addon"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <small class="help-block selectregisterdateerror" style="display: none;">Please enter registration date</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group selectstartdate">
                                                        <label class="col-md-12">Customer is going to come from?</label>
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input type="text" id="start_date" name="start_date" class="form-control mydatepicker" placeholder="dd-mm-yyyy" autocomplete="off" readonly>
                                                                <span class="input-group-addon"><i class="icon-calender"></i></span>
                                                            </div>
                                                            <small class="help-block selectstartdateerror" style="display: none;">Please enter joining date</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/row-->                                            
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="col-md-12">Remarks (Optional)</label>
                                                        <div class="col-md-12">
                                                            <input type="text" name="remarks" class="form-control" placeholder="remarks, if any">
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
                                                            <button type="submit" id="add_btn" class="btn btn-success">Add</button>
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
<style type="text/css">
#select2Form .form-control-feedback {
    /* To make the feedback icon visible */
    z-index: 100;
}
</style>
<script src="<?php echo base_url('front/js');?>/bootstrapValidator.min.js"></script>
    <script>
        $(document).ready(function() {            
            
        $('#subscriptionform')
        .on('click', function(e,data){
                e.preventDefault(); // don't send form (demo only)
                $('#add_btn').attr('disabled',true);
                if($('#customer_id').val() == ''){
                    $('.selectclient').addClass('has-error');
                    $('.selectclienterror').show();
                    return false;
                }
                $('.selectclient').removeClass('has-error');
                $('.selectclienterror').hide();
                
                
                if($('#membership_id').val() == ''){
                    $('.selectmembership').addClass('has-error');
                    $('.selectmembershiperror').show();
                    return false;
                }
                $('.selectmembership').removeClass('has-error');
                $('.selectmembershiperror').hide();
                
                if($('#cost').val() == ''){                    
                    return false;
                }
                $('.selectcost').removeClass('has-error');
                $('.selectcosterror').hide();
                
                if($('#amount').val() == ''){                   
                    return false;
                }
                $('.selectamount').removeClass('has-error');
                $('.selectamounterror').hide();
                                
                
                if($('#register_date').val() == ''){
                    $('.selectregisterdate').addClass('has-error');
                    $('.selectregisterdateerror').show();
                    return false;
                }
                $('.selectregisterdate').removeClass('has-error');
                $('.selectregisterdateerror').hide();
                
                if($('#start_date').val() == ''){
                    $('.selectstartdate').addClass('has-error');
                    $('.selectstartdateerror').show();
                    return false;
                }
                $('.selectstartdate').removeClass('has-error');
                $('.selectstartdateerror').hide();
                //alert();
                $('#add_btn').attr('disabled',false);
                
                $('#add_btn').click(function(){            
                    //alert();
                    $('#subscriptionform').submit();
                });
        })
        
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
    
    function isNumberValid(value)
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
    
    <script>
        jQuery('.mydatepicker, #datepicker').datepicker({
            todayHighlight: true,
            autoclose: true,
            format: 'dd-mm-yyyy'                                
        }).on("change", function() {            
        });
        
    </script>
   
    <script>
        function getPrice(id){
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('subscription/getMembership');?>',
                data: {'id':id},
                datatype:'json',
                success: function (response) {                    
                    $('.selectmembership').removeClass('has-error');
                    $('.selectmembershiperror').hide();
                    var obj = JSON.parse(response);
                    $('#cost').val(obj.price);            
                }
          });
        }
        
        function calculateDiscount(amount){
            var cost = $('#cost').val();
            if(cost){
                var discount = cost - amount;
                $('#discount').val(discount);   
            }            
        }
        
        function calculateAmount(discount){
            var cost = $('#cost').val();
            if(cost){
                var amount = cost - discount;
                $('#amount').val(amount);   
            }            
        }
    </script>