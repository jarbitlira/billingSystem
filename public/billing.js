/**
 * Created by CarlosRenato on 09/01/2015.
 */
$(document).on('ready', function () {

    var ajaxProduct = function (request, response) {
        $.ajax({
            url: 'http://admin.billingsystem/product/json',
            type: 'GET',
            data: {term: request.term},
            dataType: 'json',
            success: function (data) {
                response($.map(data, function (item) {
                    return {
                        label: item.name,
                        value: item.id,
                        data: item
                    }
                }))
            }
        })
    };

    var ajaxClient = function (request, response) {
        $.ajax({
            url: 'http://admin.billingsystem/client/json',
            type: 'GET',
            data: {term: request.term},
            dataType: 'json',
            success: function (data) {
                response($.map(data, function (item) {
                    return {
                        label: item.name,
                        value: item.id,
                        data: item
                    }
                }))
            }
        })
    };

    var onSelectProduct = function(event, ui){
        var _this = ui.item.data;
        if ($('body #qty_' + _this.id).length == 0) {
            var quantity = '<input type="number" value="1" min="1" max="20" class="qtyInput" id="qty_' + _this.id + '"/>'
            var row = '<tr>';
            row += '<td>' + _this.sku + '</td>';
            row += '<td>' + _this.name + '</td>';
            row += '<td class="price">' + _this.unit_price + '</td>';
            row += '<td>' + quantity + '</td>';
            row += '<td>' + '-' + '</td>';
            row += '<td class="subtotal">' + getSubtotal(_this.unit_price, 1) + '</td>';
            row += '</tr>';
            $('#billing_table > tbody').append(row);
            getFinalSubtotal();
        }
        //else: or add one more of the same prod in quantity or remove it from ajax list in filter
        return false;
    };

    var onSelectClient = function(event, ui){
        var _this = ui.item.data;
        console.log(_this);
        return false;
    };


    $('.billingFilter').each(function(i, val){
        var el = $(val);
        el.autocomplete({
            //minLength: 3,
            source: function (request, response) {
                console.log(el.attr('id'));
                if(el.attr("id") == "filter_product"){
                    ajaxProduct(request, response);
                }
                if(el.attr("id") == "filter_client"){
                    ajaxClient(request, response);
                }
            },
            select: function (event, ui) {
                if(el.attr('id') == 'filter_product')
                    onSelectProduct(event, ui);
                if(el.attr('id') == 'filter_client')
                    onSelectClient(event, ui, el);
                //$(this).val('');
                ui.item.value = '';
            },
            focus: function (event, ui) {
                $(this).val(ui.item.label);
                return false;
            }
        }).bind('keydown', function (e) {
            if (e.keyCode === $.ui.keyCode.TAB && $(this).autocomplete('instance').menu.active) {
                e.preventDefault();
            }
        });
    });


    //missing arrow events
    $('body').on('change, input, keyup', '.qtyInput', function () {
        var td = $(this).parent();
        td.siblings('.subtotal').html(getSubtotal(td.siblings('.price').html(), $(this).val()));
        getFinalSubtotal();
        return false;
    });

    var getSubtotal = function (price, qty) {
        return parseFloat(price) * parseFloat(qty);
    };

    var getFinalSubtotal = function () {
        var suma = 0;
        $('body .subtotal').each(function (i, obj) {
            suma += parseFloat($(this).html());
        });
        $('body #finalSubtotal>strong').html(suma);
        $('body #finalGrandtotal>strong').html(suma);
        return false;
    };

});
