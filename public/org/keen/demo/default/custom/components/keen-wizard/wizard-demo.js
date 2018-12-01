// Class definition
var KWizardDemo = function () {
    // Base elements
    var wizardEl;
    var formEl;
    var validator;
    var wizard;
    
    // Private functions
    var initWizard = function () {
        // Initialize form wizard
        wizard = new KWizard('k_wizard_v1', {
            startStep: 1
        });

        // Validation before going to next page
        wizard.on('beforeNext', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }
        })

        // Change event
        wizard.on('change', function(wizard) {
            setTimeout(function() {
                KUtil.scrollTop();    
            }, 500);
        });
    }

    var initValidation = function() {
        validator = formEl.validate({
            // Validate only visible fields
            ignore: ":hidden",

            // Validation rules
            rules: {
                //= Client Information(step 1)
                username: {
                    required: true 
                },
                email: {
                    required: true,
                    email: true 
                },       
                password: {
                    required: true
                },     

                //= Client Information(step 2)
                name: {
                    required: true
                },
                contact: {
                    required: true
                },               

                //= Confirmation(step 3)
                accept: {
                    required: true
                }
            },

            // Validation messages
            messages: {
                accept: {
                    required: "You must accept the Terms and Conditions agreement!"
                } 
            },
            
            // Display error  
            invalidHandler: function(event, validator) {     
                KUtil.scrollTop();

                swal({
                    "title": "", 
                    "text": "There are some errors in your submission. Please correct them.", 
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                });
            },

            // Submit valid form
            submitHandler: function (form) {
                
            }
        });   
    }

    var initSubmit = function() {
        var btn = formEl.find('[data-kwizard-action="action-submit"]');

        btn.on('click', function(e) {
            e.preventDefault();

            if (validator.form()) {
                // See: src\js\framework\base\app.js
                mApp.progress(btn);
                //mApp.block(formEl); 

                // See: http://malsup.com/jquery/form/#ajaxSubmit
                formEl.ajaxSubmit({
                    success: function() {
                        mApp.unprogress(btn);
                        //mApp.unblock(formEl);

                        swal({
                            "title": "", 
                            "text": "The application has been successfully submitted!", 
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }
                });
            }
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = KUtil.get('k_wizard_v1');
            formEl = $('#k_form');

            initWizard(); 
            initValidation();
            initSubmit();
        }
    };
}();

jQuery(document).ready(function() {    
    KWizardDemo.init();
});