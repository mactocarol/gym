<?php echo $this->load->view('header'); ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Membership Plans</h4>
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
                            <h3 class="box-title m-b-0"><a href="<?php echo site_url('membership/add'); ?>" class="btn btn-info"> <i class="fa fa-plus"></i> Add New Membership Plan</a></h3>
                            <p class="text-muted m-b-30"><?=($title)?$title:''?></p>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped color-table info-table">
                                    <thead>
                                        <tr>                                            
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Status</th>                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach($memberships as $row){?>
                                        <tr>                                            
                                            <td><?php echo ($row['name']) ? $row['name'] : ''; ?></td>
                                            <td><?php echo ($row['price']) ? $row['price'].' '.$row['currency'] : ''; ?></td>
                                            <td><?php echo ($row['duration']) ? $row['duration'] : ''; ?></td>
                                            <td><?php echo ($row['status'] == 1) ? '<button type="button" class="btn btn-info btn-circle"><i class="fa fa-check"></i> </button>' : '<button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i> </button>'; ?></td>                                            
                                            <td>
                                                <a href="<?php echo site_url('membership/edit/'.base64_encode($row['id'])); ?>"> <i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo site_url('membership/delete/'.base64_encode($row['id'])); ?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"> <i class="fa fa-trash"></i></a>
                                            </td>
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
    
    
