$(document).ready (function(){
                        //login
                        $("#error-alert").fadeTo(1000, 500).slideUp(500, function(){
                        $("#error-alert").alert('close');
                        });$("#error-alert1").fadeTo(4000, 500).slideUp(500, function(){
                        $("#error-alert1").alert('close');
                        });$("#error-alert2").fadeTo(4000, 500).slideUp(500, function(){
                        $("#error-alert2").alert('close');
                        });$("#success-alert").fadeTo(4000, 500).slideUp(500, function(){
                        $("#success-alert").alert('close');
                        });
                        //logreg
                        $("#error-alert3").fadeTo(2000, 500).slideUp(500, function(){
                        $("#error-alert3").alert('close');
                    	});$("#error-alert4").fadeTo(3000, 500).slideUp(500, function(){
                        $("#error-alert4").alert('close');
                    	});$("#error-alert5").fadeTo(4000, 500).slideUp(500, function(){
                        $("#error-alert5").alert('close');
                    	});$("#error-alert6").fadeTo(5000, 500).slideUp(500, function(){
                        $("#error-alert6").alert('close');
                    	});$("#error-alert7").fadeTo(6000, 500).slideUp(500, function(){
                        $("#error-alert7").alert('close');
                    	});
                 });
// bootbox - matching passsword -- admin update employee | admin and employee profile edit | 
//admin register also by 2 | employee and admin profile update 
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
// rules validation -- admin update employee | admin register also by 2 | employee profile update
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
                            },firstnamesec: {
                                minlength: 3,
                                maxlength: 25,
                            },lastnamesec: {
                                minlength: 3,
                                maxlength: 25,
                            },birthdaysec: {
                                debug: true
                            },addresssec: {
                                minlength: 3,
                                maxlength: 50,
                            },salarysec: {
                                required: true,
                            },emailsec: {
                                minlength: 5,
                                maxlength: 30,
                                email: true
                            },usernamesec: {
                                minlength: 5,
                                maxlength: 20,
                                required: true,
                            },passwordsec: {
                                minlength: 5,
                                maxlength: 35,
                                required: true,
                            },confirmPasswordsec: {
                                minlength: 5,
                                maxlength: 35,
                                required: true,
                            },
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
// onlick function to clear value on password and confirm password -- admin update employee | admin register also by 2
$("#password").on("click", function() {
        $(this).val("")
});
 $("#confirmpassword").on("click", function() {
        $(this).val("")
});




                        
                 