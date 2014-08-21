$(document).ready(function() {

   /* $('button[type="submit"]').on ('click', function () {
        
        if ($('#password').val() === $('#cpassword').val()) {
          alert("Equal");
          return true;
        }
        else {
          alert("don't matches");
         return false;
        }
        
    });*/
    
    
    $('#loginForm').bootstrapValidator({
         message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            username_email: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please enter your <strong>Username</strong> or <strong>Email</strong></span>'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">The password is required and cannot be empty</span>'
                    },
                    stringLength: {
                        min: 8,
                        max: 30,
                        message: '<span class="error">The password must be more than 8 and less than 30 characters long</span>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '<span class="error">The password can only consist of alphabetical, number and underscore</span>'
                    }
                }
            },
            
        },
        submitButtons: 'button[type="submit"]'
    });
    
     
    
   /* $('#adminLoginForm').bootstrapValidator({
         message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            email: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please enter your <strong>Email</strong></span>'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">The password is required and cannot be empty</span>'
                    },
                    stringLength: {
                        min: 8,
                        max: 30,
                        message: '<span class="error">The password must be more than 8 and less than 30 characters long</span>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '<span class="error">The password can only consist of alphabetical, number and underscore</span>'
                    }
                }
            }
            
        },
        submitButtons: 'button[type="submit"]'
    });*/
    
    $('#forgotPasswordForm').bootstrapValidator({
         message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            email: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please enter your <strong>Email</strong></span>'
                    }
                }
            }
            
        },
        submitButtons: 'button[type="submit"]'
    });
    
    $('#activationCodeForm').bootstrapValidator({
         message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            email: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please enter your <strong>Email</strong></span>'
                    }
                }
            }
            
        },
        submitButtons: 'button[type="submit"]'
    });
    
   
    $('#resetPasswordForm').bootstrapValidator({
         message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            password: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">The password is required and cannot be empty</span>'
                    },
                    stringLength: {
                        min: 8,
                        max: 30,
                        message: '<span class="error">The password must be more than 8 and less than 30 characters long</span>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '<span class="error">The password can only consist of alphabetical, number and underscore</span>'
                    }
                }
            },
            cpassword: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">The password is required and cannot be empty</span>'
                    },
                    stringLength: {
                        min: 8,
                        max: 30,
                        message: '<span class="error">The password must be more than 8 and less than 30 characters long</span>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '<span class="error">The password can only consist of alphabetical, number and underscore</span>'
                    }
                }
            }
            
        },
        submitHandler: function(validator, form, submitButton) {
            
            $password = $('#password').val();
            $cpassword = $('#cpassword').val();
            
            if( $password !== $cpassword ){
                alert("The passwords are not matching, please try again.");
                $('#cpassword').val('');
                $('#cpassword').focus();
            }else{
                validator.defaultSubmit();
            }
        },
        submitButtons: 'button[type="submit"]'
    });
    
});