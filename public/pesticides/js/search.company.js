jQuery(function($) {

    $("#search-input").bind('keypress', function(e) {
        if(e.keyCode == 13 ) {
            return false;
        }
    });

    $("#search-input").on('keyup', function() {
     
      var inputVal = $("#search-input").val();
      var reg_exp = new RegExp(inputVal, 'i');
      $("#search-result").html('');
      var url = $("#search-fields").attr("action");
      
     if(inputVal.length > 2) {
         
         $.ajax({
             
             url: url,
             headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
             type: "GET",
             dataType: "JSON",  
             data: inputVal,
             success: function(result) {     
                 
                 $("#search-result").html('');
                 $.each(result, function(key, value) {                     
                     if(value.name.search(reg_exp) !== -1) {    
                        $("#search-result").append('<li class="list-group-item"> <a href="/companies/' + key + '">' + value.name + ' </a></li>');
                        $("#search-result").css('display','block').slideDown(2000);
                     }                     
                 });
             }
             
         });
     } else if(inputVal.length === 0 ) {
         
         $("#search-result").css('display','none');
     }
     
     
    
    });

});