/**
 * Created by CarlosRenato on 09/01/2015.
 */
$(document).on('ready', function () {

    var formatResults = function(data){
        return data.name + '(' + data.id + ')';
    };

    var filtering = function(term, data){
        if($(data).filter(function(){
                return this.name.localeCompare(term)===0;
            }).length===0){
                return {text:term}
            };
        };

    $('#filter_product').select2({
        placeholder: "Select a product...",
        //multiple: true,
        closeOnSelect: false,
        //minimumInputLength: 2,
        maximumSelectionSize: 1,
        ajax:{
            url: 'http://admin.billingsystem/product/json',
            dataType: 'json',
            quietMillis: 300,
            data: function(term, page){
                return {
                    q: term
                    //page: page || 1
                };
            },
            results: function(data, page){
                return {
                    results: data
                    //more: true
                };
            }
        },
        formatResult: formatResults,
        createSearchChoice: filtering,
        escapeMarkup: function (m) { return m; }
    });


})
