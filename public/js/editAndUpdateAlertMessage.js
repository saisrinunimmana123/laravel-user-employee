   //Delete allert message 
  $(document).ready(function(){
       $(".btn2").click(function(){
         if (!confirm("Are you ok delete the data")){
           return false;
         }alert("data deleted successfully");
       });
    })

    //Edit allert message 
   $(document).ready(function(){
      $(".btn3").click(function(){
        if (!confirm("Are you ok edit data")){
         return false;
        }
      });
  })
     //Update allert message 
   $(document).ready(function(){
       $("#submit").click(function(){
         if (!confirm("Are you ok update the data")){
           return false;
         }alert("data updated successfully");
       });
    })