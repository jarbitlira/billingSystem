/**
 * Created by CarlosRenato on 09/01/2015.
 */
$(document).on('ready', function () {

    // Ajax to get data for filters
    var ajax = function (request, response, route) {
        $.ajax({
            url: '/' + route + '/json',
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
                    })
                )
            }
        })
    };

    // Callback when product is selected
    var onSelectProduct = function (event, ui) {
        var _this = ui.item.data;
        if (($('body #qty_' + _this.id).length == 0) && (ui.item.value != -1)) {
            var quantity = '<input type="number" value="1" min="1" max="20" class="qtyInput" id="qty_' + _this.id + '"/>'
            var row = '<tr class="product_data" data-product="'+ _this.id +'">';
            row += '<td><button class="btn btn-xs text-danger remove-product" type="text"><i class="fa fa-close"></i></button></td>';
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

    // Callback when client is selected
    var onSelectClient = function (event, ui) {
        var _this = ui.item.data;
        if (ui.item.value != -1){
            $('#client_name').append('<ins><strong>'+_this.name+'</strong></ins>');
            $('#client_address').append('<ins><strong>'+_this.address+'</strong></ins>');
            $('#client_data').data('client', _this.id);
        }
        return false;
    };

    // Filters autocomplete event
    $('.billingFilter').each(function (i, val) {
        var el = $(val);
        el.autocomplete({
            minLength: 3,
            source: function (request, response) {
                if (el.attr("id") == "filter_product") {
                    ajax(request, response, 'product');
                }
                if (el.attr("id") == "filter_client") {
                    ajax(request, response, 'client');
                }
            },
            select: function (event, ui) {
                if (el.attr('id') == 'filter_product')
                    onSelectProduct(event, ui);
                if (el.attr('id') == 'filter_client')
                    onSelectClient(event, ui, el);
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
    $('body').on('change, input, keyup mouseup', '.qtyInput', function () {
        var td = $(this).parent();
        td.siblings('.subtotal').html(getSubtotal(td.siblings('.price').html(), $(this).val()));
        getFinalSubtotal();
        return false;
    })
        .on('click', '.remove-product', function(){
            $(this).parents('tr').remove();
    });

    var getSubtotal = function (price, qty) {
        return parseFloat(price) * parseFloat(qty);
    };

    var getFinalSubtotal = function () {
        var suma = 0;
        $('body .subtotal').each(function (i, obj) {
            suma += parseFloat($(this).html());
        });
        suma = suma.toFixed(2);
        $('body #finalSubtotal>strong').html(suma);
        $('body #finalGrandtotal>strong').html(suma);
        return suma;
    };

    // Generate invoice
    $('#invoice_generateBtn').on('click', function(e){
        if(confirm('Are your sure to generate invoice?')){
            var data = {};
            var completed = true;
            data.products = [];
            data.user_id = $('body #current_user').data('user');
            data.client_id = $('body #client_data').data('client');
            $('body .product_data').each(function(i, val){
                var id =  $(this).data('product');
                data.products.push({product_id: id, quantity: $('body #qty_'+ id).val() });
            });
            data.subtotal = getFinalSubtotal();
            data.total = getFinalSubtotal();
            data.notes = $('#invoice_notes').val();
            $.each(data, function(i, val){
               if (!val){
                   if (i != 'notes'){
                   alert('Missing '+ i);
                   completed = false;
                   }
               }
            });
            if (completed){
                $.ajax({
                    url: '/billing',
                    type:  'POST',
                    data: data,
                    success: function(data){
                        $('.loading').toggleClass('hide');
                        window.location.href = data.url;
                    }
                });
                $('.loading').toggleClass('hide');
            }
        }
        else{
            e.preventDefault();
        }
    });

});
