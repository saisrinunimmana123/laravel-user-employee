
$(document).ready(function() {
     $("#CreateEmp").validate({
         rules: {
                   
                    EmpId: {
                        required: true,
                        minlength: 2 
                    },
                    F_Name: {
                        required: true,
                         minlength: 2
                    },
                      L_Name:{
                         required: true,
                         minlength: 2

                    },
                    gender:{
                         required: true,
                    },
                   'checkbox[]':{
                         required: true,

                    },
                    // Start_Date:{
                    //     required: true,
                    // },
                    
                },
   
      messages: {
                   
                    
                    EmpId: {
                        required: " Please enter a Employee Id",
                        minlength: " "
                    },
                     F_Name: {
                        required: " Please enter First Name",
                        maxlength: " please enter max 2 numbers"

                    },
                      L_Name:{
                         required: "Please enter Last Name"

                    },
                     gender:{


                          required:"Please Select Gender fields",
                         

                    },

                     'checkbox[]': {
                       required:"Please Select Atleast one Skill"
                         
                       
                    },
                    // Start_Date:{
                    //      required:"Please Select Date",
                    // }

                  },
       
        errorPlacement: function(error, element) 
        {
        if(element.parent('.input-group').length) {
               error.insertAfter(element.parent());
            } 
           else if ( element.is(":radio") ) 
           {
               error.appendTo( element.parents('.radio') );
           }
            else if ( element.is(":checkbox") ) 
           {
               error.appendTo( element.parents('.checkbox') );
           }
           else 
           { 
               error.insertAfter( element );
           }

        }
                                 
    });
});
