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
                                <?php  
                                echo anchor("dataadminfunctioncont/profile","My Information");
                                ?> > Edit Information
                            </div>
                                <!-- /.panel-body -->
                            <div class="panel-body">
                                    <!-- form -->
                                    <?php foreach ($datainfo as $info) { ?>
                                    <form class="form-horizontal"  action="profile_edit" method="POST" >
                                    <!-- alert for success data -->
                                    <?php if (!empty($alertsucc)) { ?>
                                        <div class="alert alert-danger fade in" id="alert">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <?php echo $alertsucc; ?>
                                        </div>
                                    <?php } ?>
                                    <!-- profile heading -->
                                    <div class="page-header"><h3>Profile</h3></div>
                                    <!-- hidden id row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="id_employee" id="focusedInput" type="hidden" value="<?php echo $info->id_employee; ?>" >
                                        </div>
                                    </div>
                                    <!-- first name row -->
                                    <div class="form-group"> 
                                        <label class="col-sm-2 control-label">First Name: </label>
                                        <div class="col-sm-6">
                                           <input class="form-control" name="firstname" id="firstname" type="text" value="<?php echo $info->firstname; ?>" required>
                                        </div>
                                        <!-- To Display IF Firstname Did Not Meet the Rules -->
                                        <?php if(isset($_POST['submit'])){ 
                                                    $err=form_error('firstname');
                                                    if(!empty($err)) { ?>
                                            <div class="col-sm-4">
                                                <div class="alert alert-danger fade in" id="error-alert1" >
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <?php  echo $err; ?>
                                                </div>
                                            </div>
                                        <?php } else {} } ?>
                                        <!-- End of alert -->
                                    </div>
                                    <!-- last name row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Last Name: </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="lastname" type="text" value="<?php echo $info->lastname; ?>" required>
                                        </div>
                                         <!-- To Display IF Lastname Did Not Meet the Rules -->
                                        <?php if(isset($_POST['submit'])){ 
                                                    $err=form_error('lastname');
                                                    if(!empty($err)) { ?>
                                            <div class="col-sm-4">
                                                <div class="alert alert-danger fade in" id="error-alert1">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <?php  echo $err; ?>
                                                </div>
                                            </div>
                                        <?php } else {} } ?>
                                        <!-- End of alert -->
                                    </div>
                                    <!-- birthday row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" >Birthday: </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="birthday" type="date" value="<?php echo $info->birthday; ?>" required>
                                        </div>
                                        <!-- To Display IF Birthday Did Not Meet the Rules -->
                                        <?php if(isset($_POST['submit'])){ 
                                                    $err=form_error('birthday');
                                                    if(!empty($err)) { ?>
                                            <div class="col-sm-4">
                                                <div class="alert alert-danger fade in" id="error-alert1">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <?php  echo $err; ?>
                                                </div>
                                            </div>
                                        <?php } else {} } ?>
                                        <!-- End of alert -->
                                    </div>
                                    <!-- address row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Address: </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="address" type="text" value="<?php echo $info->address; ?>" required>
                                        </div>
                                            <!-- To Display IF Address Did Not Meet the Rules -->
                                            <?php if(isset($_POST['submit'])){ 
                                                        $err=form_error('address');
                                                        if(!empty($err)) {
                                            ?>
                                            <div class="col-sm-4">
                                                <div class="alert alert-danger fade in" id="error-alert1">
                                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                    <?php  echo $err; ?>
                                                </div>
                                            </div>
                                            <?php } else {} } ?>
                                            <!-- End of alert -->
                                    </div>
                                    <!-- salary row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" >Salary: </label>
                                        <div class="col-sm-6">
                                            <?php 
                                                $options = array(
                                                        '0'         => '₱ 0',
                                                        '10000'         => '₱ 10,000',
                                                        '12000'           => '₱ 12,000',
                                                        '14000'         => '₱ 14,000',
                                                        '16000'        => '₱ 16,000',
                                                );
                                                echo form_dropdown('salary', $options, $info->salary,"class='form-control' disabled=disabled");
                                            ?>
                                        </div>
                                    </div>
                                    <!-- email row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email: </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="eg. example@example.com" value="<?php echo $info->email; ?>" required>
                                        </div>
                                        <!-- To Display IF Email Did Not Meet the Rules -->
                                        <?php if(isset($_POST['submit'])){ 
                                                    $err=form_error('email');
                                                    if(!empty($err)) {
                                        ?>
                                        <div class="col-sm-4">
                                            <div class="alert alert-danger fade in" id="error-alert1">
                                                <button type="button" class="close" data-dismiss="alert">&times; </button>
                                                <?php  echo $err; ?>
                                            </div>
                                        </div>
                                        <?php } else {} } ?>
                                        <!-- End of alert -->
                                    </div>
                                    <hr>
                                    <!-- username row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Username: </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="username"  type="text" pattern=".{6,}" title="Must contain 5 or more characters" value="<?php echo $info->username; ?>" required>
                                        </div>
                                        <!-- To Display IF Username Did Not Meet the Rules -->
                                        <?php if(isset($_POST['submit'])){ 
                                                    $err=form_error('username');
                                                    if(!empty($err)) {
                                        ?>
                                        <div class="col-sm-4">
                                            <div class="alert alert-danger fade in" id="error-alert1">
                                                <button type="button" class="close" data-dismiss="alert">&times; </button>
                                                <?php  echo $err; ?>
                                            </div>
                                        </div>
                                        <?php } else {} } ?>
                                        <!-- End of alert -->
                                    </div>
                                    <!-- password row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Password: </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="password" id="password" type="password" value="<?php echo $info->password; ?>" required>
                                        </div>
                                        <!-- To Display IF Password Did Not Meet the Rules -->
                                        <?php if(isset($_POST['submit'])){ 
                                                    $err=form_error('password');
                                                    if(!empty($err)) {
                                        ?>
                                        <div class="col-sm-4">
                                            <div class="alert alert-danger fade in" id="error-alert1">
                                                <button type="button" class="close" data-dismiss="alert">&times; </button>
                                                <?php  echo $err; ?>
                                            </div>
                                        </div>
                                        <?php } else {} } ?>
                                        <!-- End of alert -->
                                    </div>
                                    <!-- confirm password row -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">*Confirm Password: </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="confirmpassword" id="confirmpassword" type="password" value="<?php echo $info->password; ?>" required>
                                        </div>
                                        <!-- To Display IF Confirm Password Did Not Meet the Rules -->
                                        <?php if(isset($_POST['submit'])){ 
                                                    $err=form_error('confirmpassword');
                                                    if(!empty($err)) {
                                        ?>
                                        <div class="col-sm-4">
                                            <div class="alert alert-danger fade in" id="error-alert1">
                                                <button type="button" class="close" data-dismiss="alert">&times; </button>
                                                <?php  echo $err; ?>
                                            </div>
                                        </div>
                                        <?php } else {} } ?>
                                    </div>
                                    <!-- submit bottom -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-2">
                                            <button name="submit" id="btnsubmit" type="submit" class="btn btn-primary btn-block btn-lr">
                                                Update My Profile
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- return to profile anchor -->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"></label>
                                        <label class="col-sm-2 control-label">
                                            <small>
                                                <?php echo anchor('dataadminfunctioncont/profile/', 'Go back safely!') ?>
                                            </small>
                                        </label>
                                        <br><br>
                                    </div> 
                                    </form>
                                    <!-- end of form -->
                                    <?php } ?>
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
<script type="text/javascript">
//to hide alerts fadely 
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(700, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>
<script type="application/javascript">
// onlick function to clear value on password and confirm password -------------
$("#password").on("click", function() {
    if ($(this).val() == "<?php echo $datainfo[0]->password; ?>")
        $(this).val("")
});
 $("#confirmpassword").on("click", function() {
    if ($(this).val() == "<?php echo $datainfo[0]->password; ?>")
        $(this).val("")
});
</script>