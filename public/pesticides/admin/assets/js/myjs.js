$(document).ready(function() {
    
  $(".del_item").on('click', function(e) {
      
      e.preventDefault();
      var current = $(this);
      var id = current.attr('data-id');      
      
      if(confirm("Doriti sa stergeti informatia din baza de date?")) {
          $.ajax({          
          url: current.attr('href'),         
          type: 'DELETE',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(result) {
              $(".row-"+id).remove(); 
              $(".alert-div").html('');
              if(result === true) { 
                  $(".alert-div").css({"background-color":'#F2DEDE'}).fadeIn(600, function() { 
                      $(this).append("<h3>Informatia a fost stearsa din baza de date!</h3>").delay(2000).fadeOut(1500);
                  });  
              } else {
                  $(".alert-div").css({"background-color":'#DFF0D8'}).fadeIn(600, function() {                      
                      $(this).append("<h3>Informatia a fost stearsa din baza de date!</h3>").delay(2000).fadeOut(1500);                      
                  });                  
              }  
          }
          
      });            
     }
     
  });
  
});


