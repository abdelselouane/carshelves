$(document).ready(function() {
    $('#registerForm').bootstrapValidator({
       // message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: '<span class="error">The username is required and cannot be empty</span>'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: '<span class="error">The username must be more than 6 and less than 30 characters long</span>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '<span class="error">The username can only consist of alphabetical, number and underscore</span>'
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
            cpassword: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please Confirm your password</span>'
                    },
                    stringLength: {
                        min: 8,
                        max: 30,
                        message: '<span class="error">The password must be more than 6 and less than 30 characters long</span>'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: '<span class="error">The password can only consist of alphabetical, number and underscore</span>'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">The email is required and cannot be empty</span>'
                    },
                    emailAddress: {
                        message: '<span class="error">The input is not a valid email address</span>'
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
    
    
    $('#ad_vehicle_form').bootstrapValidator({
         message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            manufacturer: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please Choose Manufacturer</span>'
                    }
                }
            },
            model: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">What Model the car is?</span>'
                    }
                }
            },
            year: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">What Year the car is?</span>'
                    }
                }
            },
            body_type : {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please select one</span>'
                    }
                }
            },
            fuel_type: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please select one</span>'
                    }
                }
            },
            transmission: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Is it manual?</span>'
                    }
                }
            },
            doors: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">How many doors does it have?/span>'
                    }
                }
            },
            cylinders: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">This is a required field</span>'
                    }
                }
            },
            vin: {
                validators: {
                    vin: {
                        message: '<span class="error">The VIN number is not valid<span class="error">'
                    }
                }
            },
            color: {
                validators: {
                    notEmpty: {
                        message: '<span class="error">Please select a color</span>'
                    }
                }
            }
            
        },
        submitButtons: 'button[type="submit"]'
    });
    
});