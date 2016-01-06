$(function(){

    if ($(document).height() <= $(window).height()) {
        $('footer').addClass('navbar-fixed-bottom');
    }

    ///////////////////////////////////////////////////////////////////////////

    $('.my-btn').hover(
        function(){
            $(this).css({
                background: '#f5f5ed',
                color: '#696763'
            });
        },
        function(){
            $(this).css({
                background: '#fe980f',
                color: '#fff'
            });
        }
    );

    ///////////////////////////////////////////////////////////////////////////

    $('.add-to-cart').on('click', function(){
        var id = $(this).attr('data-id');

        $.post(
            '/cart/add/'+id,
            {},
            function(data){
                $('.my-cart-products-count').html(data);
            }
        );

        var price = $('.my-product-price + i').html();
        $.post(
            '/cart/countProduct/'+id,
            {price: price},
            function(data){
                var segments = data.split('|');
                $('.my-product-quantity').val(segments[0]);
                $('.my-product-amount + i').html(segments[1]);
            }
        );

        return false;
    });

    ///////////////////////////////////////////////////////////////////////////

    var price = $('.my-product-price + i').html();
    var count = $('.my-product-quantity').val();
    var amount = price * count;
    $('.my-product-amount + i').html(amount);

    ///////////////////////////////////////////////////////////////////////////

    $(":file").jfilestyle({inputSize: "50%"});

    ///////////////////////////////////////////////////////////////////////////

    var imageLength = $('.my-image').length;

    for (var i = 0; i < imageLength; i++) {
        if ($('.my-image').eq(i).height() < 230) {
            $('.my-image').eq(i).attr('src', '/template/images/home/no-image.jpg');
        }
    }

    ///////////////////////////////////////////////////////////////////////////

});
