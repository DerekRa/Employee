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
<?php foreach ($emplinfo as $info) { ?>
    <form class="form-horizontal"  action="edit_employee" method="POST" >
       <div class="page-header"><strong> Employee Info</strong></div>
         
         <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-6">
               <input class="form-control" name="id_employee" id="focusedInput" type="hidden" value="<?php echo $info->id_employee; ?>" >
            </div>
        </div>
  
        <div class="form-group"> 
            <label class="col-sm-2 control-label">First Name: </label>
            <div class="col-sm-6">
               <input class="form-control" name="firstname" id="firstname" type="text" value="<?php echo $info->firstname; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Last Name: </label>
            <div class="col-sm-6">
               <input class="form-control" name="lastname" type="text" value="<?php echo $info->lastname; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" >Birthday: </label>
            <div class="col-sm-6">
               <input class="form-control" name="birthday" type="date" value="<?php echo $info->birthday; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Address: </label>
            <div class="col-sm-6">
               <input class="form-control" name="address" type="text" value="<?php echo $info->address; ?>" />
            </div>
        </div>
        
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
                    echo form_dropdown('salary', $options, $info->salary,"class='form-control'");
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email: </label>
            <div class="col-sm-6">
               <input class="form-control" name="email" type="email" value="<?php echo $info->email; ?>" />
            </div>
        </div>
        <div class="page-header"><strong>User Info</strong></div>

        <div class="form-group">
            <label class="col-sm-2 control-label">*Username: </label>
            <div class="col-sm-6">
               <input class="form-control" name="username"  type="text" value="<?php echo $info->username; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">*Password: </label>
            <div class="col-sm-6">
               <input class="form-control" name="password" id="password" type="password" value="<?php echo $info->password; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">*Confirm Password: </label>
            <div class="col-sm-6">
               <input class="form-control" name="confirmpassword" id="confirmpassword" type="password" value="<?php echo $info->password; ?>" />
            </div>
        </div>

        <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button  name="submit" id="btnsubmit" type="submit" class="btn btn-primary">Update the database of Employee</button>
      </div>
      </div>
    </form>
    <!-- end of form -->
</br></br></br>

<?php } ?>   
<!-- link for going back to where the last page in tables -->
<div class='glyphicon glyphicon-arrow-left'></div>
<?php  $num = $info->user_id; $numm = 2; $nums = 1;
if ($num==1) {
    $ans = $num - $nums;
} else {
    $ans = $num - $numm;
}
    echo anchor("dataadminfunctioncont/employee_tablefix/".$ans," Go back to where you've left of..");
?>                   
 <div id="success"> </div>

<!-- Scripts -->
<script type="text/javascript">
// onlick function to clear value on password and confirm password -------------
$("#password").on("click", function() {
    if ($(this).val() == "<?php echo $emplinfo[0]->password; ?>")
        $(this).val("")
});
 $("#confirmpassword").on("click", function() {
    if ($(this).val() == "<?php echo $emplinfo[0]->password; ?>")
        $(this).val("")
});
</script>
         

<script type="application/javascript">
/** After windod Load */
$(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(300, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
});
</script>
         
