<!-- alert for success data -->
<?php if (!empty($alertsucc)) { ?>
    <div class="alert alert-success fade in" id="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $alertsucc; ?>
    </div>
<?php } ?>

<!-- form -->
<?php foreach ($emplinfo as $info) { ?>
    <form class="form-horizontal"  action="edit_employee" method="POST" >
       <div class="page-header"><h4>Below Inforamation Record of employee to Delete.</h4></div>
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
    echo anchor("dataadminfunctioncont/employee_tablefix/".$ans," Go back to where you've left of.. on tables..");
?>                   
 <div id="success"> </div>

<!-- Scripts -->
<script type="text/javascript">
// bootbox for matching the passsword -------------
    $(function () {
        $("#btnsubmit").click(function () {
            var password = $("#password").val();
            var username = $("#username").val();
            var confirmPassword = $("#confirmpassword").val();
            if (password != confirmPassword) {
                bootbox.alert({ 
                    size: 'small',
                    message: "Please Match your Password", 
                })
                return false;
            }
            // return true;
        });
    });
// rules validation ------------
$(function () {
            $('form').validate({
                        rules: {
                            firstname: {
                                minlength: 3,
                                maxlength: 25,
                            },
                            lastname: {
                                minlength: 3,
                                maxlength: 25,
                            },birthday: {
                                debug: true
                            },address: {
                                minlength: 3,
                                maxlength: 50,
                            },salary: {
                                required: true,
                            },email: {
                                minlength: 5,
                                maxlength: 30,
                                email: true
                            },username: {
                                minlength: 5,
                                maxlength: 20,
                                required: true,
                            },password: {
                                minlength: 5,
                                maxlength: 35,
                                required: true,
                            },confirmPassword: {
                                minlength: 5,
                                maxlength: 35,
                                required: true,
                            }
                        },
                        highlight: function(element) {
                            $(element).closest('.form-group').addClass('has-error');
                        },
                        unhighlight: function(element) {
                            $(element).closest('.form-group').removeClass('has-error');
                        },
                        errorElement: 'span',
                        errorClass: 'help-block',
                        errorPlacement: function(error, element) {
                            if(element.parent('.input-group').length) {
                                error.insertAfter(element.parent());
                            } else {
                                error.insertAfter(element);
                            }
                        }
            });
});
// onlick function to clear value on password and confirm password -------------
$("#password").on("click", function() {
    if ($(this).val() == "<?php echo $emplinfo[0]->password; ?>")
        $(this).val("")
});
 $("#confirmpassword").on("click", function() {
    if ($(this).val() == "<?php echo $emplinfo[0]->password; ?>")
        $(this).val("")
});
 // to hide success and error alert in 3 sec --------------------
$(document).ready (function(){
                    $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
                    $("#success-alert").alert('close');
                    });
                    $("#err-alert").fadeTo(3000, 500).slideUp(500, function(){
                    $("#err-alert").alert('close');
                    });
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
         
