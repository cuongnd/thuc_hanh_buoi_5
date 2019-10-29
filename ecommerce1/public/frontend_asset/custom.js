jQuery(document).ready(function ($) {
    $('.btn-add-cart').click(function (e) {
        var $wrapper_content_cart=$(this).closest('.wrapper-content-add-to-cart');
        var quality=$wrapper_content_cart.find('select[name="quality"]').val();
        var product_id=$(this).data("product_id");
        var data_post={
            "_token": _token,
            "product_id":product_id,
            "quality":quality,

        };
        $.ajax({
            url: `${root_url}/ajax/add-to-cart`,
            type: "post",
            dataType: 'json',
            data: data_post,
            async: true,
            beforeSend: function()
            {

            },
            success: function(response)
            {
                if(response.result==="success"){
                    var product=response.data[0];

                    $('.empty-cart').remove();
                    var total_current_product= $('.list-cart').find(`li[data-product_id="${product.id}"]`).length;
                    if(total_current_product>0){
                        var $product= $('.list-cart').find(`li[data-product_id="${product.id}"]`);
                        var quality=$product.find('.cart-quality').text();
                        quality=parseInt(quality);
                        quality=quality + parseInt(product.qty);
                        $product.find('.cart-quality').html(quality);
                    }else{
                        var $html_item_product_cart=$(`
                                    <li data-product_id="${product.id}">
                                            <div class="row">
                                                <div class="col-sm-3"><img src=""></div>
                                                <div class="col-sm-9">
                                                    <h4>${product.name}</h4>
                                                    ${product.price} * <span class="cart-quality">${product.qty}</span> vnđ
                                                </div>
                                            </div>
                                        </li>
                                `);
                        $html_item_product_cart.appendTo($('.wrapper-content-cart ul.list-cart'));
                    }

                    $('.total-item').html($('.list-cart').find('li').length);
                    alert('da them thanh cong');
                }
            }
        });
    });
});
