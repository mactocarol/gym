 <!-- Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets');?>/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    
    <script src="<?php echo base_url('assets');?>/bower_components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('assets');?>/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('assets');?>/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?php echo base_url('assets');?>/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/counterup/jquery.counterup.min.js"></script>
    
    <?php if($field == 'Dashboard'){?>
    <!--Morris JavaScript -->
    <script src="<?php echo base_url('assets');?>/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/morrisjs/morris.js"></script>
    <script src="<?php echo base_url('assets');?>/js/dashboard1.js"></script>
    <?php } ?>
    
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('assets');?>/js/custom.min.js"></script>
    
    
    
    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo base_url('assets');?>/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to GYM Software',
            text: 'Manage your customers in an easiest way.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,

            stack: 6
        })
    });
    </script>
    
    <?php if($field == 'Add'){?>
    <script src="<?php echo base_url('assets');?>/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url('assets');?>/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script>
    jQuery(document).ready(function() {
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());

        });
        // For select 2

        $(".select2").select2();
        $('.selectpicker').selectpicker();

        //Bootstrap-TouchSpin
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
        var vspinTrue = $(".vertical-spin").TouchSpin({
            verticalbuttons: true
        });
        if (vspinTrue) {
            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
        }

        $("input[name='tch1']").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%'
        });
        $("input[name='tch2']").TouchSpin({
            min: -1000000000,
            max: 1000000000,
            stepinterval: 50,
            maxboostedstep: 10000000,
            prefix: '$'
        });
        $("input[name='tch3']").TouchSpin();

        $("input[name='tch3_22']").TouchSpin({
            initval: 40
        });

        $("input[name='tch5']").TouchSpin({
            prefix: "pre",
            postfix: "post"
        });

        // For multiselect

        $('#pre-selected-options').multiSelect();
        $('#optgroup').multiSelect({
            selectableOptgroup: true
        });

        $('#public-methods').multiSelect();
        $('#select-all').click(function() {
            $('#public-methods').multiSelect('select_all');
            return false;
        });
        $('#deselect-all').click(function() {
            $('#public-methods').multiSelect('deselect_all');
            return false;
        });
        $('#refresh').on('click', function() {
            $('#public-methods').multiSelect('refresh');
            return false;
        });
        $('#add-option').on('click', function() {
            $('#public-methods').multiSelect('addOption', {
                value: 42,
                text: 'test 42',
                index: 0
            });
            return false;
        });

    });
    </script>        
    <?php } ?>
    
    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url('assets');?>/bower_components/moment/moment.js"></script>
    <script src="<?php echo base_url('assets');?>/bower_components/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url('assets');?>/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    
    <!--Style Switcher -->
    <script src="<?php echo base_url('assets');?>/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>