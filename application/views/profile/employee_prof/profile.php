        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">              
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header">Record Information Summary</h1>
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        My Information
                                    </div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
<!-- alert for success data -->
<?php if (!empty($alertsucc)) { ?>
    <div class="alert alert-success fade in" id="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $alertsucc; ?>
    </div>
<?php } ?>

<!-- form -->
<?php foreach ($datainfo as $info) { ?>
    <form class="form-horizontal"  action="edit_employee" method="POST" >
       <div class="page-header"><h3>Profile</h3></div>
        <div class="form-group"> 
            <label class="col-sm-2 control-label">First Name: </label>
            <div class="col-sm-6">
                <p class="form-control-static"><?php echo $info->firstname; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Last Name: </label>
            <div class="col-sm-6">
               <p class="form-control-static"><?php echo $info->lastname; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" >Birthday: </label>
            <div class="col-sm-6">
               <p class="form-control-static"><?php echo $info->birthday; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Address: </label>
            <div class="col-sm-6">
               <p class="form-control-static"><?php echo $info->address; ?></p>
            </div>
        </div>
        
        <div class="form-group">
        <label class="col-sm-2 control-label" >Salary: </label>
            <div class="col-sm-6">
                <p class="form-control-static"><?php echo $info->salary; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email: </label>
            <div class="col-sm-6">
               <p class="form-control-static"><?php echo $info->email; ?></p>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label class="col-sm-2 control-label">Username: </label>
            <div class="col-sm-6">
               <p class="form-control-static"><?php echo $info->username; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password: </label>
            <div class="col-sm-6">
               <p class="form-control-static"><?php $info->password; echo "*********"; ?></p>
            </div>
        </div>
    </form>
    <!-- end of form -->
<?php } ?>   
<hr>
   <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <small>
    <?php echo anchor('dataemployeefuncont/profile_edit/', 'Click Here ') ?>to edit your information.
</small>
</label>
</div> 

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