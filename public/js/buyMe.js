$(document).ready(function(){
    
    $(".thumbnail").fancybox({
        width     : 'auto',
        height    : 'auto',
        helpers: {
            title : {
                type : 'inside'
            },
            overlay : {
                speedIn : 500,
                opacity : 0.95
            }
        }
    });
    
    $('#email_us').fancybox('asd');
    $('#products_nav').live("click", function(){
        $(this).parent('li').addClass('active');
    });
    
});

var womenProducts = {
    buyMe : function(id, p_quantity, p_price, p_name){
        var url = $("#url_").val();  
        $.ajax({
            url : url + "/cart/goShop",
            type : "POST",
            dataType : "html",
            data : {idx : id, p_quantity : p_quantity, p_price : p_price, p_name : p_name}
            
        });
    }
}