$( document ).ready(function() {

    console.log("fds");
        
  

    $("body").on("click", "#submitPost", function() {
        console.log("fdf");
  
    
        console.log($("#addPostForm").serializeArray());
    });
  
  });
  