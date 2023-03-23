$(document).ready(function() {
   $("#Login").validate({
       rules:{ 
                   
                    name: {
                        required: true,
                        minlength: 3 //for length of lastname
                    },
                    password: {
                        required: true,
                         minlength: 3
                    },
                      
                    
              },
 
    messages: {
                   
                    
                    name: {
                        required: " Please enter a Name",
                        minlength: "please enter Min 3 Characters "
                    },
                     password: {
                        required: " Please enter Password Name",
                        minlength: " please enter min 3 Characters"

                    },
                      
                    }
                                    
    });
});
