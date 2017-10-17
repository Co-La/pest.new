jQuery(function ($) {

    $('#company_ID option').on('click', function () {
        var comp_id = $(this).val();
        if (comp_id !== null) {
          window.location.href = comp_id;
        }
    });
            
    $('#product_ID option').on('click', function () {
        var prod_id = $(this).val();
        var url = $('#select_item').attr('action');
        var nbr = $('.number_item').val();
       
        if (prod_id !== null) {
            $.ajax({
                url: url,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST', 
                dataType: 'JSON',
                data: "prod_id=" + prod_id ,
                success: function (result) {                     
                    $('.number_item').val('1');
                    if(result !== null) {
                        $(".pest_content_container").css('display','block');
                        $("#activ_sub").val(result.substance);  
                        $("#grup").val(result.level);
                        $("#product_id").val(result.id);
                        $("#date").val(result.created_at);  
                        $("#packet").val(result.pack);
                        $("#price").val(result.price);  
                        $("#curr").val(result.curr); 
                        $("#price_mdl").val(result.price_mdl);
                        $("#full_price").text(result.price_mdl);
                        $(".number_item").attr('product_id', prod_id);
                    
                    }                 
                }

            });
        }
    });
    
    
       $(".plus_item").on('click', function() {        
       
        var currenEvent = $(this);
        var curent_input = currenEvent.prev('input');
        var item_nbr = curent_input.val();         
        var curent_prod = curent_input.attr('product_id');        
      
        $.ajax({
            url: $(this).attr('m_route'),
            type: "POST",
            data: {"item_nbr":  item_nbr, "id": curent_prod},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(result) {  
                
                curent_input.val(result.nbr);                
                var price = parseFloat(result.price * result.nbr);                
                $("#full_price").text(price.toFixed(2));
                $(".all_item_price").text(result.total);
               
            }
            
        });
    });
    
    $(".minus_item").on('click', function() {        
       
        var currenEvent = $(this);
        var curent_input = currenEvent.next('input');
        var item_nbr = curent_input.val();         
        var curent_prod = curent_input.attr('product_id');         
         
        $.ajax({
            url: $(this).attr('m_route'),
            type: "POST",
           data: {"item_nbr":  item_nbr, "id": curent_prod},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(result) {                
                                
                curent_input.val(result.nbr);                
                var price = parseFloat(result.price * result.nbr);                
                $("#full_price").text(price.toFixed(2));
                $(".all_item_price").text(result.total);
                
            }
            
        });
    });
        
        
    $("#bag-product-save").on('click', function(e) {
       
        e.preventDefault();
       
        var curent_prod = $(".number_item").attr('product_id');               
        var item_nbr = $(".number_item").val();
        var item_total_price = $("#full_price").text();
        var url = $("#select_pest_info").attr("action");         
        
        if(curent_prod !== null) {
            
            $(".product-price").children('.slide-info-alert').remove();
            
            $.ajax({
                url: url,
                data: {"id": curent_prod, "item_nbr": item_nbr, "price": item_total_price},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                success: function(response) {
                    
                    $(".product-price").append("<div class='alert alert-danger slide-info-alert'><h3>Produsul a fost selectat in cosul de cumparaturi</h3></div>");
                    $(".product-price").children('.slide-info-alert').slideDown(700, function() {                        
                        $(".product-price").children('.slide-info-alert').delay(1200).slideUp(700);
                    });
                }
                
            });
        }
    });  

   
    
    $("#write-comments").click(function () {

        var form_comment = $("#comment-form").html();
        $(".form-place").html('');
        $(".form-place").slideUp(1000);
        $("#comment-parrent").html(form_comment).slideDown(1000, function () {
            $(".comment-form-textarea").focus();
            $("#comment-form-btn").click(function () {
                var id = $(".add_new_comment").attr('parent_id');
                var url = $("#comment-form").attr('action');
                var msg = $(".comment-form-textarea").val();
                var art_id = $(".comment-form-textarea").attr("art_id");
                $("#comment-parrent").slideUp(1000);
                
                $.ajax({
                    url: url,
                    data: {"id": id, "msg": msg, "art_id": art_id},
                    headers: {"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")},
                    type: "POST",
                    success: function (result) {
                        
                        if(result.status == true) {

                            $("#list-parent-coment").append(
                                    "<li><div class='row blog-comment' style='display: none'><div class='col-md-2 col-sm-12 blog avatar'>" 
                                   + "<img src='/pesticides/image/no_avatar.png' alt='user_image'></div><div class='col-md-2 col-sm-12 blog-comment-text'>" 
                                   + "<div class='row comment-date'><h6 class='col-12 blog-user'>" + result.alias + "</h6><p>" + result.created_at 
                                   + "</p><p class='add_new_comment' parent_id=''" + result.id + "> Adauga un comentariu </p></div></div>" 
                                   + "<div class='col-md-8 col-sm-12 blog-comment-text'><p class='blog-user-text'>" + result.text + "</p></div></div><div class='row'>" 
                                   + "<div class='form-place col-md-5 col-sm-12'></div></div><hr>" );

                           $("#list-parent-coment .blog-comment").fadeIn(1200);
                           $("#comments-number").text(result.count);
                       }
                    }

                });

            });
        });

    });   
    
    
    $(".add_new_comment").on('click', function () {
        var form_comment = $("#comment-form").html();
        var addCom = $(this);
        $(".form-place").html('');         
        addCom.parents(".blog-comment").next(".row").find(".form-place").html(form_comment).slideDown(1000, function () {
             $("#comment-parrent").fadeOut(600);
            $(".comment-form-textarea").focus();
            $("#comment-form-btn").click(function () {
                
                var id = addCom.attr('parent_id');
                var url = $("#comment-form").attr('action');
                var msg = $(".comment-form-textarea").val();
                var art_id = $(".comment-form-textarea").attr("art_id");
                $(".form-place").slideUp(1000);
                $.ajax({
                    url: url,
                    data: {"id": id, "msg": msg, "art_id": art_id},
                    headers: {"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")},
                    type: "POST",
                    success: function (result) {
                        if(result.status == true) {
                        addCom.parents(".blog-comment").siblings("ul").append(
                                "<li><div class='row blog-comment'><div class='col-md-2 col-sm-12 blog avatar'>" +
                                "<img src='/pesticides/image/no_avatar.png' alt='user_image'></div><div class='col-md-2 col-sm-12 blog-comment-text'>" +
                                "<div class='row comment-date'><h6 class='col-12 blog-user'>" + result.alias + "</h6><p>" + result.created_at +
                                "</p><p class='add_new_comment' parent_id=''" + result.id + "> Adauga un comentariu </p></div></div>" +
                                "<div class='col-md-8 col-sm-12 blog-comment-text'><p class='blog-user-text'>" + result.text + "</p></div></div><div class='row'>" +
                                "<div class='form-place col-md-5 col-sm-12'></div></div><hr>"
                                );
                        
                        $("#comments-number").text(result.count);
                        
                    }
                    }
                });

            });
            
        });
    });
    
    
    
    $('#getproduct').on('keyup', function() {
        var pr_name = $(this).val();   
        var reg = new RegExp(pr_name, 'i');
        $('.item').html('');
        $.ajax({
            url: $("#ajaxpr").attr('action'),
            data: "pr_name=" + pr_name,
            type: 'GET',
            headers: {"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")},
            success: function(result) {
                
               
                $.each(result, function(key, value) {
                   if(value.name.search(reg) !== -1) {
                       $('.item').append("<image src='"+ value.image + "'alt='imagine'/>" +
                            "<h3>" + value.name + "</h3>" + 
                            "<p>" +value.id_categories + "<span></span></p>" +
                            "<strong>" + value.price + "</strong>" +
                             "<p>" + value.description + "</p>" 
                            );
                   }
                                   
                });
            }
            
            
        });
        
    });

    $(".filter_ch").on("click", function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            method: "GET",
            headers: {"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")},
            success: function(res) {
                console.log(res);
                $(".articles-list").html('');
                $.each(res, function(key, value) {
                    $(".articles-list").append("<div class='col-12 blog-articles'><div class='row'><div class='col-md-5 col-sm-12'>" +
                        "<a href='' alt='title'><image class='blog-article-image' src='pesticides/image/" + value.image.small + "' alt='article_image'>" +
                        "</div><div class='col-md-7 col-sm-12 article-text-content'><p style='text-align: right; font-size: 12px'>" + value.created_at + "</p>" +
                        "<a href='"+ 'blogs/'+ value.id + "'><h3>" + value.title + "</h3></a>" +
                        "<a href='' class='filter_ch' ><h6>" + value.filter.name + "</h6></a>" +
                        "<p class='text-justify'>"+ value.text.substring(0, 250) + '...'+ "</p>" +
                        "<a href ='"+ 'blogs/'+ value.id + "'>Ready more</a>" +
                    "</div></div><hr></div>");

                });
            }

        });
    });

    $("#big_news .img-thumbnail, #image-schemes img").hover(function() {
        $(this).css({'box-shadow': '0px 0px 20px rgba(0,0,0,0.1'});
    }, function() {
        $(this).css({'box-shadow': '0px 0px 20px rgba(0,0,0,0.5'});
    });

});


