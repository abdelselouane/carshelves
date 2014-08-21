$(document).ready(function() {
    
    
    $('#adminLoginForm').bootstrapValidator({
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
            }
            
        },
        submitButtons: 'button[type="submit"]'
    });
    
     

    
});