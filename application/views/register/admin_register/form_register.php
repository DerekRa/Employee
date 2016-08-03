<!-- alert for success data -->
<?php if (!empty($alertsucc)) { ?>
    <div class="alert alert-success fade in" id="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $alertsucc; ?>
    </div>
<?php } ?>
<!-- alert for error data -->
 <?php if (!empty($alerterr)) { ?>
    <div class="alert alert-danger fade in" id="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $alerterr; ?>
    </div>
<?php } ?>
<!-- form -->
    <form class="form-horizontal" name="form"  action="register_employee" method="POST" >
       <div class="page-header"><strong> Employee Info</strong></div>
         
         <div class="form-group">
         <label class="col-sm-2 control-label"></label>
             <!-- To Display IF  Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=validation_errors();
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
         </div>
         <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-6">
               <input class="form-control" name="id_employee" id="focusedInput" type="hidden" value="" >
            </div>
        </div>
        <div class="form-group"> 
            <label class="col-sm-2 control-label">*First Name: </label>
            <div class="col-sm-6">
               <input class="form-control" name="firstname" id="firstname" type="text" value="<?php if (!empty($alertsucc)) { }else{ echo $this->input->post('firstname');  } ?>" />
            </div>
            <!-- To Display IF Firstname Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('firstname');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">*Last Name: </label>
            <div class="col-sm-6">
               <input class="form-control" name="lastname" type="text" value="<?php if (!empty($alertsucc)) { }else{ echo $this->input->post('lastname'); } ?>" />
            </div>
            <!-- To Display IF Lastname Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('lastname');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" >*Birthday: </label>
            <div class="col-sm-6">
               <input class="form-control" name="birthday" type="date" value="<?php if (!empty($alertsucc)) { }else{ echo $this->input->post('birthday'); } ?>" } />
            </div>
            <!-- To Display IF Birthday Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('birthday');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">*Address: </label>
            <div class="col-sm-6">
               <input class="form-control" name="address" type="text" value="<?php if (!empty($alertsucc)) { }else{ echo $this->input->post('address'); } ?>" />
            </div>
            <!-- To Display IF Address Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('address');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>
        
        <div class="form-group">
        <label class="col-sm-2 control-label" >*Salary: </label>
            <div class="col-sm-6">
                <?php if (!empty($alertsucc)) { $salary=""; }else{  }
                    $options = array(
                            '0'         => '₱ 0',
                            '10000'         => '₱ 10,000',
                            '12000'           => '₱ 12,000',
                            '14000'         => '₱ 14,000',
                            '16000'        => '₱ 16,000',
                    );
                    echo form_dropdown('salary', $options, '',"class='form-control'");
                ?>
            </div>
            <!-- To Display IF Salary Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('salary');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">*Email: </label>
            <div class="col-sm-6">
               <input class="form-control" name="email" type="email" value="<?php if (!empty($alertsucc)) { }else{ echo $this->input->post('email'); } ?>" />
            </div>
            <!-- To Display IF Email Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('email');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>
        <div class="page-header"><strong>User Info</strong></div>

        <div class="form-group">
            <label class="col-sm-2 control-label">*Username: </label>
            <div class="col-sm-6">
               <input class="form-control" name="username"  type="text" value="<?php if (!empty($alertsucc)) { }else{ echo $this->input->post('username'); } ?>" />
            </div>
            <!-- To Display IF Username Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('username');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">*Password: </label>
            <div class="col-sm-6">
               <input class="form-control" name="password" id="password" type="password" value="<?php if (!empty($alertsucc)) { }else{ echo $this->input->post('password'); } ?>" />
            </div>
            <!-- To Display IF Password Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('password');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">*Confirm Password: </label>
            <div class="col-sm-6">
               <input class="form-control" name="confirmpassword" id="confirmpassword" type="password" value="<?php if (!empty($alertsucc)) { }else{ echo $this->input->post('confirmpassword'); } ?>" />
            </div>
            <!-- To Display IF Confirm Password Did Not Meet the Rules -->
            <?php if(isset($_POST['submit'])){ 
                        $err=form_error('confirmpassword');
                        if(!empty($err)) { ?>
                <div class="col-sm-4">
                        <small><?php echo $err; ?></small>
                </div>
            <?php } else {} } ?>
            <!-- End of alert -->
        </div>

        <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button  name="submit" id="btnsubmit" type="submit" class="btn btn-primary">Update Database Record</button><span></span>
              <button  name="submit" id="submit" type="reset" class="btn btn-default">Clear All</button>
      </div>
      </div>
    </form>
    <!-- end of form -->
</br></br></br>
<!-- link for going back to where the last page in tables -->
<div class='glyphicon glyphicon-arrow-left'></div>
<?php  
    echo anchor("dataadminfunctioncont/employee_table/"," Go back to tables..");
?>                   
 <div id="success"> </div>

<!-- Scripts -->
                                
<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".col-sm-4").fadeTo(300, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);

  window.setTimeout(function() {
    $(".alert").fadeTo(600, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
});
</script>
         
