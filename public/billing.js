/**
 * Created by CarlosRenato on 09/01/2015.
 */
$(document).on('ready', function () {

    $("#filter_product").autocomplete({
        source: function(request, response){
            $.ajax({
                url: 'http://admin.billingsystem/product/json',
                type: 'GET',
                data: {term: request.term},
                dataType: 'json',
                success: function (data) {
                    response($.map(data, function(item){
                        return {
                            label: item.name,
                            value: item.id,
                            data: item
                        }
                    }))
                }
            })
        },
        select: function(event, ui){
            var _this = ui.item.data;
            var quantity = '<input type="number" value="1" min="1" max="20" class="qtyInput" id="qty_'+_this.id +'"/>'
            var row = '<tr>';
            row += '<td>'+ _this.name +'</td>';
            row += '<td>'+ _this.sku +'</td>';
            row += '<td class="price">'+ _this.unit_price +'</td>';
            row += '<td>'+ quantity +'</td>';
            row += '<td>'+ '-' +'</td>';
            row += '<td class="subtotal">'+ getSubtotal(_this.unit_price, 1) + '</td>';
            row += '</tr>';
            $('#billing_table > tbody').append(row)
            return false;
        }

    });

    $('body').on('change, input, keyup', '.qtyInput', function(){
        var td = $(this).parent();
        td.siblings('.subtotal').html(getSubtotal(td.siblings('.price').html(), $(this).val()));
        return false;
    });

    var getSubtotal = function(price, qty){
        return parseFloat(price) * parseFloat(qty);
    };


});
