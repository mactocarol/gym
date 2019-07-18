<?php echo $this->load->view('header'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Mark Attendance</h4>
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
               
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            
                            <p class="text-muted m-b-30"><?=($title)?$title:''?></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Customer</th>
                                            <th></th>
                                            <th>Check-in</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($customers as $row){?>
                                        <tr>
                                            <td><?=$i++?></td>                                            
                                            <td>
                                            <?=$row['f_name'].' '.$row['l_name']?>
                                             <br>(<?php echo ($row['age']) ? $row['age'] : ''; ?>)
                                             <br>Member Since (<?php echo ($row['created_at']) ? date('d M Y',strtotime($row['created_at'])) : ''; ?>)
                                            </td>
                                            <td>
                                                <i class="fa fa-clock-o"></i>
                                                Check-in
                                                <br> <h1><?php echo getCustomerAttendanceCount($row['id']); ?></h1>
                                            </td>
                                            <td><a onclick="setcustomer(<?=$row['id']?>);" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-success">Check-in</a></td>
                                        </tr>
                                        <?php } ?>                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                                        
                </div>
                <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->
            <?php echo $this->load->view('footer-text'); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    <?php echo $this->load->view('footer'); ?>
    <!-- end - This is for export functionality only -->
    <!-- sample modal content -->
    <!-- sample modal content -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Check-in</h4>
                </div>                
                    <form id="markform" method="post" action="<?php echo site_url('attendance/mark');?>">                        
                        
                        <div class="modal-body">
                            <h4>Select Time</h4>
                             <div class="input-group">
                                <input type="text" name="date" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                <span class="input-group-addon"><i class="icon-calender"></i></span>
                            </div>
                            <br> 
                            <div class="input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
                                <input type="text" name="time" class="form-control" value="09:30">
                                <span class="input-group-addon"> <span class="glyphicon glyphicon-time"></span> </span>
                            </div>
                            <input type="hidden" name="customer_id"  id="customer_id">
                            <div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                        <script>
                            jQuery('.mydatepicker, #datepicker').datepicker({ todayHighlight: true, autoclose: true });                            
                        </script>
                        <script>
                            $('.clockpicker').clockpicker({
                                donetext: 'Done',
                    
                            })
                            .on("change", function(){
                                console.log(this.value);
                            });
                        </script>
                        
                        <style>
                            .popover{
                                z-index: 1111;
                            }


                        </style>
                                
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;

                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                }
            });

            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    
    <script>
        function setcustomer(id){
            $('#customer_id').val(id);
        }
    </script>
        
    <script>
        $(document).ready(function() {        
            
        });
        
    </script>