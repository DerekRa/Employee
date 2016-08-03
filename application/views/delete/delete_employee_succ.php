        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">              
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Delete Employee Info</h1>
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php  
                                        echo anchor("dataadminfunctioncont/employee_tablefix/0","All Employees Query");
                                        ?> > Edit Information
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
<br>
<!-- alert for success data -->
<?php if (!empty($alertsucc)) { ?>
    <div class="alert alert-success fade in" id="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $alertsucc; ?>
    </div>
<?php } ?>
<p><strong>You have successfully deleted the record!</strong>
<?php 
$idd = $this->session->flashdata('id');
$num = $idd; $numm = 4; $nums = 3;
if ($num==1) {
    $ans = $num - $nums;
} else {
    $ans = $num - $numm;
}
?>
</p>
<hr>

<small>
    <?php echo anchor('dataadminfunctioncont/employee_tablefix/'.$ans, 'Go back safely!') ?>
</small>



                                                </br>
                                                </br>
                                        <div class="dataTable_wrapper">
                                     
                                             <?php  ?>  

                                        </div>

                                    </div>
                                    <!-- /.panel-body -->
                                </div><a href="#menu-toggle" class="btn btn-default btn-circle" id="menu-toggle">Menu</a>

                             <!-- /.panel -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(700, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>