// Ajax post for refresh captcha image.
jQuery(document).ready(function(){
    jQuery("a.refresh").click(function() { 
        var get_base_url = jQuery(this).data("url");
        jQuery.ajax({
            type: "POST",
            url: get_base_url + "register_controller/captcha_refresh",            
            success: function(res) {
                if (res)
                {
                    jQuery("div.image").html(res);
                }
            }
        });
    });
});



// function add_to_cart(id){
//   console.log(id);
//  var get_base_url = $("#"+id).data('url');
//  var form = $('.form-cart');
//  var param =form.serialize();
//  console.log(param);
//  $.ajax({
//   type: "POST",
//   url: get_base_url+"cart_controller/add", 
//   data:  param,
//   dataType: 'json',        
//   success: function(response) {
//          alert(response);
//          console.log(response);
//      }
//  });
// };





